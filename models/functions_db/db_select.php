<?php

function selectUser($usernameOrEmail)
{
    global $conn;
    $query = 'SELECT Username, Email, SearchEngine, ShowMoreSpecs, HideToolTips FROM users WHERE Username = :usernameOrEmail OR Email = :usernameOrEmail';
    $statement = $conn->prepare($query);
    $statement->bindValue(':usernameOrEmail', $usernameOrEmail);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $record = $statement->fetch();
    $user = new User($record['Username'], $record['Email'], NULL, $record['SearchEngine'], $record['ShowMoreSpecs'], $record['HideToolTips']); //don't select password here for redundant security
    return $user;
}

function selectPasswordHash($usernameOrEmail)
{
    global $conn;
    $query = 'SELECT Password FROM users WHERE Username = :usernameOrEmail OR Email = :usernameOrEmail';
    $statement = $conn->prepare($query);
    $statement->bindValue(':usernameOrEmail', $usernameOrEmail);
    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }
    $password = $statement->fetch();
    return $password['Password'];
}

function selectSetup($username, $setupID) //needs username so that users can't see setups from other users if they change setupid in inspect element
{
    global $conn;
    $query = 'SELECT * FROM setups WHERE SetupID = :setupID AND Username = :username';
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
    $record = $statement->fetch();
    if($record != NULL)
    {
        $setup = new Setup($record['SetupID'], $record['Username'], $record['SetupName'], $record['Budget'], $record['MonitorsCost'], $record['PCPartsCost'], $record['OS'], $record['CPUPreference'], $record['GPUPreference'], $record['DeskWidth'], $record['SCALE']);
        return $setup;
    }
    else
    {
        return NULL;
    }
}

function selectSetupsForUser($username)
{
    global $conn;
    $query = 'SELECT * FROM setups WHERE Username = :username';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        $setups = [];
        foreach($records as $record)
        {
            $setup = new Setup($record['SetupID'], $record['Username'], $record['SetupName'], $record['Budget'], $record['MonitorsCost'], $record['PCPartsCost'], $record['OS'], $record['CPUPreference'], $record['GPUPreference'], $record['DeskWidth'], $record['SCALE']);
            $setups[] = $setup;
        }
        return $setups;
    }
    else
    {
        return NULL;
    }
}

function selectMonitors($setupID)
{
    global $conn;
    $query = 'SELECT * FROM monitors WHERE SetupID = :setupID ORDER BY NumInSetup ASC';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        $setups = [];
        $monitors = [];
        foreach($records as $record)
        {
            $monitor = new Monitor($record['MonitorID'], $record['SetupID'], $record['NumInSetup'], $record['Diagonal'], $record['Units'], $record['BezelWidth'], $record['Orientation'], $record['AspectRatioType'], $record['ResolutionType'], $record['HorizontalResolution'], $record['VerticalResolution'], $record['HDR'], $record['sRGB'], $record['Curved'], $record['Touch'], $record['Webcam'], $record['Speakers'], $record['DisplayType'], $record['SyncType'], $record['RefreshRate'], $record['ResponseTime'], $record['VGA'], $record['DVI'], $record['HDMI'], $record['DisplayPort'], $record['Brand'], $record['Model'], $record['Cost'], $record['Link']);
            $monitors[] = $monitor;
        }
        return $monitors;
    }
    else
    {
        return NULL;
    }
}

function selectCPU($setupID)
{
    global $conn;
    $query = 'SELECT * FROM cpus WHERE SetupID = :setupID';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        foreach($records as $record) //should just be 1 record, so only return the first
        {
            $cpu = new CPU($record['CPUID'], $record['SetupID'], $record['Manufacturer'], $record['CodeName'], $record['Family'], $record['ModelName'], $record['Cost'], $record['Link'], $record['NumberCores'], $record['NumberThreads'], $record['ClockSpeed'], $record['Overclock'], $record['Wattage']);
            return $cpu;
        }
    }
    else
    {
        return NULL;
    }

}

