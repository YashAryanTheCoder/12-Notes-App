<?php
include('settings.php');
$link = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error()); 
    echo "<script>window.alert('Hi!')</script>";
}

//create tables if they haven't been yet
$sql = "CREATE TABLE IF NOT EXISTS `users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(30) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(64) NOT NULL,
 `activation` char(32) DEFAULT NULL,
 `activation2` char(32) DEFAULT NULL,
 PRIMARY KEY (`user_id`),
 UNIQUE KEY `user_id` (`user_id`)
); ";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo mysqli_error($link);
    exit;
}

$sql = "CREATE TABLE IF NOT EXISTS `forgotpassword` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `rkey` char(32) NOT NULL,
 `time` int(11) NOT NULL,
 `status` varchar(7) NOT NULL,
 PRIMARY KEY (`id`)
);";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo mysqli_error($link);
    exit;
}

$sql = "CREATE TABLE IF NOT EXISTS `rememberme` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `authentificator1` char(20) NOT NULL,
 `f2authentificator2` char(64) NOT NULL,
 `user_id` int(11) NOT NULL,
 `expires` datetime NOT NULL,
 PRIMARY KEY (`id`)
);";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo mysqli_error($link);
    exit;
}

$sql = "CREATE TABLE IF NOT EXISTS `notes` (
 `id` int(4) NOT NULL AUTO_INCREMENT,
 `user_id` int(4) NOT NULL,
 `note` text NOT NULL,
 `time` int(10) NOT NULL,
 PRIMARY KEY (`id`)
);";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo mysqli_error($link);
    exit;
}
?>