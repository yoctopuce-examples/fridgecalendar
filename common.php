<?php
/**
 * Created by PhpStorm.
 * User: seb
 * Date: 22.10.2014
 * Time: 16:44
 */

require_once('google-api-php-client/autoload.php');


$serial ="YD128X64-0E763";


/**
 * @return mysqli
 */
function setupDbConnection()
{
    $mysqli = new mysqli("localhost", "yfridgecalendar", "XXXXXXXX", "XXXXXXXXX");
    if($mysqli->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
}

/**
 * @param $mysqli mysqli
 * @param $serial
 * @param $access_token
 * @param $refreshToken
 */
function clearToken($mysqli, $serial, $access_token, $refreshToken)
{
    $query = "INSERT INTO serial2token (serial,access_token, refresh_token) VALUES ('$serial','$access_token', '$refreshToken') ON DUPLICATE KEY UPDATE" .
        " serial = VALUES(serial), access_token = VALUES(access_token), refresh_token = VALUES(refresh_token);";
    if (!$mysqli->query($query)) {
        echo "unable to insert token : (" . $mysqli->errno . ") " . $mysqli->error;
    }
}

/**
 * @param $mysqli mysqli
 * @param $client Google_Client
 * @param $serial string
 */
function updateToken($mysqli, $client, $serial)
{
    $access_token = $client->getAccessToken();
    $tokens_decoded = json_decode($access_token);
    $refreshToken = $tokens_decoded->refresh_token;

    $query = "INSERT INTO serial2token (serial,access_token, refresh_token) VALUES ('$serial','$access_token', '$refreshToken') ON DUPLICATE KEY UPDATE" .
        " serial = VALUES(serial), access_token = VALUES(access_token), refresh_token = VALUES(refresh_token);";
    if(!$mysqli->query($query)) {
        echo "unable to insert token : (" . $mysqli->errno . ") " . $mysqli->error;
    }
}

/**
 * @param $mysqli mysqli
 * @param $serial
 * @return array
 */
function getToken($mysqli, $serial)
{
    $query = "SELECT * FROM serial2token WHERE serial='$serial';";
    $result = $mysqli->query($query);
    if ($result && $result->num_rows > 0) {
        $obj = $result->fetch_object();
        $res = array();
        $res['serial'] = $obj->serial;
        $res['access_token'] = $obj->access_token;
        $res['refresh_token'] = $obj->refresh_token;
        $result->close();
        // check if it is a valid token
        if ($res['refresh_token']=='' || $res['access_token']==''){
            return FALSE;
        }
        return $res;
    } else {
        return FALSE;
    }

}


/**
 * @return Google_Client
 */
function setup_google_client()
{

    $client = new Google_Client();
    $client->setApplicationName("Fridge Calendar");
    $client->setAccessType('offline');
    $client->setClientId('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
    $client->setClientSecret('XXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
    $client->setRedirectUri('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
    $client->addScope("https://www.googleapis.com/auth/calendar");
    return $client;
}

define('CALENDAR_TIMEZONE', "Europe/Zurich");

/**
 * @param $client
 * @param int $nb_days
 * @return array
 */
function getUpcommingEvents($client,$nb_days=1)
{
    $res = array();
    $service = new Google_Service_Calendar($client);
    $calendarList = $service->calendarList->listCalendarList();
    $dt_tz = new DateTimeZone (CALENDAR_TIMEZONE);
    $dt_list_start = new DateTime('now', $dt_tz);
    $dt_list_stop = new DateTime('now', $dt_tz);
    $dt_list_stop->add(new DateInterval('P'.$nb_days.'D'));

    while (true) {
        /** @var Google_Service_Calendar_Calendar $calendarListEntry */
        foreach ($calendarList->getItems() as $calendarListEntry) {
            $calendar_id = $calendarListEntry->getId();
            $optParam = array("orderBy" => "startTime",
                'singleEvents' => true,
                'timeMin' => $dt_list_start->format(DateTime::ATOM),
                'timeMax' => $dt_list_stop->format(DateTime::ATOM),
                'timeZone' => CALENDAR_TIMEZONE
            );
            // get event that occur in the next 7 days
            $events = $service->events->listEvents($calendar_id, $optParam);
            /** @var Google_Service_Calendar_Event $event */
            foreach ($events->getItems() as $event) {
                $summary = $event->getSummary();
                $description = utf8_decode($summary);
                /** @var Google_Service_Calendar_EventDateTime $start */
                $start = $event->getStart();
                if($start->getDate() != "") {
                    // handle full day events
                    /** @var Google_Service_Calendar_EventDateTime $end */
                    $end = $event->getEnd();
                    $dt_end = new DateTime($end->getDate());
                    $start_of_today = new DateTime();
                    while($start_of_today < $dt_end) {
                        $res[] = array('when'=> $start_of_today->getTimestamp(), 'what'=>$description);
                        $start_of_today->add(new DateInterval('P1D'));
                    }
                } else {
                    $tz = $start->getTimeZone();
                    $date_time = new DateTime($start->getDateTime());
                    if ($tz != '')
                        $date_time->setTimezone( new DateTimeZone($tz));
                    $description .= $date_time->format(" (h:i)");
                    $res[] = array('when'=> $date_time->getTimestamp(), 'dbg'=>$event->getStart()->getDate(), 'what'=>$description);
                }
            }
        }

        $pageToken = $calendarList->getNextPageToken();
        if($pageToken) {
            $optParams = array('pageToken' => $pageToken);
            $calendarList = $service->calendarList->listCalendarList($optParams);
        } else {
            break;
        }
    }

    function sortByOrder($a, $b) {
        return $a['when'] - $b['when'];
    }
    usort($res, 'sortByOrder');
    return $res;
}
