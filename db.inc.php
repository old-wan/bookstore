<?php
	//连接数据库
	//mysql_connect("localhost", "root", "123456") or die("连接失败!");

	//PDO 连接数据库
	$pdo = new PDO('mysql:host=localhost;dbname=bookstore;','root','');


	//选择数据库
	//mysql_select_db("bookstore") or die("数据库选择失败");

	