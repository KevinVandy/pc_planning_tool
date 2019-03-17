<?php

function findUsername($username)
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM users WHERE Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $username);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $count = $statement->fetch();
    if($count[0] > 0) return TRUE;
    else return FALSE;
}

function findEmail($email)
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM users WHERE Email = :email';
    $statement = $conn->prepare($query);
    $statement->bindValue(':email', $email);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $count = $statement->fetch();
    if($count[0] > 0) return TRUE;
    else return FALSE;
}

function findSetup($setupID)
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM setups WHERE SetupID=:setupID';
    $statement = $conn->prepare($query);
    $statement->bindValue(':setupID', $setupID);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $count = $statement->fetch();
    if($count[0] > 0) return TRUE;
    else return FALSE;
}

function findSetupForUsername($username, $setupID) //used to make sure that a setup id does belong to a username and it was not changed for malicious purposes
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM setups WHERE SetupID=:setupID AND Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':setupID', $setupID);
    $statement->bindValue(':username', $username);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $count = $statement->fetch();
    if($count[0] > 0) return TRUE;
    else return FALSE;
}

function findSetupName($username, $setupName)
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM setups WHERE Username = :username AND SetupName=:setupName';
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':setupName', $setupName);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $count = $statement->fetch();
    if($count[0] > 0) return TRUE;
    else return FALSE;
}

?>