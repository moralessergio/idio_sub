My [incomplete] solution for Idio's task 1

This is the first time I use twitter's api, so it took me a while to get around the authentication process. 
I ended using Abraham's authentication library, as recommended in the API documentation. I din't change the text
in the demo file to prevent any confusion on me claiming most of this is my code.

This project get's some tweets based on location. My first idea was to use the GET statuses/sample with a geoBox 
around Exeter and another for London, but couldn't make that request to work. So I ended up using a simple search 
(GET search/tweets) with random words. Failing to use a real random sample as provided by the API, ideally, I 
would generate a dictionary of words to search for in order to collect some statistics. This implementation only 
uses 1 word though: norris

On the good side, there are 2 different searches based on geolocations. The first one is a search around 
Exeter (with a radious of 4 miles), and the second one is centered in London (with a radious of 10 Miles).
The next step was, for each of the 2 streams, to iterate through the text fields and through each word. Then 
for each word, check wheather it is correctly spelled (omitting urls, hashtags, usernames, and capitalized words), 
and keep a counter. Finally, divide the number of misspelled words by the total number of words to normalize the 
scores and make them comparable.

For this solution to work, just uncompress all the files in a php server and load the base directory (or index.php).
An implementation can be seen at: 
http://serch.me/demos/idio/twitteroauth-master/

I have to admit this was good fun, but not obvious for a first timer. 
