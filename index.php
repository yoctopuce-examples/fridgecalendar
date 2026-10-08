<?php

require_once __DIR__ . '/common.php';

$errors = [];
$preview = null;

$callback_url =  $_SERVER['REQUEST_SCHEME'] . '://'.$_SERVER['SERVER_NAME'] .  $_SERVER['SCRIPT_NAME'];
$callback_url = str_replace('index.php', 'callback.php', $callback_url);


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
    } else {
        $preview = ['serial' => $serial, 'events' => $events];
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

        div {
            margin-top: .8rem;
        }

        input[type=text] {
            width: 100%;
            box-sizing: border-box;
        }

        .error {
            color: #b00;
        }

        code {
            display: block;
            padding: 16px;
            border: 1px solid black;
        }
    </style>

    <script>

        function copysetting() {
            navigator.clipboard.writeText(document.getElementById("cbset").innerHTML);
        }


        function downsettings() {
            let blob = new Blob([document.getElementById("cbset").innerHTML], {type: 'application/json'});
            let url = URL.createObjectURL(blob);
            let a = document.createElement('a');
            a.href = url;
            a.download = "callback_settings.json";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</head>
<body>
<h1>Fridge Calendar</h1>

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
    <div>
        <button type="submit">Register</button>
        <button type="reset">Cancel</button>
    </div>
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
                    <button onclick="document.location='?preview=<?= urlencode($serial) ?>'">Preview</button>
                    <form method="post" style="display:inline">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="serial" value="<?= $serial ?>">
                        <button type="submit">Remove</button>
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
                <li><?= $event->getDateStr() ." ". $event->getDescription(); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>


<h2>HTTP callback settings</h2>
<p>The folowing parameters need to be copied to the YoctoHub or VirtualHub</p>

<code id="cbset">
    {
    "callbackUrl": "<?php print($callback_url); ?>",
    "callbackMethod": "POST",
    "callbackEncoding": "YOCTO_API"
    }
</code>
<div>
    <button onclick="copysetting()">Copy settings</button>
    <button onclick="downsettings()">Download settings</button>
</div>
<p>Alternatively you can configure the YoctoHub/VirtualHub manually:</p>
<ol>
    <li>Connect to the web interface of the VirtualHub or YoctoHub that will run this script.</li>
    <li>Click on the <em>configure</em> button of the VirtualHub or YoctoHub.</li>
    <li>Click on the <em>edit</em> button of "Callback URL" settings.</li>
    <li>Set the <em>type of Callback</em> to <b>Yocto-API Callback</b>.</li>
    <li>Set the <em>callback URL</em> to
        <b><?php print($callback_url); ?></b>.
    </li>
    <li>Click on the <em>test</em> button.</li>
</ol>
</body>
</html>