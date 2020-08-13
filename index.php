<?php
    require 'dbConnector.php';
    require 'PageTemplate.php';
    require 'PageViewController.php';

    $databaseConnection = ConnGet();
    $pageNum = (int)htmlspecialchars($_GET["pageNum"]) ? (int)htmlspecialchars($_GET["pageNum"]) : 1;
    $isEdit = htmlspecialchars($_GET["isEdit"]) ? htmlspecialchars($_GET["isEdit"]) : false;
   
    $pageController = new PageViewController($pageNum, $databaseConnection, $pageNum);
    if($isEdit == "true") {
        echo $pageController->page->getEditableHtml();
    } else {
        echo $pageController->page->getNormalHtml();
    }
?>