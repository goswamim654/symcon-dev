<?php
session_start();
// Site domain

//$absoluteUrl = 'https://www.alegralabs.com/mukesh/symcom/';
$absoluteUrl = 'http://repertorium.loc/';

// full url of a page

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// api base url

$baseApiURL = 'https://www.alegralabs.com/hemanta/symcom/api/public/v1/';


?>