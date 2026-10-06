<?php
require_once('yoctolib/yocto_api.php');
require_once('yoctolib/yocto_display.php');
require_once('yoctolib/yocto_network.php');
require_once('common.php');


/**
 * @param YDisplay $display
 * @param string $error
 */
function error2YDisplay($display, $error)
{
    $display->resetAll();
    // retrieve the display size
    $w = $display->get_displayWidth();
    $h = $display->get_displayHeight();

    // retrieve the first layer
    /** @var YDisplayLayer $l0 */
    $l0 = $display->get_displayLayer(0);
    $l0->clear();

    // display a text in the middle of the screen
    $l0->drawText($w / 2, $h / 2, YDisplayLayer::ALIGN_CENTER, $error);
}


// display an item on a MaxiDisplay
/**
 * @param YDisplay $display
 * @param $allevents
 * @throws YAPI_Exception
 */
function OutputMaxiDisplay($display, $allevents)
{
    $type = $display->get_displayType();

    // clear all layer on top of layer 0 an 1
    $layer_count = $display->get_layerCount();
    for ($i = 2; $i < $layer_count; $i++) {
        /** @var YDisplayLayer $layer */
        $layer = $display->get_displayLayer($i);
        $layer->clear();
    }

    /** @var YDisplayLayer $layer0 */
    $layer0 = $display->get_displayLayer(0);
    $layer0->hide();
    $layer0->clear();
    $h = $display->get_displayHeight();
    $w = $display->get_displayWidth();
    $layer0->selectGrayPen(0);
    $layer0->drawBar(0, 0, $w - 1, $h - 1);
    $layer0->selectGrayPen(255);
    $nblines = 5;
    $curline = 0;
    $line_height = intdiv($h, $nblines);
    $today = date('l j M');
    $last_day = '';
    $evno = 0;
    while ($evno < sizeof($allevents) && $curline < $nblines) {
        $day = $allevents[$evno]->getDateStr();
        if ($last_day != $day) {
            if ($day == $today) {
                $header = TODAY_STR . ": " . $day;
            } else {
                $header = $day;
            }
            $y = $line_height * $curline;
            $layer0->drawBar(0, $y + 8, $w - 1, $y + 8);
            $layer0->drawText(2, $y, YDisplayLayer::ALIGN_TOP_LEFT, $header);
            $curline++;
            $last_day = $day;
        }
        $y = $line_height * $curline;
        $layer0->drawText(10, $y, YDisplayLayer::ALIGN_TOP_LEFT, $allevents[$evno]->getDescription());
        $curline++;
        $evno++;
        if ($curline == $nblines && $allevents[$evno]->getDateStr() == $day) {
            // no more lines available for event: draw line to indicate that there
            // is more events
            $layer0->drawPixel(10, $h - 1);
            $layer0->drawPixel(12, $h - 1);
            $layer0->drawPixel(14, $h - 1);
        }
    }
    $display->swapLayerContent(0, 1);
    $layer1 = $display->get_displayLayer(1);
    $layer1->unhide();

}

$now = time();

/**
 * @param $hubserial
 * @param $msg
 */
function cblog($hubserial, $msg)
{
    print("Log $hubserial: $msg\n");
    file_put_contents("logs/$hubserial.txt", $msg . "\n", FILE_APPEND);
}

try {
    $error = "";
    // Use explicit error handling rather than exceptions
    if (YAPI::TestHub("callback", 10, $error) == YAPI::SUCCESS) {
        //YAPI::SetHTTPCallbackCacheDir("cache");
        // Setup the API to use the VirtualHub on local machine
        $errmsg = "";
        if (YAPI::RegisterHub('callback', $errmsg) != YAPI_SUCCESS) {
            print("Unable to start the API in callback mode ($errmsg)");
            die();
        }
        // some debug logs
        $ynet = YNetwork::FirstNetwork();
        $hub = $ynet->get_module();
        $hubserial = $hub->get_serialNumber();
        if (!is_dir("logs")) {
            mkdir("logs");
        }
        cblog($hubserial, "New connection the " . date('l jS \of F Y h:i:s A', $now));

        // create an array with all connected display
        $display = YDisplay::FirstDisplay();
        // iterate on all display connected to the Hub
        while ($display) {
            // get the display serial number
            $module = $display->module();
            $serial = $module->get_serialNumber();

            // darken screen for 21h to 6h
            $curhour = date("H");
            if ($curhour > 6 && $curhour < 21) {
                $display->set_brightness(90);
            } else {
                $display->set_brightness(10);
            }
            // get event for the display
            $events = getEventsFromSerial($serial);
            if ($events) {
                $module->set_luminosity(0);
                OutputMaxiDisplay($display, $events);
            } else {
                error2YDisplay($display, "Not registered");
            }
            // look if we get another display connected
            $display = $display->nextDisplay();
        }
        die();
    }
} catch (Exception $ex) {
    print($ex);
    file_put_contents("debug.txt", "!!!!!Exception {$ex->getMessage()} \n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Yoctopuce HTTP Callback</title>
</head>
<body>
<b>This example need to be run by a VirtualHub or a YoctoHub.</b><br/>
<ol>
    <li>Connect to the web interface of the VirtualHub or YoctoHub that will run this script.</li>
    <li>Click on the <em>configure</em> button of the VirtualHub or YoctoHub.</li>
    <li>Click on the <em>edit</em> button of "Callback URL" settings.</li>
    <li>Set the <em>type of Callback</em> to <b>Yocto-API Callback</b>.</li>
    <li>Set the <em>callback URL</em> to
        http://<b><?php print($_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['SCRIPT_NAME']); ?></b>.
    </li>
    <li>Click on the <em>test</em> button.</li>
</ol>
</body>
</html>

