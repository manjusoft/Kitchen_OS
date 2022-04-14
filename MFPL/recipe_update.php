<?php
require_once 'controller/recipe_update_functions.php';
//Start the session.
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "meta.php"; ?>

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .cssh5 {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: 40px;
        }

        .boxstyle {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

</head>

<body>

    <?php include "header.php"; ?>
    <!-- ======= Sidebar ======= -->
    <?php include "sidebar.php"; ?>


    <main id="main" class="main">
        <?php
        //print_r($_GET);exit;
        if (!empty($_REQUEST['page'])) {

            $page = $_REQUEST['page'];

            // if ($page == 5) {

            //     $status5 = 'active';
            //     $area5 = 'true';
            // } else if ($page == 4) {

            //     $status4 = 'active';
            //     $area4 = 'true';
            // } else if ($page == 3) {

            //     $status3 = 'active';
            //     $area3 = 'true';
            // } else 
            if ($page == 2) {

                $status2 = 'active';
                $area2 = 'true';
            } else if ($page == 1) {

                $status1 = 'active';
                $area1 = 'true';
            } else {
                $status1 = 'active';
                $status2 = '';
                $area1 == 'true';
                $area2 = 'false';
            }
        } else {
            $status1 = 'active';
            $area1 = 'true';
        }
        ?>
        <div class="pagetitle">
            <h1>Brand Registration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Recipe Update </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>

                    <!-- Bordered Tabs Justified -->
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 <?php echo $status1; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="<?php echo $area1; ?>">Create New Recipe</button>
                        </li>
                        <!-- <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Contact Person</button>
                        </li> -->

                    </ul>
                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                        <div class="tab-pane fade show <?php echo $status1; ?>" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Create New Recipe</h5>

                                        <form class="row g-3" id="addrecipe">

                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="rversion" name="rversion" placeholder="Your Name" autocomplete="off" required />
                                                    <label for="floatingName">Recipe Version</label>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" max="300" class="form-control" id="heatingtemp" name="heatingtemp" data-bs-toggle="tooltip" data-bs-original-title="Enter only in Celcius" placeholder="Your Name" autocomplete="off" required />
                                                    <label for="floatingName">Pre Heating Temp (<span>&#8451;</span>)</label>
                                                    <span id="message"> </span>


                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="temp1" name="temp1" placeholder="Your Name" autocomplete="off" required />
                                                    <label for="floatingName">Sleep Time Temp</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="sleeptime" name="sleeptime" placeholder="Your Name" autocomplete="off" required />
                                                    <label for="floatingName">Sleep Time</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="deepsleep" name="deepsleep" placeholder="Your Name" autocomplete="off" />
                                                    <label for="floatingName">Deep Sleep Time</label>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" id="submit" class="btn bg-primary text-white col-md-2">Add Version</button>

                                        </form>





                                        <form class="row g-3 " autocomplete="off" id="sendversion" action="">



                                            <hr class="style4 mt-4" style="border-top: 1px solid black;">

                                            <div class="col-md-3">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="selectversion" aria-label="State" name="selectversion" placeholder="Machine Type">
                                                        <option selected> </option>
                                                        <?php
                                                        $ptypes =  versionTypes();
                                                        foreach ($ptypes as $ptype) {
                                                            //print_r($ptype['name']);
                                                        ?>
                                                            <option value="<?php echo $ptype['id']; ?>"><?php echo $ptype['recipe_version']; ?></option>
                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                    <label for="floatingSelect">Select Version </label>
                                                </div>
                                            </div>




















                                            <div class="col-md-3">
                                                <div class="col-md-12">

                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="recipeid" aria-label="State" name="recipeid" placeholder="Machine Type">
                                                            <option selected> 1</option>
                                                            <option> 2</option>
                                                            <option> 3</option>
                                                            <option> 4</option>
                                                            <option> 5</option>
                                                            <option> 6</option>
                                                            <option> 7</option>
                                                            <option> 8</option>
                                                            <option> 9</option>
                                                            <option> 10</option>
                                                        </select>





                                                        <label for="floatingSelect">Select Recipe ID</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating ">
                                                    <input type="text" class="form-control " id="recipe_name" name="recipe_name" placeholder="PINCODE">
                                                    <label for="designation">Recipe Name</label>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-floating ">
                                                    <button type="button" id="selectandadd" class="btn  col-md-12 bg-primary  text-light text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne ">Add Portion</button>

                                                </div>
                                            </div>
                                            <div id="collapseOne" class="accordion-collapse collapse  col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row g-3" style="display: flex;justify-content: space-evenly;">










                                                        <div class="col-md-2 mt-5">
                                                            <div class="col-md-12">

                                                                <div class="col-md-12">

                                                                    <div class="form-floating ">
                                                                        <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefirst" aria-expanded="true" aria-controls="collapsefirst "> Portion 1</button>
                                                                    </div>

                                                                    <div id="collapsefirst" class="accordion-collapse collapse  col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                        <br>
                                                                        <div class="col-md-12">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temperature</h5>
                                                                            <input type="text" class="form-control" id="rct_1" name="rct_1" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">

                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                            <div class="col-md-12">

                                                                                <div class="row g-3 ">

                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T1Min_1" name="T1Min_1" autocomplete="off" />
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" data-bs-toggle="tooltip" data-bs-original-title="secons shouls be within 59" id="T1Sec_1" name="T1Sec_1" autocomplete="off" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="htMin_1" name="htMin_1" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_1" name="htSec_1" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                            <div class="col-md-6">
                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T2Min_1" name="T2Min_1" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_1" name="T2Sec_1" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            </div>




                                                        </div>









                                                        <div class="col-md-2 mt-5">
                                                            <div class="col-md-12">

                                                                <div class="col-md-12">

                                                                    <div class="form-floating ">
                                                                        <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo "> Portion 2</button>
                                                                    </div>

                                                                    <div id="collapsetwo" class="accordion-collapse collapse  col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                        <br>

                                                                        <div class="col-md-12">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temperature</h5>
                                                                            <input type="text" class="form-control" id="rct_2" name="rct_2" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">

                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">

                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T1Min_2" name="T1Min_2" autocomplete="off" />
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T1Sec_2" name="T1Sec_2" autocomplete="off" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="htMin_2" name="htMin_2" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_2" name="htSec_2" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                            <div class="col-md-6">
                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T2Min_2" name="T2Min_2" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_2" name="T2Sec_2" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            </div>




                                                        </div>












                                                        <div class="col-md-2 mt-5">
                                                            <div class="col-md-12">

                                                                <div class="col-md-12">

                                                                    <div class="form-floating ">
                                                                        <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree "> Portion 3</button>
                                                                    </div>

                                                                    <div id="collapsethree" class="accordion-collapse collapse  col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                        <br>

                                                                        <div class="col-md-12">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temperature</h5>
                                                                            <input type="text" class="form-control" id="rct_3" name="rct_3" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">

                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">

                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T1Min_3" name="T1Min_3" autocomplete="off" />
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T1Sec_3" name="T1Sec_3" autocomplete="off" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="htMin_3" name="htMin_3" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_3" name="htSec_3" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                            <div class="col-md-6">
                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T2Min_3" name="T2Min_3" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_3" name="T2Sec_3" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            </div>




                                                        </div>










                                                        <div class="col-md-2 mt-5">
                                                            <div class="col-md-12">

                                                                <div class="col-md-12">

                                                                    <div class="form-floating ">
                                                                        <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour "> Portion 4</button>
                                                                    </div>

                                                                    <div id="collapsefour" class="accordion-collapse collapse  col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                        <br>

                                                                        <div class="col-md-12">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temperature</h5>
                                                                            <input type="text" class="form-control" id="rct_4" name="rct_4" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">

                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">

                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T1Min_4" name="T1Min_4" autocomplete="off" />
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T1Sec_4" name="T1Sec_4" autocomplete="off" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="htMin_4" name="htMin_4" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_4" name="htSec_4" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                            <div class="col-md-6">
                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T2Min_4" name="T2Min_4" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_4" name="T2Sec_4" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            </div>




                                                        </div>









                                                        <div class="col-md-2 mt-5">
                                                            <div class="col-md-12">

                                                                <div class="col-md-12">

                                                                    <div class="form-floating ">
                                                                        <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive "> Portion 5</button>
                                                                    </div>

                                                                    <div id="collapsefive" class="accordion-collapse collapse  col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                        <br>

                                                                        <div class="col-md-12">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temperature</h5>
                                                                            <input type="text" class="form-control" id="rct_5" name="rct_5" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">

                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">

                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T1Min_5" name="T1Min_5" autocomplete="off" />
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T1Sec_5" name="T1Sec_5" autocomplete="off" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                            <div class="col-md-6">

                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="htMin_5" name="htMin_5" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_5" name="htSec_5" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 boxstyle">
                                                                            <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                            <div class="col-md-6">
                                                                                <div class="row g-3 ">
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="T2Min_5" name="T2Min_5" autocomplete="off" />

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_5" name="T2Sec_5" autocomplete="off" />

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            </div>




                                                        </div>










                                                        <div class="text-center mt-5">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-secondary"><a href="brand_registration.php" style="color:white">Reset</a></button>
                                                        </div>
                                                    </div>

                                                </div>
                                        </form>












                                    </div>
                                </div>



                            </div>


                        </div>






                    </div>


                    <!-- New Recipe Details Table -->


                    <div class="card-body" style="overflow-x:auto;">
                        <h5 class="card-title">New Recipe Details</h5>




                        <div class="dataTable-container">
                            <table id="devicelist" class="table datatable ">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="" style="width: 4.18042%;"><a href="#" class="dataTable-sorter">#</a></th>
                                        <th scope="col" data-sortable="" style="width: 7.92079%;"><a href="#" class="dataTable-sorter">Action</a></th>
                                        <th scope="col" data-sortable="" style="width: 14.5215%;"><a href="#" class="dataTable-sorter">Recipe Verion</a></th>
                                        <th scope="col" data-sortable="" style="width: 9.68097%;"><a href="#" class="dataTable-sorter">Pre Heating Temp</a></th>
                                        <th scope="col" data-sortable="" style="width: 10.011%;"><a href="#" class="dataTable-sorter">Sleep Time Temp</a></th>
                                        <th scope="col" data-sortable="" style="width: 9.46095%;"><a href="#" class="dataTable-sorter">Sleep Time</a></th>
                                        <th scope="col" data-sortable="" style="width: 16.1716%;"><a href="#" class="dataTable-sorter">Deep Sleep Time</a></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $devices = recipe_table();
                                    // print_r($devices);
                                    $i = 0;
                                    foreach ($devices as $device) {

                                        // print_r($device);exit;

                                        $id = $device['id'];
                                        $recipe_version = $device['recipe_version'];
                                        // print_r($recipe_version);exit;

                                        $pht = $device['pre_heating_temp'];
                                        $heattemp1 = $device['sleep_time_temp'];
                                        $sleep_time = $device['sleep_time'];
                                        $deep_sleep = $device['deep_sleep_time'];


                                        //print_r($machine);
                                        // print_r($brand);
                                        // print_r($user);
                                        //print_r($store);
                                        {
                                            $i++;
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><button type="submit" class="btn btn-success" onclick="viewmodel(<?php echo $id;
                                                                                                                                    ?>)"><i class="far fa-edit"></i></button></td>

                                                <td><?php echo $recipe_version ?></td>
                                                <td><?php echo $pht ?> </td>
                                                <td><?php echo $heattemp1 ?></td>
                                                <td><?php echo $sleep_time ?></td>
                                                <td><?php echo $deep_sleep ?></td>




                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>


                                </tbody>

                            </table>

                        </div>


                    </div>






                    <!-- Edit Box Model -->
                    <div class="modal fade" id="verticalycentered1" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Assigned Device Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="edit_here" type="button" role="tab" aria-controls="view" aria-selected="true">View</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="edit" aria-selected="false">Edit</button>
                                    </li>

                                </ul>


                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"></h5>




                                            <form class="row g-3" id="addrecipe">

<div class="col-md-4">
    <div class="form-floating">
        <input type="text" class="form-control" id="vvrversion" name="vrversion" placeholder="Your Name" autocomplete="off" readonly />
        <label for="floatingName">Recipe Version</label>
    </div>
</div>


<div class="col-md-4">
    <div class="form-floating">
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" max="300" class="form-control" id="vheatingtemp" name="heatingtemp" data-bs-toggle="tooltip" data-bs-original-title="Enter only in Celcius" placeholder="Your Name" autocomplete="off" readonly />
        <label for="floatingName">Pre Heating Temp (<span>&#8451;</span>)</label>
        <span id="message"> </span>


    </div>
</div>

<div class="col-md-4">
    <div class="form-floating">
        <input type="text" class="form-control" id="vvtemp1" name="vtemp1" placeholder="Your Name" autocomplete="off" readonly />
        <label for="floatingName">Sleep Time Temp</label>
    </div>
</div>

<div class="col-md-4">
    <div class="form-floating">
        <input type="text" class="form-control" id="vvsleeptime" name="vsleeptime" placeholder="Your Name" autocomplete="off" readonly />
        <label for="floatingName">Sleep Time</label>
    </div>
</div>

<div class="col-md-4">
    <div class="form-floating">
        <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="vvdeepsleep" name="deepsleep" placeholder="Your Name" autocomplete="off" readonly/>
        <label for="floatingName">Deep Sleep Time</label>
    </div>
</div>






<div class="divider"></div>
</form>








                                            <div class="row g-3 mt-3" style="justify-content: space-evenly;">
                                            <input type="hidden" class="form-control " id="version_id" name="version_id" placeholder="PINCODE">
                                                <div class="col-md-3">

                                                    <div class="form-floating ">
                                                        <input type="text" class="form-control " id="version_name" name="version_name" placeholder="PINCODE">
                                                        <label for="designation">Select Version</label>
                                                    </div>

                                                </div>




                                                <div class="col-md-3">
                                                    <div class="col-md-12">

                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" id="recipeidview" aria-label="State" name="recipeidview" placeholder="Machine Type">
                                                                <option selected> 1</option>
                                                                <option> 2</option>
                                                                <option> 3</option>
                                                                <option> 4</option>
                                                                <option> 5</option>
                                                                <option> 6</option>
                                                                <option> 7</option>
                                                                <option> 8</option>
                                                                <option> 9</option>
                                                                <option> 10</option>
                                                            </select>





                                                            <label for="floatingSelect">Select Recipe ID</label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-md-3">

                                                    <div class="form-floating ">
                                                        <input type="text" class="form-control " id="recipe_name" name="recipe_name" placeholder="PINCODE">
                                                        <label for="designation">Recipe Name</label>
                                                    </div>

                                                </div>



                                            </div>
                                            <div class="row g-3 mt-3" style="justify-content: space-evenly;">


                                                <div class="col-md-2">

                                                    <div class="col-md-12">

                                                        <div class="form-floating ">
                                                            <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefirst" aria-expanded="true" aria-controls="collapsefirst "> Portion 1</button>
                                                        </div>

                                                        <div id="collapsefirst" class="col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <br>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temp</h5>
                                                                <input type="text" class="form-control" id="rct_1" name="rct_1" autocomplete="off" />
                                                            </div>

                                                            <div class="col-md-12 boxstyle">

                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                <div class="col-md-12">

                                                                    <div class="row g-3 ">

                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T1Min_1" name="T1Min_1" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" data-bs-toggle="tooltip" data-bs-original-title="secons shouls be within 59" id="T1Sec_1" name="T1Sec_1" autocomplete="off" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                <div class="col-md-6">

                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="htMin_1" name="htMin_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_1" name="htSec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                <div class="col-md-6">
                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T2Min_1" name="T2Min_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_1" name="T2Sec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="col-md-2">

                                                    <div class="col-md-12">

                                                        <div class="form-floating ">
                                                            <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefirst" aria-expanded="true" aria-controls="collapsefirst "> Portion 2</button>
                                                        </div>

                                                        <div id="collapsefirst" class="col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <br>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temp</h5>
                                                                <input type="text" class="form-control" id="rct_1" name="rct_1" autocomplete="off" />
                                                            </div>

                                                            <div class="col-md-12 boxstyle">

                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                <div class="col-md-12">

                                                                    <div class="row g-3 ">

                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T1Min_1" name="T1Min_1" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" data-bs-toggle="tooltip" data-bs-original-title="secons shouls be within 59" id="T1Sec_1" name="T1Sec_1" autocomplete="off" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                <div class="col-md-6">

                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="htMin_1" name="htMin_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_1" name="htSec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                <div class="col-md-6">
                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T2Min_1" name="T2Min_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_1" name="T2Sec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>





                                                <div class="col-md-2">

                                                    <div class="col-md-12">

                                                        <div class="form-floating ">
                                                            <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefirst" aria-expanded="true" aria-controls="collapsefirst "> Portion 3</button>
                                                        </div>

                                                        <div id="collapsefirst" class="col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <br>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temp</h5>
                                                                <input type="text" class="form-control" id="rct_1" name="rct_1" autocomplete="off" />
                                                            </div>

                                                            <div class="col-md-12 boxstyle">

                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                <div class="col-md-12">

                                                                    <div class="row g-3 ">

                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T1Min_1" name="T1Min_1" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" data-bs-toggle="tooltip" data-bs-original-title="secons shouls be within 59" id="T1Sec_1" name="T1Sec_1" autocomplete="off" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                <div class="col-md-6">

                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="htMin_1" name="htMin_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_1" name="htSec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                <div class="col-md-6">
                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T2Min_1" name="T2Min_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_1" name="T2Sec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="col-md-2">

                                                    <div class="col-md-12">

                                                        <div class="form-floating ">
                                                            <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefirst" aria-expanded="true" aria-controls="collapsefirst "> Portion 4</button>
                                                        </div>

                                                        <div id="collapsefirst" class="col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <br>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temp</h5>
                                                                <input type="text" class="form-control" id="rct_1" name="rct_1" autocomplete="off" />
                                                            </div>

                                                            <div class="col-md-12 boxstyle">

                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                <div class="col-md-12">

                                                                    <div class="row g-3 ">

                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T1Min_1" name="T1Min_1" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" data-bs-toggle="tooltip" data-bs-original-title="secons shouls be within 59" id="T1Sec_1" name="T1Sec_1" autocomplete="off" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                <div class="col-md-6">

                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="htMin_1" name="htMin_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_1" name="htSec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                <div class="col-md-6">
                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T2Min_1" name="T2Min_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_1" name="T2Sec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="col-md-2">

                                                    <div class="col-md-12">

                                                        <div class="form-floating ">
                                                            <button type="button" class="btn btn-dark text-dark col-md-12 bg-light  text-primary text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefirst" aria-expanded="true" aria-controls="collapsefirst "> Portion 5</button>
                                                        </div>

                                                        <div id="collapsefirst" class="col-12" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <br>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size: 15px; font-weight:bold">Recipe Cutoff Temp</h5>
                                                                <input type="text" class="form-control" id="rct_1" name="rct_1" autocomplete="off" />
                                                            </div>

                                                            <div class="col-md-12 boxstyle">

                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T1</h5>

                                                                <div class="col-md-12">

                                                                    <div class="row g-3 ">

                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T1Min_1" name="T1Min_1" autocomplete="off" />
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" data-bs-toggle="tooltip" data-bs-original-title="secons shouls be within 59" id="T1Sec_1" name="T1Sec_1" autocomplete="off" />
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Holding Time</h5>
                                                                <div class="col-md-6">

                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="htMin_1" name="htMin_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="htSec_1" name="htSec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 boxstyle">
                                                                <h5 style="font-size: 15px; font-weight:bold">Cooking Time T2</h5>
                                                                <div class="col-md-6">
                                                                    <div class="row g-3 ">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="T2Min_1" name="T2Min_1" autocomplete="off" />

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" max="59" class="form-control" id="T2Sec_1" name="T2Sec_1" autocomplete="off" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>



                                            </div>
                                        </div>





                                    </div>

                                    <div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>









                            </div>
                        </div>


                        <!-- End Bordered Tabs Justified -->
                        <!-- <div class="tab-content pt-2" id="borderedTabJustifiedContent"> -->



                        <div>
































                        </div>

                    </div>
                </div>



        </section>


    </main><!-- End #main -->


























    <?php include "footer.php"; ?>
 


<script>

    
$(document).ready(function() {
            $("#addrecipe").on('submit', (function(e) {
                e.preventDefault();

                var data = $('form').serialize();
                $.ajax({

                    type: 'post',
                    url: 'reports1/recipe_update1.php',
                    data: data,

                    cache: false,
                    processData: false,

                    success: function(recipe) {
                        var obj = jQuery.parseJSON(recipe);
                        console.log(obj);
                        if (obj.error == 0) {
                            Swal.fire({
                                icon: 'success',
                                text: obj.error_msg,
                                timer: 2500

                            })

                            setTimeout(function() {
                                window.location.href = 'recipe_update.php?page=1';
                            }, 2500);
                        } else if (obj.error == 2) {
                            Swal.fire({
                                icon: 'error',
                                text: obj.error_msg,
                                timer: 2500

                            })

                            setTimeout(function() {
                                window.location.href = 'recipe_update.php?page=1';
                            }, 2000);
                        }

                    },
                    error: function() {
                        alert("Program is wrong");
                    }
                })
            }))
        });










        $(document).ready(function() {
            $("#sendversion").on('submit', (function(e) {
                e.preventDefault();

                var data = $('form').serialize();
                $.ajax({

                    type: 'post',
                    url: 'reports1/storeversion_process.php',
                    data: data,

                    cache: false,
                    processData: false,

                    success: function(recipe) {
                        var obj = jQuery.parseJSON(recipe);
                        console.log(obj);
                        if (obj.error == 0) {
                            Swal.fire({
                                icon: 'success',
                                text: obj.error_msg,
                                timer: 2500

                            })

                            setTimeout(function() {
                                window.location.href = 'recipe_update.php?page=1';
                            }, 2500);
                        } else if (obj.error == 2) {
                            Swal.fire({
                                icon: 'error',
                                text: obj.error_msg,
                                timer: 2500

                            })

                            setTimeout(function() {
                                window.location.href = 'recipe_update.php?page=1';
                            }, 2000);
                        }

                    },
                    error: function() {
                        alert("Program is wrong");
                    }
                })
            }))
        });



        //clearing items from the list which are alredy selected
        // $(function(){
        //     $("#fruitlist").bind("click",function(){
        //         $("#selectandadd option:selected").fadeOut();
        //     });
        // });





        $(document).ready(function() {
            $('#selectversion').on('change', function() {
                var country_id = this.value;
                //console.log(country_id);
                $.ajax({
                    url: "cahngeid.php",
                    type: "POST",
                    data: {
                        country_id: country_id
                    },
                    cache: false,
                    success: function(result) {
                        //console.log(result);
                        $("#recipeid").html(result);
                        // $('#storecity2').html('<option value=""></option>');
                    }
                });
            });
        });



        $("#heatingtemp").keyup(function(event) {
            k = event.which;
            // console.log(k)
            var mobile = document.getElementById('heatingtemp');


            var message = document.getElementById('message');

            var goodColor = "#0C6";
            var badColor = "#FF9B37";
            var gc = "#FFFFFF";
            // console.log(mobile.value.length)
            if (mobile.value.length == 1) {
                // console.log(mobile.value.length)
                if (mobile.value >= 3) {
                    mobile.style.backgroundColor = gc;
                    message.style.color = badColor;
                    message.innerHTML = "  Enter only within 300  ";
                }
            } else if (mobile.value <= 300) {
                // if (mobile.value.length <= 3) {

                //     mobile.style.backgroundColor = gc;
                //     message.style.color = badColor;
                //     message.innerHTML = "  ";

                // } else {


                mobile.style.backgroundColor = gc;
                message.style.color = goodColor;
                message.innerHTML = "    ";

                //     if (k == 8) {
                //         return true;
                //     } else {

                //         event.preventDefault();
                //         return false;

                //     }
                // }
            } else {



                mobile.style.backgroundColor = gc;
                message.style.color = badColor;
                message.innerHTML = "  Enter only within 300  ";
            }
        });






        $("#T1Sec_1").keyup(function(event) {
            k = event.which;
            // console.log(k)
            var mobile = document.getElementById('T1Sec_1');


            var message = document.getElementById('message');

            var goodColor = "#0C6";
            var badColor = "#FF9B37";
            var gc = "#FFFFFF";
            // console.log(mobile.value.length)
            if (mobile.value.length == 1) {
                // console.log(mobile.value.length)
                if (mobile.value >= 6) {
                    mobile.style.backgroundColor = gc;
                    message.style.color = badColor;
                    message.innerHTML = "  Enter only within 300  ";
                }
            } else if (mobile.value <= 59) {
                // if (mobile.value.length <= 3) {

                //     mobile.style.backgroundColor = gc;
                //     message.style.color = badColor;
                //     message.innerHTML = "  ";

                // } else {


                mobile.style.backgroundColor = gc;
                message.style.color = goodColor;
                message.innerHTML = "    ";

                //     if (k == 8) {
                //         return true;
                //     } else {

                //         event.preventDefault();
                //         return false;

                //     }
                // }
            } else {



                mobile.style.backgroundColor = gc;
                message.style.color = badColor;
                message.innerHTML = "  Enter only within 300  ";
            }
        });



function viewmodel(mid) {
   // console.log(mid);
$.ajax({
    url: "reports1/getrecipeID.php",
    type: "POST",
    data: {
        id: mid
    },
    cache: false,
    success: function(result) {

        var obj = jQuery.parseJSON(result);
        console.log(obj);
        $("#verticalycentered1").modal("show");
       // var version_name = obj['version_name'];
     
        $("#vvrversion").val(obj['version_name']);
        $("#vheatingtemp").val(obj['pre_heating_temp']);
        $("#vvtemp1").val(obj['sleep_time_temp']);
        $("#vvsleeptime").val(obj['sleep_time']);
        $("#vvdeepsleep").val(obj['deep_sleep_time']);


        $("#version_name").val(obj['version_name']);

        $("#version_id").val(obj['id']);
    
     

        // $("#useremail3").val(obj['p_email']);
        // $("#userphone3").val(obj['p_phone']);
        // $("#userpassword3").val(obj['password']);
      


      
    }

});



}


$(document).ready(function() {
            $('#recipeidview').on('change', function() {
                var recipe_id = this.value;
                // var recipe_id = document.getElementById('recipeid');
               var vid =$("#version_id").val();
            //     console.log(recipe_id);
            //    console.log(vid);
                $.ajax({
                    url: "reports1/getportions.php",
                     type: "POST",
                     data: {
                                recipe_id: recipe_id, 
                                vid: vid
                           },
                //     cache: false,
                //     success: function(result) {
                //         //console.log(result);
                //         $("#state1").html(result);
                //         //$('#city1').html('<option value="">Select State First</option>');
                    
                });
            });
          
        });
</script>

</body>

</html>