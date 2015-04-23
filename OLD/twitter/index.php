<html>
   <head>
        <meta charset="utf-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/twitter.css">
        <script src="js/tweetLinkit.js"></script>
        
        <script>
            function pageComplete(){
            $('.tweet').tweetLinkify();
            }
        </script>
   </head> 


<body>
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

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json'; //look at documentation on twitter to determine what you need this to be exactly. May not be search/tweets if you want followers, for ex.
$getfield = '?q=%23BostonMarathon&count=20'; //q for query, percent 23 means hastag, baseball if the part with the hastag, and count 20 means you get 20 items

$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);

/*echo $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest(); */           

$string = json_decode($twitter->setGetfield($getfield) 
            ->buildOauth($url, $requestMethod)
            ->performRequest(),$assoc = TRUE);
       
            
foreach($string['statuses'] as $items)
    {
        echo "<div class='row twitter'>";
        echo "<div class='profile-image'>" . "<img src='", $items['user']['profile_image_url'], "'>" . "</div>" . "<br/>";
        echo "<div class='name'>" . $items['user']['name']  . "</div>" . "<br/>";
        echo "<div class='handle'>" . "@" . $items['user']['screen_name'] . "</div>" . "<br/>";
        echo "<div class='when'>" . $items['created_at'] . "<br />";
        echo "<div class='tweet'>" . $items['text'] . "<br/>";
    }
        echo "<script>pageComplete();</script>;"
?>
</body>
</html>
