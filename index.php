<?php
/**
 * Created by PhpStorm.
 * User: seb
 * Date: 21.10.2014
 * Time: 15:42

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

 */
require_once('common.php');

/**
 *  Setup Google client object with our keys
 *
 */
$client = setup_google_client();
$mysqli = setupDbConnection();



/************************************************
If we're logging out we just need to clear our
local access token in this case
 ************************************************/

/**
 * After the user have authorise our web app google forward the tuser
 * back on this script and pass the "authentification code".
 * This authentification code is valid only once, so we have to exchange it
 * for a long term "access token" with the authenticate function. And save it
 * into the database for the following executions of this script
 */
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    updateToken($mysqli, $client, $serial);
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}


$access_token = getToken($mysqli, $serial);



/************************************************
If we have an access token, we can make
requests, else we generate an authentication URL.
 ************************************************/
if($access_token && isset($access_token['access_token'])) {
    $client->setAccessToken($access_token['access_token']);
    if (isset($_REQUEST['logout'])) {
        $client->revokeToken();
        clearToken($mysqli, $serial, "", "");
        $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
    }

    try {
        if ($client->isAccessTokenExpired()) {
            $client->refreshToken($access_token['refresh_token']);
        }
        $events = getUpcommingEvents($client, 7);
    } catch (Exception $ex){
        $client->revokeToken();
        clearToken($mysqli, $serial, "", "");
        $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
    }
} else {
    $authUrl = $client->createAuthUrl();
}


/************************************************
If we're signed in we can acces to the calendar. Note that we re-store the
access_token bundle, just in case anything
changed during the request - the main thing that
might happen here is the access token itself is
refreshed if the application has offline access.
 ************************************************/

if ($client->getAccessToken()) {
    // get all calendar events

    //Save the refresh token on our database.
    updateToken($mysqli, $client, $serial);
}

?>
<html>
<head>
</head>
<body>
<h1>Fridge Calendar Config page</h1>

<?php if (isset($authUrl)): ?>
    <a href='<?php echo $authUrl; ?>'>log you in!</a>
<?php else: ?>
    <a class='logout' href='?logout'>Logout</a>
    <ul>
        <?php
            foreach($events as $event) {
                print("<li>{$event['what']}</li>");
            }
        ?>
    </ul>

<?php endif ?>

</body>
</html>
