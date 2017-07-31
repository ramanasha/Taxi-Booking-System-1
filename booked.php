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

    

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    

    <title>Crazy Taxi</title>

    <link rel="stylesheet" href="main.css" type="text/css">
<link href="1.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>


  $(function(){
    $( "#tabs" ).tabs();
  });
  
  $(function() {
    var availableTags = [
      "Mumbai","Delhi","Banglore","Ahmedabad","Chennai","Calcutta","Bhubaneshwar","Vadodra","Surat","Pune","Hyderabad","Chandigarh"
     ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>
  <style type="text/css">
  td{
    padding:20px;
    color:slategray;
    font-size: 25px;
    font-weight: bold;
    font-style: italic;
    text-decoration: solid 4px;
  }
  tr img{
    width:400px;
  }
  </style>

</head>

<body>
<div class="a">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="col-lg-3 col-sm-2 col-xs-3  col-md-2">
        <img src="taxi.jpg" width="75px" class="logo"></img>
    </div>
    <div class="col-lg-3 col-sm-4 col-xs-8 col-xs-push-1 col-md-4">
        <span class="glyphicon glyphicon-earphone phone">
        </span> 
        <span class="number">123-125-333</span>
    </div>
            <?php
            if(isset($_SESSION['logged_in'])){
          ?>
        <form action="aboutus.php" method='get'>
                        <select onchange='this.form.submit();' name ='drop'class="col-lg-1 col-lg-push-3">
                            
                                <option value="user">
                                     <?php echo $_SESSION["username"]; ?></option>
                           
                                <option value="logout">
                                    Log out</option>
                                   
                                                         
                        </select>
        </form>
            <?php }
            else{ ?>
        <div class="headbtn col-lg-6 ">
                    <a href="12.php" class="login"><b>Login</b></a>
                    <a href="regis.php" class="login"> <b>Register</b></a> 
        </div>
            <?php } ?> 
        <div class=" col-lg-9 col-xs-9 str">
                
                <h3><b>T</b>ravel With Class.&nbsp; <b>T</b>ravel with Crazytaxi .</h3>
            
        </div>
            <br><br>              
            <form class="form-group" >
                
                    <label class="cityselect" for="tags">Select my city
                    </label><br>
                        <div class="inline-block">
                            <div class="col-lg-4">
                                <input type="text"id= "tags" class="form-control round" id="sbar"placeholder="Mumbai">        
                            </div>
                            <button type="submit" class="sbutton  ">Select</button>

                        </div>
            </form>
</div>
</nav>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!--TABLE-->  
<table>
  <tr>
    <td>USER</td>
    <td><?php  echo $_SESSION['username']; ?></td>
  </tr>
  <tr>
    <td><u>TAXI BOOKING DETAILS</u></td>
  </tr>
  <tr>
    <td>CAR</td>
    <td><?php echo $_SESSION['car']; ?></td>
    <td><img src="<?php echo $_SESSION['car'].".jpg";?>"></td>
  </tr>
  <tr>
    <td>DATE OF BOOKING</td>
    <td><?php echo $_SESSION['date']; ?></td>
  </tr>
  <tr>
    <td>PICKUP AREA</td>
    <td><?php echo $_SESSION['pick']; ?></td>
  </tr>
  <tr>
    <td>DROP AREA</td>
    <td><?php echo $_SESSION['drop']; ?></td>
  </tr>
  <tr>
    <td>FARE</td>
    <td><?php echo rand(500,1000)."/-"; ?></td>
  </tr>
</table>

<!--testimonials-->
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
     <script>
    $( document ).ready( function(){
        $('.headbtn').on('click','.login',function () {
             $('.login').removeClass('selected');
             $(this).addClass('selected')
        });
    });
    </script>       

</div>

</body>

</html>
