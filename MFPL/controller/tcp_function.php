<?php
//session_start();
function connect()
{

    //$con = mysqli_connect("localhost", "root", "", "disciple");
    $con = mysqli_connect("localhost", "root", "", "tcp_data");

    return $con;
}


function gettcpdata()
{
    $con = connect();
    $data = "";
    $i=0;
    if ($con) {
        $stmt = "SELECT DISTINCT(`imei`) FROM `tcpdata` where startbits='TZ' ORDER BY `imei`";


        // print_r($stmt);exit;
        $data = mysqli_query($con, $stmt);
        // print_r($data);exit;
        if ($data) {
            while ($row = mysqli_fetch_assoc($data)) {
                $i++;

                $products[$i] = $row;
                // print_r($row);





            }
            // print_r($products);exit;
            return $products;
        } else {
            return false;
        }
    }
    else{
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_close($con);
}


function gettcpcount($query)
{
    $con = connect();
    $data = "";
    $products=[];
    $i=0;
    if ($con) {
        $stmt = "SELECT `id`,`imei`,`rct_timestamp`,`alarm_type`,`wifi`,`wifistatus`,`temp`,`battery_voltage` FROM `tcpdata` where $query ORDER BY 'id'";


        // print_r($stmt);exit;
        $data = mysqli_query($con, $stmt);
        // print_r($data);exit;
        if ($data) {
            while ($row = mysqli_fetch_assoc($data)) {
                $i++;

                $products[$i] = $row;
                // print_r($row);





            }
            // print_r($products);exit;
            return $products;
        } else {
            return false;
        }
    }
    else{
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_close($con);
}

?>