<?php
function getDatabaseConnection() {
    $host = 'localhost';
    $dbName = 'final';
    $username = 'root';
    $password = '';
    
    // if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
    //     $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    //     $host = $url["host"];
    //     $dbname = substr($url["path"], 1);
    //     $username = $url["user"];
    //     $password = $url["pass"];
    // } 
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        // $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = "us-cdbr-iron-east-02.cleardb.net";
        $dbname = "heroku_36740c1a1136d2b";
        $username = "b6fbae3b49e168";
        $password = "322a8cdc";
    }
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>