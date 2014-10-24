<?php
require_once('yoctolib/yocto_api.php');
require_once('yoctolib/yocto_display.php');
require_once('common.php');


function getEventsFromSerial($serial)
{
    $mysqli = setupDbConnection();
    $access_token = getToken($mysqli, $serial);
    if (!$access_token) {
        // this display is not registered
        return FALSE;
    }

    $client = setup_google_client();
    try {
        $client->setAccessToken($access_token['access_token']);
        if ($client->isAccessTokenExpired()) {
                $client->refreshToken($access_token['refresh_token']);
        }

        $res = getUpcommingEvents($client,7);
        updateToken($mysqli,$client, $serial);
    } catch (Google_Auth_Exception $ex){
        // the user has revoked our token
        return FALSE;
    }
    return $res;
}


/**
 * @param $display YDisplay
 * @param $error
 */
function error2YDisplay($display, $error)
{
    $display->resetAll();
    // retrieve the display size
    $w=$display->get_displayWidth();
    $h=$display->get_displayHeight();

    // retrieve the first layer
    /** @var YDisplayLayer $l0 */
    $l0=$display->get_displayLayer(0);
    $l0->clear();

    // display a text in the middle of the screen
    $l0->drawText($w / 2, $h / 2, YDisplayLayer::ALIGN_CENTER, $error );
}


// display an item on a MaxiDisplay
/**
 * @param $display YDisplay
 * @param $events
 */
function OutputMaxiDisplay($display, $events)
{
    /** @var YDisplayLayer $layer0 */
    $layer0 = $display->get_displayLayer(0);
    $layer0->clear();
    $h = $display->get_displayHeight();
    $w = $display->get_displayWidth();
    $layer0->selectGrayPen(0);
    $layer0->drawBar(0,0,$w-1,$h-1);
    $layer0->selectGrayPen(255);
    $nblines = 5;
    $line_height = $h / $nblines;
    $ev_pos = 0;

    $today = date('D j M:', $events[0]['when']);
    $last_day="";
    for($i =0; $i< $nblines; $i++) {
        $y =$line_height * $i;
        $day = date('D j M:', $events[$ev_pos]['when']);
        if ($last_day!=$day) {
            if ($i==$nblines-1){
                // do not display day header if it's the last line
                break;
            }
            $last_day = $day;
            if ($day==$today)
                $day="TODAY: ".$day;
            print("line $i: $day\n");
            $layer0->drawBar(0,$y+8,$w-1,$y+8);
            $layer0->drawText(2, $y, YDisplayLayer::ALIGN_TOP_LEFT, $day);
        } else{
            print("line $i: {$events[$ev_pos]['what']}\n");
            $layer0->drawText(10, $y, YDisplayLayer::ALIGN_TOP_LEFT, $events[$ev_pos]['what']);
            $ev_pos++;
        }
    }
    $display->swapLayerContent(0,1);


}

// Use explicit error handling rather than exceptions
YAPI::DisableExceptions();

// Setup the API to use the VirtualHub on local machine
$errmsg = "";
if(YAPI::RegisterHub('callback',$errmsg) != YAPI_SUCCESS) {
    print("Unable to start the API in callback mode ($errmsg)");
    die();
}

print("registered");

// create an array with all connected display
/** @var YDisplay $display */
$display = YDisplay::FirstDisplay();
// iterate on all display connected to the Hub
while ($display) {
    // get the display serial number
    /** @var YModule $module */
    $module = $display->module();
    $serial = $module->get_serialNumber();
    $events = getEventsFromSerial($serial);
    if ($events) {
        OutputMaxiDisplay($display, $events);
    } else {
        error2YDisplay($display, "Not registered");
    }
    // look if we get another display connected
    $display = $display->nextDisplay();
}




