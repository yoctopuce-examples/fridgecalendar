<?php
declare(strict_types=1);
require_once __DIR__ . '/common.php';

$errors = [];
$preview = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'save') {
        $serial = strtoupper(trim($_POST['serial'] ?? ''));
        $url = trim($_POST['ics_url'] ?? '');
        setCalendarUrl($serial, $url);
    } elseif ($action === 'delete') {
        $serial = strtoupper(trim($_POST['serial'] ?? ''));
        removeCalendar($serial);
    }
}

if (isset($_GET['preview'])) {
    $serial = strtoupper(trim($_GET['preview']));
    $events = getEventsFromSerial($serial);
    if ($events === null) {
        $errors[] = "Unknown $serial display.";
    }else{
        $preview = ['serial'=>$serial, 'events'=>$events];
    }
}

$store = loadCalendarStore();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fridge Calendar </title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem auto;
            max-width: 40rem;
        }

        table {
            border-collapse: collapse;
            margin: 1rem 0;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: .4rem .6rem;
            text-align: left;
        }

        label {
            display: block;
            margin-top: .8rem;
        }

        input[type=text] {
            width: 100%;
            box-sizing: border-box;
        }

        .error {
            color: #b00;
        }

        .ok {
            color: #080;
        }

        code {
            word-break: break-all;
        }
    </style>
</head>
<body>
<h1>Fridge Calendar / configuration</h1>

<?php foreach ($errors as $msg): ?>
    <p class="error"><?= $msg ?></p>
<?php endforeach; ?>

<h2>Register new Screen</h2>
<form method="post">
    <input type="hidden" name="action" value="save">
    <label>Serial number of the Yocto-Display or Yocto-Display-ePaper-C (ex. YD128X64-FE1A2)
        <input type="text" name="serial" required>
    </label>
    <label>Google calendar secret URL (https://?/basic.ics)
        <input type="text" name="ics_url" placeholder="https://calendar.google.com/calendar/ical/?/private-?/basic.ics" required>
    </label>
    <button type="submit">Regitser</button>
</form>

<?php if ($store !== []): ?>
    <h2>Registered screens</h2>
    <table>
        <tr>
            <th>Screen</th>
            <th></th>
        </tr>
        <?php foreach ($store as $serial => $url): ?>
            <tr>
                <td><?= $serial ?></td>
                <td>
                    <a href="?preview=<?= urlencode($serial) ?>">preview</a>
                    <form method="post" style="display:inline">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="serial" value="<?= $serial ?>">
                        <button type="submit">remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php if ($preview !== null): ?>
    <h2>Next Event (<?= $preview['serial'] ?>)</h2>
    <?php if ($preview['events'] === []): ?>
        <p>No events in the next <?= FETCH_DAYS ?> days.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($preview['events'] as $event): ?>
                <li><?= $event->getDescription(); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>