<?php

require_once "../controller/functions.php";

$id = $_POST["id"];
$uid = $_POST["uid"];
$assignedDevice = getPtypeAndUserMachines($id,$uid);
// print_r($assignedDevice);exit;

if($assignedDevice[1]==''){
    ?>
    <option value="">No Machines in this Type</option>
    <?php

}else{
    ?>
    <option value="" selected></option>
    <?php
    $i=0;
    //$machine_id = $assignedDevice['machine_id'];
    foreach($assignedDevice as $device)
    {
        $machine=getSingleMachine($device);
        //print_r($machine);exit;
        ?>
            <option value="<?php echo $machine['id'];?>"><?php echo $machine['name'];?></option>
        <?php
    
    }
}






?>