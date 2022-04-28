<?php

require_once "../controller/tcp_function.php";
$con = connect();

$select_imei="SELECT DISTINCT `imei` `timestamp`,`alarm_type`,`rct_timestamp`,`temp` FROM `tcpdata` WHERE `timestamp` BETWEEN '2022-04-07 12:41' AND '2022-04-09 12:41'";

$only_emie = $select_imei['imei'];





?>