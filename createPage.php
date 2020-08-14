<?php 
//elements to get data for pages
require 'dbConnector.php';
$pageNum = (int)htmlspecialchars($_GET["pageNum"]);
$header = htmlspecialchars($_GET["header"]);
//the redirect index
$redirect = 1;
$databaseConnection = ConnGet();

//returns the create page functionality
$return = PageCreate($databaseConnection, $pageNum, $header);
header("Location: index.php?pageNum=" . mysqli_insert_id($databaseConnection) . "&isEdit=true");
?>