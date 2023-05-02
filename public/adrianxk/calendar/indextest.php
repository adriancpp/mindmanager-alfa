<?php
libxml_use_internal_errors(true);
$url = "https://pogoda.interia.pl/prognoza-dlugoterminowa-wejherowo,cId,37108";
$html = file_get_contents( $url);


$search = '<div class="weather-forecast-longterm-list">';
$replace = '<div class="weather-forecast-longterm-list" id="dziekujeslicznie">';

$html = str_replace($search,
    $replace,
                    $html);

$doc = new DOMDocument();
$doc->loadHtml($html);

$aaa = $doc->getElementById('dziekujeslicznie');

echo json_encode($aaa);