<?php
// Simple CORS proxy in PHP
// PHP script make an HTTP request to the URL,
// capture the response, and then return it bypassing the CORS restrictions.

// - the $url variable is passed in as a query parameter
// - uses the curl library to make an HTTP request to the specified URL.
// - The response from the URL returned to the frontend
// - The header function is used to set the appropriate CORS headers, allowing the response to be accessed from any domain.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$url = $_GET['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
