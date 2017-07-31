<!-- 
  Created by : Ashish Chandrakant Naik
  2013 - 2017
  St. francis Institute of tech
-->
<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=wp','root','');
}catch(PDOException $e){
	exit('database error');
}

?>
