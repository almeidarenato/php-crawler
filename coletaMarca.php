<?php
require('vendor/autoload.php');

use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

$client = new Client([
  // Base URI is used with relative requests
  'headers' => ['user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36']

]);
// marcas
$URL = 'https://www.kimovil.com/pt/todas-as-marcas-de-telemoveis';
$html = $client->request('GET', $URL)->getBody();
$dom = HtmlDomParser::str_get_html($html);

//trata o template GSMArena/Marca
//foreach ($dom->find('tr td a') as $key => $marca) {
//  $posicao = strrpos($marca->innertext, '<br>');
//$string = substr($marca->innertext, 0, $posicao);
//echo $string . "\n";
//}

//trata o template Kimovil/Marca
foreach ($dom->find('h3[class=k-h4]') as $key => $marca) {
  echo $marca->innertext() . "\n";
}

//
