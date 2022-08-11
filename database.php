<?php
$connectionString = "mysql:host=localhost; port=3306; dbname=crud_productos";
$user = "root";
$pass = "";
$PDO = new PDO($connectionString, $user, $pass);
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
