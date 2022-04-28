<?php
require_once "../controller/recipe_update_functions.php";

$tcp_instaltablbe_E=0;
// $id=0;
// // print_r($_POST);exit;
// if(isset($_POST['id'])){
//     $id='id';
// }
// print_r($id);
// $id=$_POST['id'];
$imei_E=$_POST['imeiedit'];
$tcp_machine_type_E=$_POST['tcp_machine_typeedit'];
$tcp_sr_E=$_POST['tcp_sredit'];

if(isset($_POST['tcp_instaldateedit'])){
    $tcp_instaltablbe_E=$_POST['tcp_instaldateedit'];
}
// $tcp_instaltablbe_E=$_POST['tcp_instaltableedit'];


$x=edit_tcp($imei_E,$tcp_machine_type_E,$tcp_sr_E,$tcp_instaltablbe_E);
// print_r($x);exit;
if ($x == 1) {
    // user already existed

    // echo ("<script LANGUAGE='JavaScript'>
    //     window.alert('Succesfully Updated');
    //     window.location.href='../add_product.php?display=1';
    //     </script>");
    $response["error"] = 0;
    $response["error_msg"] = "TCP Updated successfuly";
    echo json_encode($response);
    // exit;
} 




?>