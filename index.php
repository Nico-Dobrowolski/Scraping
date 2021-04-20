<?php

require_once './simple_html_dom.php';
$url = "https://siteweb.com";
$ch = curl_init($url); 
//curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIE, 'name=value'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$response = curl_exec($ch);
curl_close($ch);
//----
$html = new simple_html_dom();
$html->load($response);
$accordion = $html->find('div.panel-group');
$items = array();
$index = 0;
foreach($html->find('div.panel-group') as $html) {
    foreach($html->find('div.panel.panel-default') as $panel){
        $items[$index++] = $panel->plaintext;
    }
}
var_dump($items);

