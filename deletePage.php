<?php 
//elements to get data for pages
require 'dbConnector.php';
$pageNum = (int)htmlspecialchars($_GET["pageNum"]);

//the redirect index
$redirect = 1;
$dbConn = ConnGet();

//returns the create page functionality
$return = MyPageremove($dbConn, $pageNum);
$result = GetLowestId($dbConn);
$lowestId = $result -> fetch_array()[0];
header("Location: index.php?pageNum=" . $lowestId);
?>