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
	header('Location:aboutus.php');
}else{
	if(isset($_POST['username'] , $_POST['password'])){
        
		$username = $_POST['username'];
        $pass = $_POST['password'];
		$password = md5($_POST['password']);
		$_SESSION["username"] = $username;
	   
       if ($username=="" and $pass==""){
            # code...
            $error =  'All Fields Required!';
        }else if($username=='' or $pass=""){
            if (empty($username)) {
                    # code...
                    $error =  'Enter Username';
                }
    }
		      
        else{
			$query = $pdo->prepare("select * from user where username =? and password =?");
			$query->bindValue(1,$username);
			$query->bindValue(2,$password);

			$query->execute();
				
			$num = $query->rowCount();
			if($num == 1){
				//user entered right details 
				$_SESSION['logged_in'] = True;
				header('Location:aboutus.php');
				exit(0);
			}else{
				//user entered wrong details
				echo '<script language="javascript">';
                    echo 'alert("Wrong username or password!")';
                    echo '</script>';
			}
		}	
	}
    if($error=='' and $_POST['username']!=''){
        $error='Enter Password';
    }

	?>
<HTML>
<HEAD>
	<link rel="stylesheet" href="main.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".a").hover(function(){
    
    },
    function(){
       window.open("pic1.html","_self");
    }); 
});
</script>
<style type="text/css">
  body {
          overflow-x: hidden;
    overflow-y: hidden;
       }
</style>
</HEAD>
<BODY>
<div class="a">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="col-lg-3 col-sm-2 col-xs-3  col-md-2">
        <img src="taxi.jpg" width="75px" class="logo">
    </div>
    <div class="col-lg-3 col-sm-4 col-xs-8 col-xs-push-1 col-md-4">
        <span class="glyphicon glyphicon-earphone phone">
        </span> 
        <span class="number">123-125-333</span>
    </div>
         
        <div class=" col-lg-9 col-xs-9 str">
                
                <h3><b>T</b>ravel With Class.&nbsp; <b>T</b>ravel with Crazytaxi .</h3>
            
        </div>
            <br><br>              

</div>
</nav>
<br><br><br><br><br><br><br><br><br><br><br>
<form name="f" action="12.php" method="post"autocomplete="off">
&nbsp;&nbsp;            <?php if(isset($error)){ ?>
                        <span>
                            <?php echo $error; ?>
                        </span><br><br>&nbsp;&nbsp;
                        <?php } ?>

						<input type = "text" name="username" placeholder="Username"><br><br>
&nbsp;&nbsp;
						<input type = "password" name="password" placeholder="Password"><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   <input type="submit" class="sbutton " value="Submit">
					</form>	



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
}
?>