<?php 
    //The page template for each page to be made
    class PageViewController {
        Public $page;

        function __construct($pageId, $databaseConnection, $pageNum)
        {
            $pageResult = PageContentGet($databaseConnection, $pageNum);
            $pageArr = $pageResult->fetch_assoc();
            $pageNav = GetPageLinks($databaseConnection, $pageId);
            $mainNavContent = [];
            $subNavContent = [];
            while($row = $pageNav->fetch_assoc()){
                $title = $row["PageTitle"];
                $row["ParentPage"] == 0 ? $mainNavContent["$title"] = $row["id"] : $subNavContent["$title"] = $row["id"];
            }
            $this->page = new PageTemplate($pageId, $pageArr["PageTitle"], $pageArr["PageHeader"], $pageArr["PageTextContent"], $mainNavContent, $subNavContent);
        }
    }
?>