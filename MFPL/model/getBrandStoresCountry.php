<?php

require_once "../controller/functions.php";

$id = $_POST["id"];

$brandusers = getBrandStores($id);
//print_r($brandusers);exit;

//  print_r($store);exit;
$country=$store['country'];
$countryname=getCountriesById($country);
$state=$store['state'];
$statename=getStatesById($state);
$city=$store['city'];
$cityname=getCityById($city);

$response["country"] = $store['country'];
$response["state"] = $store['state'];
$response["city"] = $store['city'];
$response["countryname"] = $countryname['name'];
$response["statename"] = $statename['name'];
$response["cityname"] = $cityname['name'];
$response["pincode"] = $store['pincode'];




?>