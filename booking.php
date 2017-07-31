<!-- 
  Created by : Ashish Chandrakant Naik
  2013 - 2017
  St. francis Institute of tech
-->
<?php
session_start();
ob_start();
include_once('include/connection.php');
include_once('include/data.php');


$data = new Article();
if(isset($_SESSION['logged_in'])){
	   if($_GET['drop']=="logout")
    {
        session_destroy();
        header('Location:aboutus.php');
    }
    if($_GET['drop']=="booking")
    {
        header('Location:booking.php');
    }
    $article = $data->fetch_data($_SESSION['username']);
	$se = $data->fetch($_SESSION['username']);
    $serial = $se['serial'];
    $rows = $data->this($serial);
   
    $row = $rows;
    

    if(isset($_POST['check'])){
        $booking = $rows[0]['serial_book'];
        $query = $pdo->prepare('delete from book where serial_book=?');
        $query->bindValue(1,$booking);
        $query->execute();
        header('Location:booking.php');
        echo "done";
    }
	?>
<HTML>
<HEAD>
	<link rel="stylesheet" href="main.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<style type="text/css">
  body {
          overflow-x: hidden;
    overflow-y: hidden;
       }
       td{
        padding: 25px;
        color:#F0A122;
        font-size:25px;
       }
       #del{
        width:200px;
        border-radius: 50px;
        box-shadow: none;
        background-color: slategray;

       }
</style>
</HEAD>
<BODY>
<div class="a">
<nav class="navbar navbar-default ">
    <div class="col-lg-3 col-sm-2 col-xs-3  col-md-2">
        <img src="taxi.jpg" width="75px" class="logo">
    </div>
    <div class="col-lg-3 col-sm-4 col-xs-8 col-xs-push-1 col-md-4">
        <span class="glyphicon glyphicon-earphone phone">
        </span> 
        <span class="number">123-125-333</span>
    </div>
         <form action="aboutus.php" method='get'>
                        <select onchange='this.form.submit();' name ='drop'class="col-lg-1 col-lg-push-3">
                            
                                <option value="user">
                                     <?php echo $_SESSION["username"]; ?></option>
                                <option value="booking">
                                    Bookings</option>
                                <option value="logout">
                                    Log out</option>
                                   
                                                         
                        </select>
        </form>
        <div class=" col-lg-9 col-xs-9 str">
                
                <h3><b>T</b>ravel With Class.&nbsp; <b>T</b>ravel with Crazytaxi .</h3>
            
        </div>
            <br><br>              

</div>
</nav>
<br><br><br><br><br><br><br><br>
<?php if(empty($rows)){echo "<center>No Bookings</center>";}else{?>
<table>
    <tr>
        <td>Booking number </td>
        <td>Pick</td>
        <td>Drop</td>
        <td>Date</td>
    </tr>
    <tr>
        <?php
            foreach ($rows as $key => $value) {
                # code...
                foreach ($value as $k => $v) {
                    # code...
                
                if(is_string($k)){
                    ?>
                    <td><?php echo $v; ?></td>
                    <?php
                }

            }
            ?>
                <td><form method='post' action="booking.php"name='fsubmit'><input type="checkbox"name="check"checked><input type="submit"name='delete' value="delete"onclick="fsubmit.submit();" id='del'></form></td><tr>
                <?php
            }
         ?>

    </tr>
</table>
<?php } ?>


<br><br><br><br><br><br><br><br><br><br><br><br><br>
					<footer class="foot col-lg-12 col-xs-12  col-sm-12  col-md-12">
    <div class="container">
        <div>
            <span style="font-family:arial; margin:30px 0 20px 50px;width:-20px;color:#9D9E9E; " class="col-xs-12 col-xs-pull-2 col-lg-pull-0 col-lg-8"> Copyright&nbsp; &copy; &nbsp;, All Rights Reserved
            </span>

                <div class="foot-img inline-block col-xs-12 col-lg-3">
                    <a href="http://www.facebook.com"><img src="facebook.png" style="  margin: 5px 20px"/></a>
                    <a href="http://www.twitter.com"><img src="twitter.png"style="  margin: 5px 20px"/></a>
                    <a href="http://www.gplus.com"><img src="gplus.png"style="  margin: 5px 20px"/></a>
                </div>
        </div>
     </div>      
</footer>	
</div>
</BODY>
</HTML>
<?php
}else{header('Location:aboutus.php');}
?>