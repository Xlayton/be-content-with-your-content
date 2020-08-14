<?php
    class PageTemplate {
        Private $title;
        Private $header;
        Private $textContent;
        Private $id;
        Private $mainNavContent;
        Private $subNavContent;

        function __construct($id, $title, $header, $textContent, $mainNavContent, $subNavContent)
        {
            $this->id = $id;
            $this->title = $title;
            $this->header = $header;
            $this->textContent = $textContent;
            $this->mainNavContent = $mainNavContent;
            $this->subNavContent = $subNavContent;
        }

        //Content of normal html pages and layout
        function getNormalHtml() {
            $page = "<!DOCTYPE html>"; 
            $page .= "<html lang='en'>";
            $page .= "<head><title>$this->title</title><link href='./style.css' rel='stylesheet'></head>";
            $page .= "<body><nav class='main-nav'>";
            foreach($this->mainNavContent as $title=>$id) {
                $page .= "<a class='nav-link' href='/?pageNum=$id'>$title</a>";
            }
            $page .= "<a class='nav-link' href='/login.php'>Log In</a>";
            $page .= "</nav>";
            $page .= "<nav class='sub-nav'>";
            foreach($this->subNavContent as $title=>$id) {
                $page .= "<a class='nav-link' href='/?pageNum=$id'>$title</a>";
            }
            $page .= "</nav>";
            $page .= "<header>$this->header</header><div class='content'>$this->textContent</div></body>";
            $page .= "</html>";
            return $page;
        }

        //Layout for the edit part of pages
        function getEditableHtml() {
            $page = "<!DOCTYPE html>"; 
            $page .= "<html lang='en'>";
            $page .= "<head><title>$this->title</title><link href='./style.css' rel='stylesheet'></head>";
            $page .= "<body><form action='updatePage.php'><textarea name='header'>$this->header</textarea><textarea name='textContent'>$this->textContent</textarea><input type='hidden' name='pageNum' value='$this->id'/><input class='button' type='submit' value='Save' /></form></body>";
            $page .= "</html>";
            return $page;
        }
    }
?>