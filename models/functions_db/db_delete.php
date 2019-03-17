<?php

function deleteUser($username) //deletes all of the setups for a user. Only call this when deleting an account
{
    if($username == $_SESSION['username'])
    {
        //first delete foreign key objects, but only if the setup belongs to the logged in user
        deleteSetups($username);

        global $conn;
        $query = 'DELETE FROM users '
               . 'WHERE Username = :username'; //valid username from session also has to be provided
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteSetups($username) //deletes all of the setups for a user. Only call this when deleting an account
{
    if($username == $_SESSION['username'])
    {
        //first delete foreign key objects by calling the function to delete all setups of the account
        $setups = selectSetupsForUser($username);
        
        if($setups != NULL)
        {
            foreach($setups as $setup)
            {
                deleteMonitors($setup->getSetupID());
                deleteCPUs($setup->getSetupID());
                deleteGPUs($setup->getSetupID());
                deleteMotherboards($setup->getSetupID());
                deleteRAMs($setup->getSetupID());
                deleteDrives($setup->getSetupID());
                deletePSUs($setup->getSetupID());
                deleteCases($setup->getSetupID());
            }
        }
        
        //Now that the setups info is deleted, the setup can be safely removed from the setups table
        global $conn;
        $query = 'DELETE FROM setups '
               . 'WHERE Username = :username'; //valid username from session also has to be provided
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteSetup($username, $setupID, $setupName) //deltes 1 setup
{
    //first delete foreign key objects, but only if the setup belongs to the logged in user
    if(findSetupForUsername($_SESSION['username'], $setupID)) //this if statement is only necessary for these first delete functions. The query has an 'AND' condition
    {
        deleteMonitors($setupID);
        deleteCPUs($setupID);
        deleteGPUs($setupID);
        deleteMotherboards($setupID);
        deleteRAMs($setupID);
        deleteDrives($setupID);
        deletePSUs($setupID);
        deleteCases($setupID);

        global $conn;
        $query = 'DELETE FROM setups '
               . 'WHERE SetupID = :setupID AND SetupName = :setupName AND Username = :username'; //valid username from session also has to be provided
        $statement = $conn->prepare($query);
        $statement->bindValue(':setupID', $setupID);
        $statement->bindValue(':setupName', $setupName);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteMonitors($setupID)
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM monitors '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteMonitor($setupID, $monitorID)
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM monitors '
               . 'WHERE MonitorID = :monitorID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':monitorID', $monitorID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteCPUs($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM cpus '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteCPU($setupID, $CPUID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM cpus '
               . 'WHERE CPUID = :cpuID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':cpuID', $CPUID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteGPUs($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM gpus '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteGPU($setupID, $gpuID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM gpus '
               . 'WHERE GPUID = :gpuID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':gpuID', $gpuID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteMotherboards($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM motherboards '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteMotherboard($setupID, $motherboardID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM motherboards '
               . 'WHERE MotherboardID = :motherboardID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':motherboardID', $motherboardID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteRAMs($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM rams '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteRAM($setupID, $RAMID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM rams '
               . 'WHERE RAMID = :ramID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':ramID', $RAMID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteDrives($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM drives '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteDrive($setupID, $driveID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM drives '
               . 'WHERE DriveID = :driveID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':driveID', $driveID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deletePSUs($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM psus '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deletePSU($setupID, $PSUID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM psus '
               . 'WHERE PSUID = :psuID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':psuID', $PSUID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteCases($setupID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM cases '
               . 'WHERE SetupID = :setupID';
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

function deleteCase($setupID, $caseID) 
{
    if(findSetupForUsername($_SESSION['username'], $setupID))
    {
        global $conn;
        $query = 'DELETE FROM cases '
               . 'WHERE CaseID = :caseID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':caseID', $caseID);
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
        finally
        {
            $statement->closeCursor();
        }
    }
}

?>
