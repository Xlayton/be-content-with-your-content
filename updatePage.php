<?php 
//elements to get data for pages
require 'dbConnector.php';
$pageNum = (int)htmlspecialchars($_GET["pageNum"]);
$header = htmlspecialchars($_GET["header"]);
$textContent = htmlspecialchars($_GET["textContent"]);
$databaseConnection = ConnGet();

//returns the edit options for the pages
$return = PageContentUpdate($databaseConnection, $pageNum, $header, $textContent);
header("Location: index.php?pageNum=$pageNum");

?>