<?php
/**
 * Plugin Name:     Bitly Share Url Shortner
 * Plugin URI:      http://rimborsoenergetico.it
 * Description:     Create new post type, called Products
 * Author:          Marcin Jakubik
 * Author URI:      YOUR SITE HERE
 * Text Domain:     products-post-type
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Sample_Plugin
 */
//plugin translation
function bitly_share_url_shortner_setup() {
load_plugin_textdomain('bitly-share-url-shortner', false, dirname(plugin_basename(__FILE__)) . '/lang/');
} // end custom_theme_setup
add_action('after_setup_theme', 'bitly_share_url_shortner_setup');

//URL SHORTNER bit.ly
// function bitly($url){
//   $bitly_login = "o_m961vn3fr";
//   $bitly_api = "R_0ba64d0cfb1e426a8d610157c2154b0c";
//   $format = "json";
//   $version = "3.0";

//   $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$bitly_login.'&apiKey='.$bitly_api.'&format='.$format;

//   $response = file_get_contents($bitly);

//   if(strtolower($format) == 'json')
//     {
//         $json = @json_decode($response,true);
//         return $json['results'][$url]['shortUrl'];
//     }
//     else //for xml formatting
//     {
//         $xml = simplexml_load_string($response);
//         echo 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
//     }
// }

//Social Share link generator
function shareSocialLinks($url, $title){
  $bitly_url = wp_get_shortlink(get_the_ID());
  $crunchifyURL = urlencode($url);
  $crunchifyBitlyURL = urlencode($bitly_url);

  $crunchifyTitle = str_replace( ' ', '%20', $title);


  $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyBitlyURL.'&amp;via=rimborsoenergetico';
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
  $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyBitlyURL;
  $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;

  return array($facebookURL, $twitterURL, $linkedInURL, $whatsappURL);
}