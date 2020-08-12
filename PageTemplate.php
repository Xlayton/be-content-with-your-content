<?php
    class PageTemplate {
        Private $title;
        Private $header;
        Private $textContent;

        function __construct($title, $header, $textContent)
        {
                $this->title = $title;
                $this->header = $header;
                $this->textContent = $textContent;
        }

        function getNormalHtml() {
            $page = "<!DOCTYPE html>"; 
            $page .= "<html lang='en'>";
            $page .= "<head><title>$this->title</title></head>";
            $page .= "<body><header>$this->header</header><div>$this->textContent</div></body>";
            $page .= "</html>";
            return $page;
        }

        function getEditableHtml() {
            return "Not Implemented Yet";
        }
    }
?>