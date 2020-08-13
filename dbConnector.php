<?php

// Create constants
DEFINE ('DB_USER', 'contentUser');
DEFINE ('DB_PSWD', 'imNotActuallyContent');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'site_generator_db');

// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 5375)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

// Get website templates that whose ParentPage id matches the inputted id
function MyPagesGet($dbConn, $Parent=0) {
    $query = "SELECT id, PageTitle, PageHeader, PageTextContent FROM websiteTemplates where IsEnabled = 1 and ParentPage = " . $Parent . " order by ParentPage asc, SortOrder Asc;";
    return @mysqli_query($dbConn, $query);
}

// Gets all website templates
function MyPagesAllGet($dbConn) {
    $query = "SELECT id, PageTitle, PageHeader, PageTextContent, ParentPage, SortOrder, IsEnabled FROM websiteTemplates order by ParentPage asc, SortOrder Asc;";
    return @mysqli_query($dbConn, $query);
}

// Gets a specific website template based on the inputted id
function PageContentGet($dbConn, $Id) {
    $return = null;
    $query = "SELECT id, PageTitle, PageHeader, PageTextContent FROM websiteTemplates where isEnabled = 1 and id = " . $Id;
    $return = @mysqli_query($dbConn, $query);
    if ((!$return) || ($return->num_rows < 1)){
        $query = "SELECT id, Title, Header1, Text1 FROM websiteTemplates where IsEnabled = 1 order by SortOrder asc limit 1;";
        $return = @mysqli_query($dbConn, $query);
    }
    return $return;
}

//  Update a page content by inputted id
function PageContentUpdate($dbConn, $Id, $PageHeader, $PageTextContent){
    $return = null;
    $query = "Update websiteTemplates set PageHeader = \"$PageHeader\", PageTextContent = \"$PageTextContent\" where id = " . $Id;
    $return = @mysqli_query($dbConn, $query);
    return $return;
}

// Disable a specific website template based on the inputted id
function MyPageremove($dbConn, $Id) {
    $query = "Update websiteTemplates set IsEnabled = 0 where id = " . $Id;
    return @mysqli_query($dbConn, $query);
}


?>

