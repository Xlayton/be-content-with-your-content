<?php 
    class PageViewController {
        Public $page;

        function __construct($pageId, $databaseConnection, $pageNum)
        {
            $pageResult = PageContentGet($databaseConnection, $pageNum);
            $pageArr = $pageResult->fetch_assoc();
            $this->page = new PageTemplate($pageId, $pageArr["PageTitle"], $pageArr["PageHeader"], $pageArr["PageTextContent"]);
        }
    }
?>