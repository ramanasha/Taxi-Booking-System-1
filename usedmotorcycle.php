<!-- 
  Created by : Ashish Chandrakant Naik
  2013 - 2017
  St. francis Institute of tech
-->
<?php
session_start();

if (isset($_POST['Name']))
{
$username=$_POST['Name'];
$Lastname=$_POST['LastName'];
$Email=$_POST['Email'];
$enterEmail=$_POST['enterEmail'];
$password=$_POST['Password'];
$gender=$_POST['radiobutton'];

$connect = mysql_connect("localhost","root","");
mysql_select_db("nickryan") or die("couldn't find database");
$query = mysql_query("insert into project1415 values('$username','$Lastname','$Email','$password','$gender')");
$numrows = mysql_num_rows($query);

if($numrows!=0)
{
echo 'Registration Successful';
}
else
die("Please enter username and password");
mysql_close($connect);
}
?>


<html>
	<head>
		<title>HOTRODS.INC</title>
<style>
body  {
    background-image: url("images/h22.jpg");
    background-color: #cccccc;
    color:white;
}
</style>
<script>
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<link rel="stylesheet" type="text/css" href="abc.css">
<script src="cde.js"></script>
	</head>
	<body background="images/h21.jpg" alink="blue" vlink="white">
		<h1 align="center">
		<font face="stencil" size="+5" color="white"><u><b>HOTRODS.INC</b></u></font><br>
		<font size="+3" color="white"><b>World Of <font color="red"><strong>Motorcycling</strong></font></font></b></h1>
		<h2><marquee  behavior=scroll direction=left scrollamount=2 scrolldelay=60>Upcoming : Kawasaki launches h2 and h2r. Yamaha launched 2015 R1 m1. MV Agusta coming to India in 2016. Bajaj starts manufacturing pulsar 200ss. Honda comes up with concept cb150.</marquee></h2>
		<hr size="2" color="white" width="100%"></hr>
		<table style="width: 100%" border="0">
		<tr>
                        <td style="height: 50px;">
                            <center><a href="home.html"><b>HOME</b></a></center>
                        </td>
			<td>
			    <center><a href="newmotorcycle.html"><b>NEW MOTORCYCLES</b></a></center>
			</td>
			<td>
                            <center><a href="usedmotorcycle.html"><b>USED MOTORCYCLES</b></a></center>
                        </td>
                        <td>
                            <center><a href="about.html"><b>ABOUT US</b></a></center>
                        </td>
                        <td>
                            <center><a href="contact.html"><b>CONTACT US</b></a></center>
                        </td>
                </tr>
		</table align="center"> 
		<hr size="2" color="white" width="100%"></hr>







<div id="emptyDiv"></div>
<div id="description"></div>
<!--container start-->
<div id="container">
  <div id="container_body">
    <div>
      <h2 class="form_title">Hotrods.Inc Registration</h2>
      <p class="head_para">Sign Up Page</p>
    </div>
    <!--Form  start-->
    <div id="form_name">
      <div class="firstnameorlastname">
       <form name="form" method='POST' action="usedmotorcycle.php">
       <div id="errorBox"></div>
        <input type="text" name="Name" value="" placeholder="First Name"  class="input_name" >
        <input type="text" name="LastName" value="" placeholder="Last Name" class="input_name" >
         
      </div>
      <div id="email_form">
        <input type="text" name="Email" value=""  placeholder="Your Email" class="input_email">
      </div>
      <div id="Re_email_form">
        <input type="text" name="enterEmail" value=""  placeholder="Re-enter Email" class="input_Re_email">
      </div>
      <div id="password_form">
        <input type="password" name="Password" value=""  placeholder="New Password" class="input_password">
      </div>
      <div id="radio_button">
        <input type="radio" name="radiobutton" value="Female">
        <label >Female</label>
        &nbsp;&nbsp;&nbsp;
        <input type="radio" name="radiobutton" value="Male">
        <label >Male</label>
      </div>
       <div>
        <input type='SUBMIT' VALUE='SUBMIT'>
      </div>
     </form>
    </div>
    <!--form ends-->
  </div>
</div>






<hr size="2" color="white" width="100%"></hr>
  		<table style="width: 100%" border="0" cellpadding="80">
                    <tr> <caption><b><font size="+1.5">FOLLOW US ON : </font></b></CAPTION>
                        <td><a href="www.facebook.com"><img src="images/f.png" height="60" width="60" alt="Facebook"></a></td>
			<td><a href="www.blogger.com"><img src="images/b.png" height="60" width="60" alt="Blogger"></a></td>
			<td><a href="www.in.com"><img src="images/i.png" height="60" width="60" alt="In"></a></td>
			<td><a href="www.google.com"><img src="images/g.png" height="60" width="60" alt="Google"></a></td>
			<td><a href="www.twitter.com"><img src="images/t.png" height="60" width="60" alt="Twitter"></a></td>
                        <td><a href="www.youtube.com"><img src="images/y.png" height="60" width="60" alt="Youtube"></a></td>
		    </tr>
                    </table>
<center><p>All Rights Reserved<b>|</b>Privacy Policy<b>|</b>Terms & Conditions.</p></center>
</body>
</html>