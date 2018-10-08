<?php
//$absoluteUrl = 'https://www.alegralabs.com/mukesh/symcom/';
$absoluteUrl = 'http://repertorium.loc/';
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// api base url

$baseURL = 'https://alegralabs.com/hemanta/symcom/api/public/v1/';
?>