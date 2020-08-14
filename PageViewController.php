<?php 
    class PageViewController {
        Public $page;

        function __construct($pageId, $databaseConnection, $pageNum)
        {
            //The page template for each page to be made
            $pageResult = PageContentGet($databaseConnection, $pageNum);
            $pageArr = $pageResult->fetch_assoc();
            $this->page = new PageTemplate($pageId, $pageArr["PageTitle"], $pageArr["PageHeader"], $pageArr["PageTextContent"]);
        }
    }
?>