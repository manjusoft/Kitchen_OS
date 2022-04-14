<?php
require_once "../controller/recipe_update_functions.php";



print_r($_POST);exit;


$recipe_id=$_POST['recipe_id'];
$vid=$_POST['vid'];
$rid=$_POST['v_r_id'];
// print_r(($recipe_ID));exit;






$version=select_portions($recipe_id,$vid);
// print_r($version);exit;
$i=0;


$rct_1=0;
$total_T1_1=0;
$total_HT_1=0;
$total_T2_1=0;


$rct_2=0;
$total_T1_2=0;
$total_HT_2=0;
$total_T2_2=0;


$rct_3=0;
$total_T1_3=0;
$total_HT_3=0;
$total_T2_3=0;
                                    

$rct_4=0;
$total_T1_4=0;
$total_HT_4=0;
$total_T2_4=0;


$rct_5=0;
$total_T1_5=0;
$total_HT_5=0;
$total_T2_5=0;


// $recipe_ID=$_POST['recipeid'];


    $version_name=$version['recipe_version'];
    $id=$version['id'];
    $pre_heating_temp=$version['pre_heating_temp'];
    $sleep_time_temp=$version['sleep_time_temp'];
    $sleep_time=$version['sleep_time'];
    $deep_sleep_time=$version['deep_sleep_time'];
    
    
    
    $response['version_name']=$version_name;
    $response['id']=$id;
    $response['pre_heating_temp']=$pre_heating_temp;
    $response['sleep_time_temp']=$sleep_time_temp;
    $response['sleep_time']=$sleep_time;
    $response['deep_sleep_time']=$deep_sleep_time;



    echo json_encode($response);

    ?>