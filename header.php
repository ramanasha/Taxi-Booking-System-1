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
        header('Location:header.php');
    }
    $article = $data->fetch_data($_SESSION['username']);
 
}
?>
<html>
<head>
<title></title>
<style type="text/css">
body{
	background: -moz-linear-gradient(top, rgba(0,0,0,0.77) 1%, rgba(170,133,0,0.77) 42%, rgba(244,191,0,0.84) 60%, rgba(251,223,147,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,rgba(0,0,0,0.77)), color-stop(42%,rgba(170,133,0,0.77)), color-stop(60%,rgba(244,191,0,0.84)), color-stop(100%,rgba(251,223,147,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(0,0,0,0.77) 1%,rgba(170,133,0,0.77) 42%,rgba(244,191,0,0.84) 60%,rgba(251,223,147,1) 100%);
	}
.head{
	margin-bottom:-31px;
}
.head1{
	margin-bottom:-40px;
}
.head2{
	margin-top:90px;
}
#shift{
	margin-right:30%;
}
a:link ,a{
	text-decoration: none;
	color:white;
	font-weight: bold;
	font-family: Cambria Math;
	font-size: 18px;
}
a:hover{
	border-bottom: 5px solid #aaaaaa;
	padding-bottom: 3px;
}
#box{
	background:rgba(0,0,0,0.2);
	height: 23px;
}	
select{
  margin-left:900px;
  width:150px;
  font-size: 20px;
  padding-left: 35px;
}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body bgcolor="#FFAE00">


<div class="head">
<font style="margin-left:50%;">
	<font style="font-weight:bold;color:white;margin-right:150px;font-size:25px;font-family:'Segoe Script'">Contact&nbsp;&rarr;&nbsp;6060-1010</font>
	<?php
            if(isset($_SESSION['logged_in'])){
          ?>
          <form action="header.php" method='get'>
                        <select onchange='this.form.submit();' name ='drop'>
                            
                                <option value="user">
                                     <?php echo $_SESSION["username"]; ?></option>
                           
                                <option value="logout">
                                    Log out</option>
                                   
                                                         
                        </select>
                    </form>
                    <?php }
                    else{ ?><a href="12.php"target="12.php">Log In</a></li>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="regis.php">Register</a></li><?php } ?> 

</font>
</div>
<div  class="head1" style="width:20px;height:10px;margin-left:-20px">
	<img src="taxi.jpg" width="150px" hspace='20'>
	</div>
<div class="head2" id="shift">
<marquee width="100%" direction="left" behavior="alternate" hspace="19%" scrollamount="1"><font color="red" face="Cambria Math" size="5" ><H4>Travel With Class.&nbsp; Travel with Crazytaxi . &nbsp;India's No 1 <b>T</b>axi service.
</H4></font></marquee>
</div>
<div class="head" id="box">
<center><b>Mumbai &nbsp&nbsp&nbsp&nbsp&nbspDelhi&nbsp&nbsp&nbsp&nbsp Banglore&nbsp&nbsp&nbsp&nbsp Jaipur&nbsp&nbsp&nbsp&nbsp Ahmedabad&nbsp&nbsp&nbsp&nbsp Chennai &nbsp&nbsp&nbsp&nbspCalcutta &nbsp&nbsp&nbsp&nbspBhubaneshwar &nbsp&nbsp&nbsp&nbspVadodra&nbsp&nbsp&nbsp&nbsp Pune&nbsp&nbsp&nbsp&nbspSurat&nbsp&nbsp&nbsp&nbspChandigarh&nbsp&nbsp&nbsp&nbspHyderabad</b></center>
</div>
<script>
$( "marquee" ).mouseover(
  function() {
   
  $(this).animate({
        opacity: '0.9',
        fontSize: '250px',
        opacity:'0'}, 4000);
  }
);


</script>
</body>
</html>