<?php
const DATA_DIR = __DIR__ . '/data';
const CALENDARS_FILE = DATA_DIR . '/calendars.json';
const FETCH_DAYS = 14;
const TODAY_STR = 'Today';


function loadCalendarStore(): array
{
    if (!is_file(CALENDARS_FILE)) {
        return [];
    }
    $raw = file_get_contents(CALENDARS_FILE);
    $store = json_decode((string)$raw, true);
    return is_array($store) ? $store : [];
}

function saveCalendarStore(array $store): void
{
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0770, true);
    }
    file_put_contents(CALENDARS_FILE, json_encode($store, JSON_PRETTY_PRINT), LOCK_EX);
}

function getCalendarUrl(string $serial): ?string
{
    $url = loadCalendarStore()[$serial] ?? null;
    return is_string($url) ? $url : null;
}

function setCalendarUrl(string $serial, string $url): void
{
    $store = loadCalendarStore();
    $store[$serial] = $url;
    saveCalendarStore($store);
}

function removeCalendar(string $serial): void
{
    $store = loadCalendarStore();
    unset($store[$serial]);
    saveCalendarStore($store);
}

class Event
{
    private DateTimeImmutable $_start;
    private DateTimeImmutable $_stop;
    private string $_description;
    private bool $_fullday;

    function __construct(DateTimeImmutable $start, DateTimeImmutable $stop, string $description, bool $fullday=false)
    {
        $this->_start = $start;
        $this->_stop = $stop;
        $this->_description = $description;
        $this->_fullday = $fullday;
    }

    public function getDescription(): string
    {
        if ($this->_fullday) {
            return $this->_description;
        }else {
            return $this->_start->format("H:i "). $this->_description;
        }
    }

    public function getDateStr(): string
    {
        return $this->_start->format('l j M');
    }

    public function getHourStr(): string
    {
        return $this->_start->format('H:i');
    }

    public function getStart(): DateTimeImmutable
    {
        return $this->_start;
    }
}

function parse_ical_datetime(string $value,  ?DateTimeZone $timezone =  new DateTimeZone('UTC'))
{
    if ($value[strlen($value) - 1] == 'Z') {
        return DateTimeImmutable::createFromFormat('!Ymd\THis\Z', $value, $timezone);
    } else {
        return DateTimeImmutable::createFromFormat('!Ymd\THis', $value);
    }
}

function parse_ical_date(string $value)
{
    return DateTimeImmutable::createFromFormat('!Ymd', $value);
}
function fetchUpcomingEvents(string $icsUrl, int $days = FETCH_DAYS): array
{
    $now = new DateTimeImmutable();
    $last = (new DateTimeImmutable())->modify("+$days day");
    $events = [];

    $data = @file_get_contents($icsUrl);
    if ($data === false || trim($data) === '') {
        return [];
    }
    //Split data into lines and unfold long lignes
    $ics = str_replace(["\r\n", "\r"], "\n", $data);
    $raw_lines = explode("\n", $ics);
    $lines = [];
    foreach ($raw_lines as $line) {
        if ($line == '') {
            continue;
        }
        if (($line[0] == ' ' || $line[0] == "\t") && $lines != []) {
            $lines[count($lines) - 1] .= substr($line, 1);
        } else {
            $lines[] = $line;
        }
    }

    $current = null;
    $calendar_timezone = null;
    //extract events
    foreach ($lines as $line) {
        if (str_starts_with($line, 'X-WR-TIMEZONE')) {
            [$left, $value] = explode(':', $line, 2);
            $calendar_timezone = new DateTimeZone(trim($value));
        }elseif (str_starts_with($line, 'BEGIN:VEVENT')) {
            $current = [];
        } elseif (str_starts_with($line, 'END:VEVENT')) {
            if ($current !== null) {
                if (!key_exists('stop', $current)) {
                    $current['stop'] = $current['start'];
                }
                if ($current['stop'] > $now && $current['start'] < $last) {
                    $events[] = new Event($current['start'], $current['stop'], $current['descr'],$current['full'] );
                }
            }
            $current = null;
        } elseif ($current !== null && str_contains($line, ':')) {
            [$left, $value] = explode(':', $line, 2);
            $parts = explode(';', $left);
            if (str_starts_with($left, 'DTSTART')) {
                if (sizeof($parts) >= 2 && $parts[1] == 'VALUE=DATE') {
                    $t = parse_ical_date($value);
                    $current['full'] = true;
                } else {
                    $t = parse_ical_datetime($value);
                    $current['full'] = false;
                }
                $current['start'] = $t->setTimezone($calendar_timezone);
            } elseif (str_starts_with($left, 'DTEND')) {
                if (sizeof($parts) >= 2 && $parts[1] == 'VALUE=DATE') {
                    $t = parse_ical_date($value);
                    $t = $t->modify('+23 hours 59 minutes 59 seconds');
                } else {
                    $t = parse_ical_datetime($value);
                }
                $current['stop'] = $t->setTimezone($calendar_timezone);
            } elseif (str_starts_with($left, 'SUMMARY')) {
                $current['descr'] = $value;
            }
        }
    }
    usort($events, fn(Event $a, Event $b): int => $a->getStart() <=> $b->getStart());
    return $events;
}


function getEventsFromSerial($serial)
{
    $url = getCalendarUrl($serial);
    if ($url === null) {
        return false;
    } else {
        return fetchUpcomingEvents($url);
    }
}