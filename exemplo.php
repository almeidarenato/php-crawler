<?php

echo ("versao 1 - crawler' . \n");
echo ("começar");

$link = 'https://comparador.tecmundo.com.br/buscar';
function listaLinks($url)
{
  libxml_use_internal_errors(true);
  $document = new DOMDocument();
  $document->loadHTML(file_get_contents($url));
  libxml_use_internal_errors(false);
  $links = $document->getElementsByTagName('a');

  foreach ($links as $link) {
    echo $link->getAttribute('href') . "\n";

    //echo 
  }
  echo "\n" . 'terminou';
}
listaLinks($link);
