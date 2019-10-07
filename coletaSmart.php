<?php
require('vendor/autoload.php');

use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

$client = new Client([
  // Base URI is used with relative requests
  'headers' => ['user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36']

]);
// marcas
$URL = 'https://www.kimovil.com/pt/precos-telefones-xiaomi';
$html = $client->request('GET', $URL)->getBody();
$dom = HtmlDomParser::str_get_html($html);


//trata o template Kimovil/Smartphone/Xiaomi
foreach ($dom->find('ul[class=simple-device-list clear] li[class=item] a') as $key => $smart) {
  $smartUrl = $smart->href;
  //echo $smartUrl;
  $smarthtml = $client->request('GET', $smartUrl)->getBody();
  $smartDom = HtmlDomParser::str_get_html($smarthtml);
  echo $smartDom->find('a[class=current]')[0]->plaintext;
}

//
