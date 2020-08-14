<?php
    require 'dbConnector.php';
    require 'PageTemplate.php';
    require 'PageViewController.php';

    $databaseConnection = ConnGet();
    $pageNum = array_key_exists("pageNum", $_GET) ? (int)htmlspecialchars($_GET["pageNum"]) : 1;
    $isEdit = array_key_exists("isEdit", $_GET) ? htmlspecialchars($_GET["isEdit"]) : false;
   
    $pageController = new PageViewController($pageNum, $databaseConnection, $pageNum);
    if($isEdit == "true") {
        echo $pageController->page->getEditableHtml();
    } else {
        echo $pageController->page->getNormalHtml();
    }
?>