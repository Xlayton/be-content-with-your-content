<?php 
    class PageViewController {
        Public $page;

        function __construct($databaseConnection, $pageNum)
        {
            $pageResult = PageContentGet($databaseConnection, $pageNum);
            $pageArr = $pageResult->fetch_assoc();
            $this->page = new PageTemplate($pageArr["PageTitle"], $pageArr["PageHeader"], $pageArr["PageTextContent"]);
        }
    }
?>