<?php

function connectRecipe()
{

    //$con = mysqli_connect("localhost", "root", "", "disciple");
    $con = mysqli_connect("localhost", "root", "", "mk_db");
  

    return $con;
}




function recipe_update_query($recipe_version,$pre_heating_temp,$sleep_time_Temp,$sleep_time,$deep_sleep_time)
{
    //  print_r($recipe_version);exit;
    $con = connectRecipe();
// print_r($con);exit;

    if ($con) {


        $check_version = "select * from recipe_update_table where recipe_version='$recipe_version'";
        $done1 = mysqli_query($con, $check_version);

        if($done1->num_rows>0){
            return 3;
        }else{

            $stmt = "insert into recipe_update_table(recipe_version,pre_heating_temp,sleep_time_temp,sleep_time,deep_sleep_time)values('$recipe_version','$pre_heating_temp','$sleep_time_Temp','$sleep_time','$deep_sleep_time')";
            // print_r($stmt);exit;
    
                $done = mysqli_query($con, $stmt);
                if ($done) {
    
                    return 0;
                } 
                else  {
                    return 2;
                }
        
            }
            if (!$con){
                die("Connection failed: " . mysqli_connect_error());
            }
            mysqli_close($con);
        }

       
    
}



function  versionTypes(){
    $con = connectDB();
    $data = "";

    if ($con) {
        $stmt = "SELECT id, recipe_version FROM `recipe_update_table` WHERE 1 ORDER BY `id` DESC";
        //print_r($stmt);exit;
        $i = 0;

        $data = mysqli_query($con, $stmt);
        // print_r($data);exit;
        if ($data) {
            while ($row = mysqli_fetch_assoc($data)) {
                $i++;

                $products[$i] = $row;
                //print_r($row['id']);





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



function addVersion($selectversion, $recipeid, $recipe_name,$rct_1, $total_T1_1, $total_HT_1, $total_T2_1,$rct_2, $total_T1_2, $total_HT_2, $total_T2_2,$rct_3, $total_T1_3, $total_HT_3, $total_T2_3,$rct_4, $total_T1_4, $total_HT_4, $total_T2_4,$rct_5, $total_T1_5, $total_HT_5, $total_T2_5){

    $con = connectRecipe();

    if($con){

        $vid = "insert into add_version(selectversion, recipeid, recipe_name,rct_1, total_T1_1, total_HT_1, total_T2_1,rct_2, total_T1_2, total_HT_2, total_T2_2,rct_3, total_T1_3, total_HT_3, total_T2_3,rct_4, total_T1_4, total_HT_4, total_T2_4,rct_5, total_T1_5, total_HT_5, total_T2_5) values('$selectversion', '$recipeid', '$recipe_name','$rct_1', '$total_T1_1', '$total_HT_1', '$total_T2_1','$rct_2', '$total_T1_2', '$total_HT_2', '$total_T2_2','$rct_3', '$total_T1_3', '$total_HT_3', '$total_T2_3','$rct_4', '$total_T1_4', '$total_HT_4', '$total_T2_4','$rct_5', '$total_T1_5', '$total_HT_5', '$total_T2_5')";
// print_r($vid);exit;
       
        $succes = mysqli_query($con,$vid);
        // print_r($succes);exit;

        if($succes){
            return 0;
        }
        else{
            return 2;
        }
    }  else{
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_close($con);

}


function getUpdatedRecipes()
{
    $con = connectDB();
    $data = "";

    if ($con) {
        $stmt = "SELECT * FROM `recipe_update_table` WHERE 1 ORDER BY `id` DESC";
        //print_r($stmt);exit;

        $i = 0;

        $data = mysqli_query($con, $stmt);
        if ($data) {
            while ($row = mysqli_fetch_assoc($data)) {
                $i++;

                $products[$i] = $row;
                //print_r($row['id']);





            }
            //print_r($products);exit;
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




function getrecpid($rid)
{
    $con = connectDB();
    $data = "";

    if ($con) {
        $stmt = "SELECT * FROM `Table: add_version` WHERE `recipe_id`='$rid' ORDER BY `name` ASC";
        //print_r($stmt);exit;
        $i = 0;

        $data = mysqli_query($con, $stmt);
        // print_r($data);exit;
        if ($data) {
            while ($row = mysqli_fetch_assoc($data)) {

                //print_r($row);exit;
                $i++;

                $products[$i] = $row;
            }
            //print_r($products);exit;
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


function  recipe_table(){
    {
        $con = connectDB();
        $data = "";
    
        if ($con) {
            $stmt = "SELECT * FROM `recipe_update_table` WHERE 1 ORDER BY `id` DESC";
            // print_r($stmt);exit;
    
            $i = 0;
    
            $data = mysqli_query($con, $stmt);
            if ($data) {
                while ($row = mysqli_fetch_assoc($data)) {
                    $i++;
    
                    $products[$i] = $row;
                    // print_r($row['id']);
    
    
                }
                //print_r($products);exit;
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
    
}



function  select_version_ID($id){
    {
        $con = connectRecipe();
        $data = "";
        $products=[];
        if ($con) {
            $stmt = "SELECT * FROM `recipe_update_table` where `id`=$id  ORDER BY `recipe_update_table`.`recipe_version`  DESC";
            // print_r($stmt);exit;
            
            $i = 0;
    
            $data = mysqli_query($con, $stmt);
            $row = mysqli_fetch_assoc($data);
          
                return $row;
        
        }
        else{
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_close($con);
    }
    
}



function select_portions($recipe_id,$vid){
    {
        $con = connectRecipe();
        $data = "";
        $products=[];
        if ($con) {
            $stmt = "SELECT * FROM `add_version` WHERE `selectversion`= $recipe_id AND `recipeid`= $vid";
            // print_r($stmt);exit;
            
            $i = 0;
    
            $data = mysqli_query($con, $stmt);
            $row = mysqli_fetch_assoc($data);
          
                return $row;
        
        }
        else{
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_close($con);
    }
    
}

?>