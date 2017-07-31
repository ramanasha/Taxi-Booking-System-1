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

    if(isset($_POST['date'])){
      $curdate=strtotime($_POST['date']);
      $mydate=strtotime(date("Y-m-d"));
      
      if($mydate < $curdate){
      $_SESSION['pick']=$_POST['pick'];
      $_SESSION['drop']=$_POST['drop'];
      $_SESSION['date']=$_POST['date'];
      $_SESSION['car']=$_POST['car'];
      $se = $data->fetch($_SESSION['username']);
      $serial = $se['serial'];
      $query = $pdo->prepare("insert into book(serial,pick,dro,date,car) values(?,?,?,?,?)");
      $query->bindValue(1,$serial);
      $query->bindValue(2,$_POST['pick']);
      $query->bindValue(3,$_POST['drop']);
      $query->bindValue(4,$_POST['date']);
      $query->bindValue(5,$_POST['car']);
      $query->execute();
      header('Location:booked.php');
    }
} if (isset($_GET['ss'])) {
  # code...
  $_SESSION['pick']=$_GET['s'];
}

}if(isset($_POST['pick'])){
  echo '<script language="javascript">';
  echo 'alert("Date incorrect")';
  echo '</script>';
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
    var availableTags =["Mumbai","Delhi","Banglore","Ahmedabad","Chennai","Calcutta","Bhubaneshwar","Vadodra","Surat","Pune","Hyderabad","Chandigarh"];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>

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
                                <option value="booking">
                                    Bookings</option>
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
            <form class="form-group" method="get">
                
                    <label class="cityselect" for="tags">Select my city
                    </label><br>
                        <div class="inline-block">
                            <div class="col-lg-4">
                                <input type="text"id= "tags" name="s" class="form-control round" id="sbar"placeholder="<?php echo $_SESSION['pick']; ?>"autocomplete="off">        
                            </div>
                            <button type="submit" class="sbutton " name="ss">Select</button>

                        </div>
            </form>
</div>
</nav>
<br><br><br><br><br><br><br>
    <!-- Header -->
<div class="intro-header">
            
</div> 
</div>

<div class="yellow col-lg-12 col-sm-12 col-xs-12 col-md-12">
    <div class="row">
        <span style="color:black; font-weight:bold; font-size:25px;font-family:calibri;color:white;">Welcome</span>
    </div>
</div>
<br>
<div id="tabs">

    <div class="inline-block">
  <ul>
    <li><a href="#tabs-1" class="active">Book Taxi</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
 
    <li><a href="#tabs-3">Fares</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a href="#tabs-4">About Us</a></li>
    
  </ul>
</div>

  <div id="tabs-1">

    <FORM name="f" ACTION="aboutus.php" method="post" id="f">

<LEGEND><b>Location</b></LEGEND><P>
&nbsp&nbsp&nbsp
Pick-up Area :  <INPUT type="text" NAME='pick' value="<?php echo $_SESSION['pick']; ?>">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Drop Area :  <INPUT type="text" NAME='drop' autocomplete="off"><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Date :  <INPUT type="date" NAME='date' SIZE=8>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Select car : <select name="car"><option>SX4</option><option>Swift</option><option>Santro</option></select>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

</SELECT>
<br>
<span style="margin-left:30px;"><INPUT TYPE="button" value = "Submit" name="submit1" onclick="f.submit();">
</FORM>
  </div>
  

  <div id="tabs-3">
<font face="Cambria Math">
<h2>Fares</h2>
<hr>
Crazy Taxi, digital tamper proof meter on board and an e-bill receipt at the end of the ride ensures the passenger pays in line with the prescribed fare structure and no more!<br><br>
For Crazy taxi: (Cabs under Radio Taxi License)<br>
<TABLE BORDER=1>
<TR><TH COLSPAN=2>LOCAL</TH>
<TH COLSPAN=2>INTERCITY</TH>
</TR>
<TR>
<TD><center>CAR</center>
<TD><center>PER KM</center>
<TD><center>CAR</center>
<TD><center>PER KM</center>
</TR>
<TR>
<TD>MARUTI
<TD>15/-
<TD>MARUTI
<TD>20/-
</TR>
<TR>
<TD>SWIFT
<TD>18/-
<TD>SWIFT
<TD>24/-
</TR>
<TR>
<TD>HONDA CITY
<TD>21/-
<TD>HONDA CITY
<TD>28/-
</TR>
<TR>
<TD>HYUNDAI
<TD>26/-
<TD>HYUNDAI
<TD>34/-
</TR>
<TR>
<TD>SKODA
<TD>30/- 
<TD>SKODA
<TD>49/-
</TR>
<TR>
<TD>DUSTER
<TD>38/-
<TD>DUSTER
<TD>57/-
</TR>
<TR>
<TD>INNOVA
<TD>45/- 
<TD>INNOVA
<TD>66/-
</TR>
<TR>
<TD>FORD
<TD>50/-
<TD>FORD
<TD>72/-
</TR>
</TABLE>
<br>
<b>Note:-</b>
<ul> 
<li>Cabs will get allocated for trips purely based on availability. Priority will be given to the Crazy Taxi under Radio Taxi License.
<li>Outstation trip charges would be calculated only at the end of the trip and displayed on the printed invoice or e-bill receipt which shall be sent to its registered e-mail ID.
<li>If you bookCrazy Flexi through our call center, an additional convenience charge of Rs 25/- is applicable. No convenience charge applicable if you book through website or Crazy Mobile App. Download Meru Mobile App , now.
<li>Airport convenience charge Rs.60/- for Domestic Terminal & Rs.80/- for International terminal is applicable for the pick-up from respective Airport Terminal.
<li>Toll and parking charges will be extra as applicable. There is No Driver Bhatta.
<li>All the trip charges mentioned are exclusive of service tax. The same shall be recovered as per prevailing law from time to time
</ul><br><hr>
<b>Important: </b>The trip charge under All India Tourist permit / State Permit is self regulated and not prescribed by any regulatory authority. These are not subjected to any regulated tariff regime by RTO or otherwise. The display of trip charges in the machines installed are to ensure transparency in pricing.<br>
<hr>
</font>
  </div>

<div id="tabs-4">
<font face="Cambria Math">
<h2>Contact us</h2>
<hr>
We are committed to provide you a service that you can rely on at all times. We are always here to answer your queries and to listen to your earnest feedback in order to improve our service. We will make sure that you are happy with our service.</font><br>
<font face="comic sans ms"><h4>You can reach us in the following ways:</h4></font><br>
<font face="Cambria Math">  
Email<br>
You can write to us on <a href="mailto:feedback@crazytaxi.com">feedback@crazytaxi.com</a><br><br>
  
Phone<br>
For bookings, status enquiries, follow ups and feedback, you can call us 24 hours on: <br>
<br>
Delhi&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Mumbai&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Calcutta<br>
011 44 22 44 22&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
022 44 22 44 22&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
033 33 99 33 99<br><br>
Bangalore&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Hyderabad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Jaipur<br>
080 44 22 44 22&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
040 44 22 44 22&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
0141 44 22 44 2<br><br>
Surat&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Pune&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Chennai<br>
0261 44 22 44 2&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
020 44 22 44 22&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
044 44 22 44 22<br><br>
Ahmedabad&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Vadodara&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Chandigarh<br>
079 44 22 44 22 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
079 44 22 44 22 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
012 44 22 44 22
<br><br>
Bhubaneshwar<br>
013 44 22 44 22
<br><br>
For corporate enquiries call us on +91-22-40520100.<br>
For advertising enquiries call our regional offices.<br>
  <br>
Fax<br>
You can send us a fax on +91-22-40520199.<br>
  <br>
Post<br>
Write to our head office at:<br>
Customer Service Manager<br>
Crazy taxi Company Pvt. Ltd.<br>
128, IJMIMA, Raheja Metroplex, Off Link Road, Malad (West), Mumbai - 400 064.</font>
  </div>
</div>

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
