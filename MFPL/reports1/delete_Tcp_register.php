<?php
require_once "../controller/recipe_update_functions.php";

$tcp_instaltablbe_D=0;
// $id=0;
// // print_r($_POST);exit;
// if(isset($_POST['id'])){
//     $id='id';
// }
// print_r($id);
// $id=$_POST['id'];
$imei_D=$_POST['imeivDelete'];
$tcp_machine_type_D=$_POST['tcp_machine_typevDelete'];
$tcp_sr_D=$_POST['tcp_srvDelete'];

if(isset($_POST['tcp_istaldatevDelete'])){
    $tcp_instaltablbe_D=$_POST['tcp_istaldatevDelete'];
}
// $tcp_instaltablbe_E=$_POST['tcp_instaltableedit'];


$x=delete_tcp($imei_D,$tcp_machine_type_D,$tcp_sr_D,$tcp_instaltablbe_D);
// print_r($x);exit;
if ($x == 1) {
    // user already existed

    // echo ("<script LANGUAGE='JavaScript'>
    //     window.alert('Succesfully Updated');
    //     window.location.href='../add_product.php?display=1';
    //     </script>");
    $response["error"] = 0;
    $response["error_msg"] = "TCP Entry Deleted successfuly";
    echo json_encode($response);
    // exit;
} 




?>