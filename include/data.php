<!-- 
  Created by : Ashish Chandrakant Naik
  2013 - 2017
  St. francis Institute of tech
-->
<?php

class Article {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare('select * from user');
		$query->execute();

		return $query->fetchAll();
	}
	public function fetch_data($username) {
		global $pdo;
		$query = $pdo->prepare('select * from user where username = ?');
		$query->bindValue(1, $username);
		$query->execute();
		return $query->fetch();

	}
	public function reg($username,$password,$email) {
		global $pdo;
		$query = $pdo->prepare('insert into user(username,password,email) values(?,?,?)');
		$query->bindValue(1, $username);
		$query->bindValue(2, $password);
		$query->bindValue(3, $email);
		$query->execute();
		return NULL;

	}
	public function fetch($username) {
		global $pdo;
		$query = $pdo->prepare('select serial from user where username = ?');
		$query->bindValue(1, $username);
		$query->execute();
		return $query->fetch();

	}public function this($serial){
		global $pdo;
		$query = $pdo->prepare('select serial_book,pick,dro,date from book where serial=?');
		$query->bindValue(1, $serial);
		$query->execute();
		return $query->fetchAll();

	}
}

?>
