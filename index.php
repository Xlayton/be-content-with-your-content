<?php
    require 'dbConnector.php';
    require 'PageTemplate.php';
    require 'PageViewController.php';

    $databaseConnection = ConnGet();
    $pageNum = (int)htmlspecialchars($_GET["pageNum"]) ? (int)htmlspecialchars($_GET["pageNum"]) : 1;
   
    $pageController = new PageViewController($databaseConnection, $pageNum);
    echo $pageController->page->getNormalHtml();
?>