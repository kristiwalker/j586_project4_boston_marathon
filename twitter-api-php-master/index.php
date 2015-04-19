<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "119175339-LSNwJ0WD6CusmxbdL1BFTkKuCuOJm0YUWK6o04oO",
    'oauth_access_token_secret' => "T5FOSmEzbev0aSPXdoWE6juMBxtetq0L0X2MOOrQZLTtS",
    'consumer_key' => "xjfRKIHZrHO0pSLPGy2wZvtgT",
    'consumer_secret' => "iOPnb5aWl2nXKdsgYlrfB3hU9PmqEVJYHG5fBm3MwpFsVcvVQE"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);

/** Perform a POST request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json'; //look at documentation on twitter to determine what you need this to be exactly. May not be search/tweets if you want followers, for ex.
$getfield = '?q=%23baseball&count=20'; //q for query, percent 23 means hastag, baseball if the part with the hastag, and count 20 means you get 20 items
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
/**echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();**/

$string = json_decode($twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest(),$assoc = TRUE);