function selectGPU($setupID)
{
    global $conn;
    $query = 'SELECT * FROM gpus WHERE SetupID = :setupID';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        foreach($records as $record) //should just be 1 record, so only return the first
        {
            $gpu = new GPU($record['GPUID'], $record['SetupID'], $record['Manufacturer'], $record['CodeName'], $record['Series'], $record['ModelName'], $record['Cost'], $record['Link'], $record['VRAM'], $record['ClockSpeed'], $record['Overclock'], $record['Wattage'], $record['VGA'], $record['DVI'], $record['HDMI'], $record['DisplayPort']);
            return $gpu;
        }
    }
    else
    {
        return NULL;
    }

}

function selectMotherboard($setupID)
{
    global $conn;
    $query = 'SELECT * FROM motherboards WHERE SetupID = :setupID';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        foreach($records as $record) //should just be 1 record, so only return the first
        {
            $motherboard = new Motherboard($record['MotherboardID'], $record['SetupID'], $record['Manufacturer'], $record['ModelName'], $record['FormFactor'], $record['Cost'], $record['Link'], $record['Wattage'], $record['Chipset'], $record['Socket'], $record['MaxRAM'], $record['RAMType'], $record['ExpansionSlots'], $record['StorageDevices'], $record['Ports']);
            return $motherboard;
        }
    }
    else
    {
        return NULL;
    }

}

function selectRAM($setupID)
{
    global $conn;
    $query = 'SELECT * FROM rams WHERE SetupID = :setupID';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        foreach($records as $record) //should just be 1 record, so only return the first
        {
            $ram = new RAM($record['RAMID'], $record['SetupID'], $record['Manufacturer'], $record['ModelName'], $record['RAMType'], $record['Cost'], $record['Link'], $record['ECC'], $record['Capacity'], $record['NumSticks'], $record['ClockSpeed'], $record['Voltage'], $record['Wattage']);
            return $ram;
        }
    }
    else
    {
        return NULL;
    }

}

function selectDrives($setupID)
{
    global $conn;
    $query = 'SELECT * FROM drives WHERE SetupID = :setupID ORDER BY DriveID ASC';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        $setups = [];
        $drives = [];
        foreach($records as $record)
        {
            $drive = new Drive($record['DriveID'], $record['SetupID'], $record['Manufacturer'], $record['ModelName'], $record['DriveType'], $record['Capacity'], $record['Cost'], $record['Link'], $record['FormFactor'], $record['Interface'], $record['RPM'], $record['ReadSpeed'], $record['WriteSpeed'], $record['Wattage']);
            $drives[] = $drive;
        }
        return $drives;
    }
    else
    {
        return NULL;
    }
}

function selectPSU($setupID)
{
    global $conn;
    $query = 'SELECT * FROM psus WHERE SetupID = :setupID';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        foreach($records as $record) //should just be 1 record, so only return the first
        {
            $psu = new PSU($record['PSUID'], $record['SetupID'], $record['Manufacturer'], $record['ModelName'], $record['MaxPower'], $record['Cost'], $record['Link'], $record['Certification'], $record['Outputs'], $record['Connectors']);
            return $psu;
        }
    }
    else
    {
        return NULL;
    }

}

function selectCase($setupID)
{
    global $conn;
    $query = 'SELECT * FROM cases WHERE SetupID = :setupID';
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
    $records =  $statement->fetchAll();
    if($records != NULL)
    {
        foreach($records as $record) //should just be 1 record, so only return the first
        {
            $case = new Tower($record['CaseID'], $record['SetupID'], $record['Manufacturer'], $record['ModelName'], $record['FormFactor'], $record['Cost'], $record['Link'], $record['Diminsions'], $record['Material'], $record['Color'], $record['Expansions'], $record['Ports'], $record['FanOptions'], $record['Features']);
            return $case;
        }
    }
    else
    {
        return NULL;
    }

}

function selectMonitorCountOfSetup($setupID)
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM monitors WHERE SetupID=:setupID';
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
    return $count[0];
}

?>