<?php

$dsn = "mysql:host=localhost;dbname=pc_planning_tool"; //local
//$dsn = "mysql:host=kevinvandytech.domaincommysql.com;port=3306;dbname=pc_planning_tool"; //remote
$usernameDB = "";
$passwordDB = "";

try
{
    $conn = new PDO($dsn, $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    exit($ex->getMessage());
}

?>