<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('account/verify_credentials');
$contentExeter = $connection->get('https://api.twitter.com/1.1/search/tweets.json?q=home&geocode=50.717303,-3.533442,4mi&lang=en&result_type=mixed&count=5');
//$contentExeter = $connection->get('https://stream.twitter.com/1.1/statuses/sample.json?locations=50.717303,-3.533442,50.717303,-2.533442');
//$contentLondon = $connection->get('https://api.twitter.com/1.1/search/tweets.json?q=norris&geocode=51.509490,-0.113497,10mi&lang=en&result_type=mixed&count=20');




/* Include HTML to display on the page */
include('html.inc');
