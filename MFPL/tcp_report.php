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
    <?php
    //  require_once "controller/functions.php"; 
    require_once "controller/tcp_function.php"; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Recipe Count Report</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Recipe Count Report</li>
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
                            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Recipe Count</button>
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
                                    <form class="row g-3" id="tcp_report">


                                        <div class="col-md-3">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="imei" name="imei" aria-label="">
                                                    <option value="">All</option>
                                                    <?php
                                                    $ptypes = gettcpdata();
                                                    // print_r($ptypes);
                                                    foreach ($ptypes  as $ptype) {
                                                    ?>
                                                        <option value="<?php echo $ptype['imei']; ?>"><?php echo $ptype['imei']; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <label for="floatingSelect">IMEI</label>
                                            </div>
                                        </div>
                                        
                                        <br>
                                        
                                       
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3" id="statediv">
                                                <select class="form-select" id="alarm" name="alarm" aria-label="">
                                                <option value="">All </option>
                                                <option value="aa">Interval data</option>
                                                <option value="10">Low Battery alarm</option>
                                                <option value="a0">Temprature over threshold</option>
                                                <option value="a1">Temprature sensor ubnormal</option>
                                                <option value="61"> External power disconnect</option>

                                                </select>
                                                <label for="floatingSelect">Alarm type</label>
                                            </div>
                                        </div>
                                       

                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="fromdate" name="fromdate" max="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d', strtotime("-1 month", strtotime(date('Y-m-d')))); ?>" placeholder="From Date">
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
                                            <button type="reset" class="btn btn-secondary"><a href="recipe_count_report.php" style="color:white">Reset</a></button>
                                            <input type="button" id="export" class="btn btn-success" value="Export">
                                        </div>
                                    </form><!-- End floating Labels Form -->

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        
            <div class="col-lg-12" id="tcp_table">
                <!-- <div class="col-lg-12"> -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recipe Count</h5>


                        <!-- Table with stripped rows -->
                        <table id="brandlist" class="table datatable " style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">date</th>
                                    <th scope="col">imei</th>
                                    <th scope="col">alarm type</th>
                                    <th scope="col">wifi</th>
                                    <th scope="col">status</th>
                                    <th scope="col">temprature</th>
                                    <th scope="col">battery voltage</th>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/date.js"></script>
    <script>
         $(document).ready(function(e) {
            $("#export").on('click', (function(e) {
                // $("#tcp_table").load(location.href + " #tcp_table");

                // var imei = $("#imei").val();
                // var alarm = $("#alarm").val();
                //   var fromdate = $("#fromdate").val();
                // var todate = $("#todate").val();

                // console.log(ptype+"..."+machine+"..."+brand+"..."+user+"..."+country+"..."+state+"..."+city);  
                // var dataString={ptype:ptype};//+"&machine="+machine+"&brand="+brand+"&user="+user+"&country="+country+"&state="+state+"&city="+city+"&fromdate="+fromdate+"&todate="+todate;
                var data = $('form').serialize();
                $.ajax({

                    type: 'post',
                    url: 'reports/tcp_process.php',
                    data: data,
                    success: function(responce) {
                       // $("#tcp_table").load(location.href + " #tcp_table");
                        // console.log(responce);
                     var obj = jQuery.parseJSON(responce);
                        // console.log(obj);
                        //var string1 = obj.error;
                        var output = obj.result;
                        // console.log(output);
                         if (obj.error == 0 && output[0] != '') {
                            //swal(output);

                          
                            var k = 0;
                            $.each(output, function(i, item) {
                                //$('#brandlist').append('<br/>');
                                // $.each(dates, function(i, field) {
                                // if (field != '' && item.data[i] != 0) {
                                k++;
                                var date = item.rct_timestamp;
                                var imei = item.imei;
                                var alarm = item.alarm_type;
                                var wifi = item.wifi;
                                var ws = item.wifistatus;
                                var tmp = item.temp;
                                var bv = item.battery_voltage;
                                $('#brandlist1').append('<tr><th scope="row">' + k + '</th><td>' + date + '</td><td>' + imei + '</td><td>' + alarm + '</td><td>' + wifi + '</td><td>' + ws + '</td><td>' + tmp + '</td><td>' + bv + '</td></tr>');
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
                        }
                    },
                    error: function() {}

                });
            }));
        });

      
    </script>
    <script src="assets/js/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">

    </script>
</body>

</html>