<?php
require_once 'controller/functions.php';
//Start the session.
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "meta.php"; ?>
</head>

<body>

    <?php include "header.php"; ?>
    <!-- ======= Sidebar ======= -->
    <?php include "sidebar.php"; ?>
    <?php require_once "controller/functions.php"; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Overall Recipe Count </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Overall Recipe Count </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Base</h5>

                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Overall Recipe Count</button>
                        </li>
                        <!-- <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Weekly</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Mothly</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="year-tab" data-bs-toggle="tab" data-bs-target="#year-justified" type="button" role="tab" aria-controls="year" aria-selected="false">Yearly</button>
                        </li> -->
                    </ul>
                    <div class="tab-content pt-2" id="myTabjustifiedContent">
                        <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Search Accourding To</h5>

                                    <!-- Floating Labels Form -->
                                    <form class="row g-3" id="recipecount">


                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="ptype" name="ptype" aria-label="">
                                                    <option value="">All</option>
                                                    <?php
                                                    $ptypes = getProductTypes();
                                                    //print_r($ptypes);
                                                    foreach ($ptypes  as $ptype) {
                                                    ?>
                                                        <option value="<?php echo $ptype['id']; ?>"><?php echo $ptype['name']; ?> <?php echo $ptype['version']; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <label for="floatingSelect">Machine Type</label>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="machine" name="machine" aria-label="">
                                                    <option value=""></option>
                                                    <?php
                                                    // $devices = getAssignedDevices();
                                                    // $i = 0;
                                                    // foreach ($devices as $device) {
                                                    //     $i++;
                                                    //     //print_r($machine);
                                                    //     $machine = getSingleMachine($device['machine_id']);
                                                    ?>
                                                    <option value="<?php //echo  $machine['id']; 
                                                                    ?>"><?php //echo  $machine['name']; 
                                                                        ?></option>
                                                    <?php
                                                    //  }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Machines</label>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="brand" name="brand" aria-label="">
                                                    <option value="" selected>All</option>
                                                    <?php
                                                    $result = getBrands();
                                                    $i = 0;
                                                    //print_r($result);
                                                    foreach ($result as $row) {
                                                        $i++;
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['brand_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Brand</label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="user" name="user" aria-label="">
                                                    <option value="" selected></option>
                                                    <?php
                                                    $result = getusers();
                                                    $i = 0;
                                                    //print_r($result);
                                                    foreach ($result as $row) {
                                                        $i++;
                                                    ?>
                                                        <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                </select>
                                                <label for="floatingSelect">User Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="store" name="store" aria-label="">
                                                    <option value="" selected></option>
                                                    <?php
                                                    $result = getStores();
                                                    $i = 0;
                                                    //print_r($result);
                                                    foreach ($result as $row) {
                                                        $i++;
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['store_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <label for="floatingSelect">Store Name</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-3" id="countrydiv">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="country" name="country" aria-label="">
                                                    <option></option>
                                                    <option value="101">India</option>
                                                    <?php

                                                    $result = getCountries();
                                                    foreach ($result as $row) {
                                                        //print_r($result);
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="statediv">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="state" name="state" aria-label="">

                                                </select>
                                                <label for="floatingSelect">States</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="citydiv">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="city" name="city" aria-label="">

                                                </select>
                                                <label for="floatingSelect">City</label>
                                            </div>
                                        </div> -->

                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="fromdate" name="fromdate" max="<?= date('Y-m-d'); ?>" placeholder="From Date">
                                                <label for="floatingEmail">From Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="todate" name="todate" max="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>" placeholder="To Date">
                                                <label for="floatingEmail">To Date</label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <!-- <input type="button" id="export" class="btn btn-success" value="Export"> -->
                                        </div>
                                    </form><!-- End floating Labels Form -->

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recipe Count Brand Wise</h5>

                        <div id="columnChart"></div>


                    </div>
                </div>
            </div>



            <div class="col-lg-12" style="display:none">
                <!-- <div class="col-lg-12"> -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recipe Count</h5>


                        <!-- Table with stripped rows -->
                        <table id="brandlist" class="table datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">count</th>
                                    <th scope="col">date</th>


                                </tr>
                            </thead>
                            <tbody id="brandlist1">






                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>


    </main><!-- End #main -->

    <?php include "footer.php"; ?>


    <script>
        $(document).ready(function() {
            $('#ptype').on('change', function() {
                var id = this.value;
                //console.log(country_id);
                $.ajax({
                    url: "model/getPtypeMachines.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(result) {
                        //console.log(result);
                        $("#machine").html(result);
                        //  $('#city1').html('<option value="">Select State First</option>');
                    }
                });
            });

        });

        $(document).ready(function() {
            $('#brand').on('change', function() {
                var id = this.value;
                //console.log(id);
                $.ajax({
                    url: "model/getBrandUsers.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(result) {
                        //console.log(result);
                        $("#user").html(result);
                        //$('#city').html('<option value="">Select State First</option>');
                    }
                });
            });
            $('#brand').on('change', function() {
                var id = this.value;
                //console.log(id);
                $.ajax({
                    url: "model/getBrandStores.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(result) {
                        //console.log(result);
                        $("#store").html(result);
                        //$('#city').html('<option value="">Select State First</option>');
                    }
                });
            });
        });


        $(document).ready(function() {
            $('#country').on('change', function() {
                var country_id = this.value;
                //console.log(country_id);
                $.ajax({
                    url: "contry_state_city/states-by-country.php",
                    type: "POST",
                    data: {
                        country_id: country_id
                    },
                    cache: false,
                    success: function(result) {
                        //console.log(result);
                        $("#state").html(result);
                        //$('#city').html('<option value="">Select State First</option>');
                    }
                });
            });
            $('#state').on('change', function() {
                var state_id = this.value;
                // console.log(state_id);
                $.ajax({
                    url: "contry_state_city/cities-by-state.php",
                    type: "POST",
                    data: {
                        state_id: state_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#city").html(result);
                    }
                });
            });
        });

        $(document).ready(function(e) {
            $('#machine').on('change', function() {

                // var dropdown = $(this);

                //$('#countrydiv').hide();
                //$('#statediv').hide();
                //$('#citydiv').hide();
                $('#brand').val('');
                $('#store').val('');
                $('#user').val('');
                $('#country').val('');
                $('#state').val('');
                $('#city').val('');



            });
        });

        $(document).ready(function(e) {
            $('#store').on('change', function() {

                var id = this.value;
                //console.log(id);
                $.ajax({
                    url: "model/getStoreDetails.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        //console.log(obj);
                        //$("#store").html(obj.);
                        // $('#mname1').val(obj.p_name);
                        // $('#mphone1').val(obj.p_phone);
                        // $('#memail1').val(obj.p_email);
                        $('#country').html('<option value="' + obj.country + '">' + obj.countryname + '</option>');
                        $('#state').html('<option value="' + obj.state + '">' + obj.statename + '</option>');
                        $('#city').html('<option value="' + obj.city + '">' + obj.cityname + '</option>');

                        // $('#pincode1').val(obj.pincode);
                    }
                });





            });
        });


        $(document).ready(function(e) {
            $("#export").on('click', (function(e) {
                $("#columnChart").load(location.href + " #columnChart");
                $("#brandlist").load(location.href + " #brandlist");
                var ptype = $("#ptype").val();
                var machine = $("#machine").val();
                var brand = $("#brand").val();
                var user = $("#user").val();
                var country = $("#country").val();
                var state = $("#state").val();
                var city = $("#city").val();
                var fromdate = $("#fromdate").val();
                var todate = $("#todate").val();

                // console.log(ptype+"..."+machine+"..."+brand+"..."+user+"..."+country+"..."+state+"..."+city);  
                // var dataString={ptype:ptype};//+"&machine="+machine+"&brand="+brand+"&user="+user+"&country="+country+"&state="+state+"&city="+city+"&fromdate="+fromdate+"&todate="+todate;
                var data = $('form').serialize();
                $.ajax({

                    type: 'post',
                    url: 'reports/recipecount.php',
                    data: data,
                    success: function(responce) {
                        var obj = jQuery.parseJSON(responce);
                        var string1 = obj.error;
                        var output = obj.error_msg;
                        var dates = obj.dates;
                        var hourwiserc = obj.hourlywiserc;
                        var hourly = obj.hourly;
                        if (obj.error == 0 && dates[0] != '') {
                            //swal(output);

                            console.log(output);
                            console.log(dates);
                            var k = 0;
                            $.each(output, function(i, item) {
                                //$('#brandlist').append('<br/>');
                                // $.each(dates, function(i, field) {
                                // if (field != '' && item.data[i] != 0) {
                                k++;
                                $('#brandlist1').append('<tr><th scope="row">' + k + '</th><td>' + item + '</td><td>' + dates[i] + '</td></tr>');
                                //  }
                                // $.each(item.data, function(i, data) {

                                // });
                                // });
                            });

                            $(function() {

                                $("#brandlist").table2excel({
                                    filename: "Table.xls"
                                });

                            });




                        } else if (obj.error == 2) {
                            swal(output);
                        } else {

                            swal("no data found");

                        }
                    },
                    error: function() {}

                });
            }));
        });


        $(document).ready(function(e) {
            $("#recipecount").on('submit', (function(e) {
                e.preventDefault();
                //$('#loader-icon').show();
                //var valid;  
                //valid = validateContact();
                //if(valid) {

                $("#columnChart").load(location.href + " #columnChart");
                // $("#brandlist").load(location.href + " #brandlist");
                // $('html,body').animate({
                //     scrollTop: $('#columnChart').offset().top
                // }, 0);
                $.ajax({
                    url: "reports/recipecountbrandwise.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        var string1 = obj.error;
                        var output = obj.error_msg;
                        var count = obj.count;
                        var brand = obj.brand;
                        // var hourwiserc = obj.hourlywiserc;
                        // var hourly = obj.hourly;
                        // console.log(count);
                        //console.log(brand);
                        if (obj.error == 0) {
                            //swal(output);

                            //console.log(output[data]); 
                            //console.log(dates[0]);


                            var options = {
                                series: [{
                                    name: 'Total counts',
                                    data: count
                                }],
                                chart: {


                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: '55%',
                                        endingShape: 'rounded'
                                    },

                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                },
                                xaxis: {

                                    categories: brand,
                                },
                                yaxis: {
                                    title: {
                                        text: 'Count'
                                    }
                                },
                                fill: {
                                    opacity: 1
                                },
                                tooltip: {
                                    y: {
                                        formatter: function(val) {
                                            return " " + val + " counts"
                                        }
                                    }
                                }
                            };

                            var chart = new ApexCharts(document.querySelector("#columnChart"), options);
                            chart.render();



                            // var options = {
                            //     chart: {
                            //         // type: "area",
                            //         type: "area",
                            //         height: 300,
                            //         foreColor: "#999",
                            //         stacked: true,
                            //         dropShadow: {
                            //             enabled: true,
                            //             enabledSeries: [0],
                            //             top: -2,
                            //             left: 2,
                            //             blur: 5,
                            //             opacity: 0.06
                            //         }
                            //     },
                            //     colors: ['#0090FF', '#00E396'],
                            //     stroke: {
                            //         curve: "smooth",
                            //         width: 3
                            //     },
                            //     dataLabels: {
                            //         enabled: false
                            //     },
                            //     series: [{
                            //         name: 'Total Counts',
                            //         data: generateDayWiseTimeSeries(0, dates.length)
                            //     }],
                            //     markers: {
                            //         size: 0,
                            //         strokeColor: "#fff",
                            //         strokeWidth: 3,
                            //         strokeOpacity: 1,
                            //         fillOpacity: 1,
                            //         hover: {
                            //             size: 6
                            //         }
                            //     },
                            //     xaxis: {
                            //         type: "datetime",
                            //         axisBorder: {
                            //             show: false
                            //         },
                            //         axisTicks: {
                            //             show: false
                            //         }
                            //     },
                            //     yaxis: {
                            //         labels: {
                            //             offsetX: 14,
                            //             offsetY: -5
                            //         },
                            //         tooltip: {
                            //             enabled: true
                            //         }
                            //     },
                            //     grid: {
                            //         padding: {
                            //             left: -5,
                            //             right: 5
                            //         }
                            //     },
                            //     tooltip: {
                            //         x: {
                            //             format: "dd MMM yyyy"
                            //         },
                            //     },
                            //     legend: {
                            //         position: 'top',
                            //         horizontalAlign: 'left'
                            //     },
                            //     fill: {
                            //         type: "solid",
                            //         fillOpacity: 0.7
                            //     }
                            // };

                            // var chart = new ApexCharts(document.querySelector("#columnChartday"), options);

                            // chart.render();

                            // function generateDayWiseTimeSeries(s, count) {
                            //     var values = [
                            //         output
                            //     ];
                            //     var i = 0;
                            //     var series = [];
                            //     var x = new Date(dates[0]).getTime();
                            //     while (i < count) {
                            //         series.push([x, values[s][i]]);
                            //         x += 86400000;
                            //         i++;
                            //     }
                            //     return series;
                            // }




                        } else if (obj.error == 2) {
                            swal(output);
                        } else {

                            swal("no data found");

                        }
                    },
                    error: function() {}

                });
                //}
            }));
        });
    </script>

    <script src="assets/js/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">

    </script>
</body>

</html>