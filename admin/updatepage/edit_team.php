<?php 
include('../db.php');
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GREEN VALID</title>
	<!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='../http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="../settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a  href="../messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
					<li>
                        <a href="../roombook.php"><i class="fa fa-bar-chart-o"></i>Room Booking</a>
                    </li>
                    <li>
                        <a  href="../payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  href="../profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
					<li>
                        <a  href="../add_galary.php"><i class="fa fa-qrcode"></i> Add Galary</a>
                    </li>
                    <li>
                        <a  href="../manage_galary.php"><i class="fa fa-qrcode"></i> Manage Galary</a>
                    </li>
                    <li>
                        <a  href="../add_team.php"><i class="fa fa-qrcode"></i> Add Team</a>
                    </li>
                     <li>
                        <a class="active-menu" href="../manage_team.php"><i class="fa fa-qrcode"></i> Manage Team</a>
                    </li>

                    <li>
                        <a  href="../add_visitor.php"><i class="fa fa-qrcode"></i> Add Visitor</a>
                    </li>
                    <li>
                        <a  href="../manage_visitor.php"><i class="fa fa-qrcode"></i> Manage Visitor</a>
                    </li>

                    <li>
                        <a href="../logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Add Galary<small> </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
				 
				 
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">

                                <?php
                                //Get id from team   
                                $edit_id = $_GET['id'];
                                //select all information for get value information 
                                $sql1 = "SELECT * FROM `team` where team_id = '$edit_id'";
                                $result1 = mysqli_query($con,$sql1);
                                //fetch information

                                $row = mysqli_fetch_array($result1);
                                $team_name = $row['team_name'];
                                $team_position = $row['team_position'];
                                $team_description =$row['team_description'];


                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label>Team Name:</label>
                                    <input type="text" name="team_name" value="<?php echo $team_name ; ?>"><br>
                                    <label>Team Position:</label>
                                    <input type="text" name="team_position" value="<?php echo $team_position ; ?>"><br>
                                    <label>Team Description:</label>
                                    <textarea name="team_desctription" rows="5" cols="50">
                                        <?php echo $team_description ; ?>
                                    </textarea>
                                    <br>
                                    <input type="submit" name="submit" value="update Galary">
                                </form>
                                 <?php 
                                if (isset($_POST['submit'])) {
                                    $team_name = $_POST['team_name'];
                                    $team_position = $_POST['team_position'];
                                    $team_desctription = $_POST['team_desctription'];
                                    //Update information in team table 
                                    $sql = "UPDATE `team` SET `team_name`='$team_name',`team_position`='$team_position',`team_description`='$team_desctription' WHERE `team_id`='$edit_id'";
                                    
                                    $result = mysqli_query($con,$sql);

                                    if ($result) {
                                        echo '<script>alert("Team updated Successfully") </script>' ;
                                        echo "<script>window.open('../manage_team.php','_self')</script>";
                                    }else{
                                        echo '<script>alert("Team Not Updated ") </script>' ;
                                        echo "<script>window.open('../manage_team.php','_self')</script>";
                                    }
                                }

                                ?> 
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                </div>
               
            </div>
        
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
