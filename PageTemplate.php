<?php
    class PageTemplate {
        Private $title;
        Private $header;
        Private $textContent;
        Private $id;

        function __construct($id, $title, $header, $textContent)
        {
            $this->id = $id;
            $this->title = $title;
            $this->header = $header;
            $this->textContent = $textContent;
        }

        function getNormalHtml() {
            $page = "<!DOCTYPE html>"; 
            $page .= "<html lang='en'>";
            $page .= "<head><title>$this->title</title><link href='./style.css' rel='stylesheet'></head>";
            $page .= "<body><header>$this->header</header><div class='content'>$this->textContent</div></body>";
            $page .= "</html>";
            return $page;
        }

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