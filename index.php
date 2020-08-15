<?php
    session_start();
    require 'dbConnector.php';
    require 'PageTemplate.php';
    require 'PageViewController.php';

    $databaseConnection = ConnGet();
    $pageNum = array_key_exists("pageNum", $_GET) ? (int)htmlspecialchars($_GET["pageNum"]) : 1;
    $isEdit = array_key_exists("isEdit", $_GET) ? htmlspecialchars($_GET["isEdit"]) : false;
    $isAdmin = array_key_exists("isAdmin", $_POST) ? (int)htmlspecialchars($_POST["isAdmin"]) : -1;

    //Check if page is in edit mode
    $pageController = new PageViewController($pageNum, $databaseConnection, $pageNum);
    if($isEdit == "true") {
        echo $pageController->page->getEditableHtml();
    } else {
        echo $pageController->page->getNormalHtml();
    }

    //Make the session / edit it
    switch($isAdmin){
        case 0:
            unset($_SESSION["isAdmin"]);
            $_SESSION["isAdmin"] = 0;
            break;
        case 1: 
            unset($_SESSION["isAdmin"]);
            $_SESSION["isAdmin"] = 1;
            break;
        default:
            break;
    }

    //Check if the session is in admin mode and show the form to go into edit
    if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1){
        echo"<div class='forms'>";
        //Form to Create a new page
        echo "<form action='createPage.php' method='get'>
        <input type='hidden' value='$pageNum' name='pageNum' />
        <input type='text' name='header' placeholder='Title'/>
        <input class='button' type='submit' value='Create Page'/>
        </form>";
        
        //Link to edit page
        echo "<a class='button' href='index.php?pageNum=$pageNum&isEdit=true'>Edit</a>";
            
        //Form to delete page
        echo "<form action='deletePage.php' method='get'>
        <input type='hidden' value='$pageNum' name='pageNum' />
        <input class='button' type='submit' value='Delete This Page'/>
        </form>";
    }

?>