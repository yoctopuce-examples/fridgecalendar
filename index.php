<html>
<head>
</head>
<body>
<pre>

<?php
/**
 * Created by PhpStorm.
 * User: seb
 * Date: 21.10.2014
 * Time: 15:42

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

 */
require_once('common.php');
$client = setup_google_client();
$mysqli = setupDbConnection();

/************************************************
Make an API request on behalf of a user. In
this case we need to have a valid OAuth 2.0
token for the user, so we need to send them
through a login flow. To do this we need some
information from our API console project.
 ************************************************/



/************************************************
If we're logging out we just need to clear our
local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
    clearToken($mysqli, $serial, "", "");
    unset($_SESSION['access_token']);
    DIE("LOGOUT");
}

/************************************************
If we have a code back from the OAuth 2.0 flow,
we need to exchange that with the authenticate()
function. We store the resultant access token
bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    updateToken($mysqli, $client, $serial);
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    print('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
    die();
}


$access_token = getToken($mysqli, $serial);


/************************************************
If we have an access token, we can make
requests, else we generate an authentication URL.
 ************************************************/
if($access_token['access_token']) {
    $client->setAccessToken($access_token['access_token']);
    if ($client->isAccessTokenExpired()) {
        $client->refreshToken($access_token['refresh_token']);
    }
} else {
    $authUrl = $client->createAuthUrl();
    print("<a href=\"$authUrl\"> log you in</a><br/>");
}


/************************************************
If we're signed in we can acces to the calendar. Note that we re-store the
access_token bundle, just in case anything
changed during the request - the main thing that
might happen here is the access token itself is
refreshed if the application has offline access.
 ************************************************/
$events_to_show = array();

if ($client->getAccessToken()) {
    // get all calendar events

    $events = getUpcommingEvents($client, 7);
    print_r($events);
    //Save the refresh token on our database.
    updateToken($mysqli, $client, $serial);
}

?>

</pre>
</body>
</html>
