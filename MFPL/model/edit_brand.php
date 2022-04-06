<?php

require_once "../controller/functions.php";

//$response = array("error" => 0);
//print_r($_POST);exit;
//print_r($_FILES);
// Array
// (
//     [brandname] => OLA
//     [outlets] => 1 - 5
//     [address] => jayanagar
//     [pincode] => 590000
//     [country] => 101
//     [state] => 17
//     [city] => 3683
//     [personname] => bapu
//     [designation] => manager
//     [phone] => 8095843663
//     [email] => bapu@gmail.com
// )
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$brandname = test_input($_POST['brandname']);
$phone = test_input($_POST["phone"]);

$email = test_input($_POST["email"]);
$reason = $_POST['reason'];
$updateby = $_POST['updateby'];
// check if name only contains letters and whitespace
//
$phone = preg_replace("/[^0-9]/", "", $phone);
//print_r($phone);exit;

(int)$output = substr($phone, -10, -9);
//print_r(strlen($phone));exit;
if (empty($_POST['brandname'])) {
    $response["error"] = 3;
    
    $response["error_msg"] = "Enter brand Name";
    echo json_encode($response); 
} else if (!(strlen($phone) == 10)) {
    $response["error"] = 3;
    
    $response["error_msg"] = "Phone Number should be 10 digit";
    echo json_encode($response);
} else if ($output < 6) {
    //echo "6";


    $response["error"] = 3;
    $response["error_msg"] = "Phone Number Should start with 6,7,8,9";
    echo json_encode($response);
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response["error"] = 3;
    $response["error_msg"] = "Email Format not valid";
    echo json_encode($response);
} else if (empty($_POST['reason'])) {
    //echo "6";


    $response["error"] = 3;
    $response["error_msg"] = "Enter Reason";
    echo json_encode($response);
} else  if (empty($_POST['updateby'])) {
    //echo "6";


    $response["error"] = 3;
    $response["error_msg"] = "Enter Updated by whom";
    echo json_encode($response);
} elseif(!empty($_POST['brandname'])  && !empty($_POST['address'])  && !empty($_POST['personname']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['city'])&& !empty($reason)  && !empty($updateby)) {

    // receiving the post params
    $id=$_POST['id'];
    $brandname = $brandname;
    $outlets = $_POST['outlets'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $country = $_POST['country'];
    
    $state = $_POST['state'];
    $city = $_POST['city'];
    $personname = $_POST['personname'];
    $designation = $_POST['designation'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
$x=editBrand($id,$brandname,$outlets,$address,$pincode,$country,$state,$city,$personname,$designation,$phone,$email,$password,$reason,$updateby);
//echo($x);exit;
if ($x==0) {
        // user already existed
    
    // echo ("<script LANGUAGE='JavaScript'>
    //     window.alert('Succesfully Updated');
    //     window.location.href='../add_product.php?display=1';
    //     </script>");
     $response["error"] = 0;
        $response["error_msg"] = "brand updated successfully ";
        echo json_encode($response);


}
else{

    // echo ("<script LANGUAGE='JavaScript'>
    //     window.alert('unknown error occurred in adding');
    //     window.location.href='../add_product.php';
    //     </script>");
     $response["error"] = 1;
            $response["error_msg"] = " brand not updated";
            echo json_encode($response);
}



} else {
 // echo ("<script LANGUAGE='JavaScript'>
 //    window.alert('required parameters are missing');
 //    window.location.href='../add_product.php';
 //    </script>");
  $response["error"] = 3;
    $response["error_msg"] = "Required parameters  is missing!";
    echo json_encode($response);
}

?>