<?php

function updateEmail($username, $email)
{
    global $conn;
    $query = 'UPDATE users SET '
           . 'Email = :email '
           . 'WHERE Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':email', $email);
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

function updatePassword($username, $passwordHash)
{
    global $conn;
    $query = 'UPDATE users SET '
           . 'Password = :password '
           . 'WHERE Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':password', $passwordHash);
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

function updateSearchEngine($username, $searchEngine)
{
    global $conn;
    $query = 'UPDATE users '
           . 'SET SearchEngine = :searchEngine '
           . 'WHERE Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':searchEngine', $searchEngine);
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

function updateShowMoreSpecs($username, $showMoreSpecs)
{
    global $conn;
    $query = 'UPDATE users '
           . 'SET ShowMoreSpecs = :showMoreSpecs '
           . 'WHERE Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':showMoreSpecs', $showMoreSpecs);
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

function updateHideToolTips($username, $hideToolTips)
{
    global $conn;
    $query = 'UPDATE users '
           . 'SET HideToolTips = :hideToolTips '
           . 'WHERE Username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':hideToolTips', $hideToolTips);
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

function updateSetup($username, $setup)
{
    if(findSetupForUsername($_SESSION['username'], $setup->getSetupID()))
    {
        global $conn;
        $query = 'UPDATE setups SET '
               . 'SetupName = :setupName, '
               . 'Budget = :budget, '
               . 'MonitorsCost = :monitorsCost, '
               . 'PCPartsCost = :pcpartsCost, '
               . 'OS = :os, '
               . 'CPUPreference = :cpuPreference, '
               . 'GPUPreference = :gpuPreference, '
               . 'DeskWidth = :deskWidth, '
               . 'SCALE = :scale '
               . 'WHERE SetupID = :setupID AND Username = :username';
        $statement = $conn->prepare($query);
        $statement->bindValue(':username', $username); //from $_SESSION['user]
        $statement->bindValue(':setupID', $setup->getSetupID());
        $statement->bindValue(':setupName', $setup->getSetupName());
        $statement->bindValue(':budget', $setup->getBudget());
        $statement->bindValue(':monitorsCost', $setup->getMonitorsCost());
        $statement->bindValue(':pcpartsCost', $setup->getPCPartsCost());
        $statement->bindValue(':os', $setup->getOS());
        $statement->bindValue(':cpuPreference', $setup->getCPUPreference());
        $statement->bindValue(':gpuPreference', $setup->getGPUPreference());
        $statement->bindValue(':deskWidth', $setup->getDeskWidth());
        $statement->bindValue(':scale', $setup->getSCALE());
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

function updateMonitor($monitor)
{
    if(findSetupForUsername($_SESSION['username'], $monitor->getMonitorID()))
    {
        global $conn;
        $query = 'UPDATE monitors SET '
               . 'NumInSetup = :numInSetup, '
               . 'Diagonal = :diagonal, '
               . 'Units = :units, '
               . 'BezelWidth = :bezelWidth, '
               . 'Orientation = :orientation, '
               . 'AspectRatioType = :aspectRatioType, '
               . 'ResolutionType = :resolutionType, '
               . 'HorizontalResolution = :horizontalResolution, '
               . 'VerticalResolution = :verticalResolution, '
               . 'HDR = :hdr, '
               . 'sRGB = :srgb '
               . 'Curved = :curved, '
               . 'Touch = :touch, '
               . 'Webcam = :webcam, '
               . 'Speakers = :speakers, '
               . 'DisplayType = :displayType, '
               . 'SyncType = :syncType, '
               . 'RefreshRate = :refreshRate, '
               . 'ResponseTime = :responseTime, '
               . 'VGA = :vga, '
               . 'DVI = :dvi, '
               . 'HDMI = :hdmi '
               . 'DisplayPort = :displayPort, '
               . 'Brand = :brand, '
               . 'Model = :model, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'WHERE MonitorID = :monitorID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':setupID', $monitor->getSetupID());
        $statement->bindValue(':monitorID', $monitor->getMonitorID());
        $statement->bindValue(':numInSetup', $monitor->getNumInSetup());
        $statement->bindValue(':diagonal', $monitor->getDiagonal());
        $statement->bindValue(':units', $monitor->getUnits());
        $statement->bindValue(':bezelWidth', $monitor->getBezelWidth());
        $statement->bindValue(':orientation', $monitor->getOrientation());
        $statement->bindValue(':aspectRatioType', $monitor->getAspectRatioType());
        $statement->bindValue(':resolutionType', $monitor->getResolutionType());
        $statement->bindValue(':horizontalResolution', $monitor->getHorizontalResolution());
        $statement->bindValue(':verticalResolution', $monitor->getVerticalResolution());
        $statement->bindValue(':hdr', $monitor->getHDR());
        $statement->bindValue(':srgb', $monitor->getSRGB());
        $statement->bindValue(':curved', $monitor->getCurved());
        $statement->bindValue(':touch', $monitor->getTouch());
        $statement->bindValue(':webcam', $monitor->getWebcam());
        $statement->bindValue(':speakers', $monitor->getSpeakers());
        $statement->bindValue(':displayType', $monitor->getDisplayType());
        $statement->bindValue(':syncType', $monitor->getSyncType());
        $statement->bindValue(':refreshRate', $monitor->getRefreshRate());
        $statement->bindValue(':responseTime', $monitor->getResponseTime());
        $statement->bindValue(':vga', $monitor->getVGA());
        $statement->bindValue(':dvi', $monitor->getDVI());
        $statement->bindValue(':hdmi', $monitor->getHDMI());
        $statement->bindValue(':displayPort', $monitor->getDisplayPort());
        $statement->bindValue(':brand', $monitor->getBrand());
        $statement->bindValue(':model', $monitor->getModel());
        $statement->bindValue(':cost', $monitor->getCost());
        $statement->bindValue(':link', $monitor->getLink());
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

function updateCPU($cpu)
{
    if(findSetupForUsername($_SESSION['username'], $cpu->getCPUID()))
    {
        global $conn;
        $query = 'UPDATE cpus SET '
               . 'Manufacturer = :manufacturer, '
               . 'CodeName = :codeName, '
               . 'Family = :family, '
               . 'ModelName = :modelName, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'NumberCores = :numberCores, '
               . 'NumberThreads = :numberThreads, '
               . 'ClockSpeed = :clockSpeed, '
               . 'Overclock = :overclock, '
               . 'Wattage = :wattage '
               . 'WHERE CPUID = :cpuID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':cpuID', $cpu->getCPUID());
        $statement->bindValue(':setupID', $cpu->getSetupID());
        $statement->bindValue(':manufacturer', $cpu->getManufacturer());
        $statement->bindValue(':codeName', $cpu->getCodeName());
        $statement->bindValue(':family', $cpu->getFamily());
        $statement->bindValue(':modelName', $cpu->getModelName());
        $statement->bindValue(':cost', $cpu->getCost());
        $statement->bindValue(':link', $cpu->getLink());
        $statement->bindValue(':numberCores', $cpu->getNumberCores());
        $statement->bindValue(':numberThreads', $cpu->getNumberThreads());
        $statement->bindValue(':clockSpeed', $cpu->getClockSpeed());
        $statement->bindValue(':overclock', $cpu->getOverclock());
        $statement->bindValue(':wattage', $cpu->getWattage());
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

function updateGPU($gpu)
{
    if(findSetupForUsername($_SESSION['username'], $gpu->getGPUID()))
    {
        global $conn;
        $query = 'UPDATE gpus SET '
               . 'Manufacturer = :manufacturer, '
               . 'CodeName = :codeName, '
               . 'Series = :series, '
               . 'ModelName = :modelName, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'VRAM = :vram, '
               . 'ClockSpeed = :clockSpeed, '
               . 'Overclock = :overclock, '
               . 'Wattage = :wattage, '
               . 'VGA = :vga, '
               . 'DVI = :dvi, '
               . 'HDMI = :hdmi, '
               . 'DisplayPort = :displayPort '
               . 'WHERE GPUID = :gpuID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':gpuID', $gpu->getGPUID());
        $statement->bindValue(':setupID', $gpu->getSetupID());
        $statement->bindValue(':manufacturer', $gpu->getManufacturer());
        $statement->bindValue(':codeName', $gpu->getCodeName());
        $statement->bindValue(':series', $gpu->getSeries());
        $statement->bindValue(':modelName', $gpu->getModelName());
        $statement->bindValue(':cost', $gpu->getCost());
        $statement->bindValue(':link', $gpu->getLink());
        $statement->bindValue(':vram', $gpu->getVRAM());
        $statement->bindValue(':clockSpeed', $gpu->getClockSpeed());
        $statement->bindValue(':overclock', $gpu->getOverclock());
        $statement->bindValue(':wattage', $gpu->getWattage());
        $statement->bindValue(':vga', $gpu->getVGA());
        $statement->bindValue(':dvi', $gpu->getDVI());
        $statement->bindValue(':hdmi', $gpu->getHDMI());
        $statement->bindValue(':displayPort', $gpu->getDisplayPort());
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

function updateMotherboard($motherboard)
{
    if(findSetupForUsername($_SESSION['username'], $motherboard->getMotherboardID()))
    {
        global $conn;
        $query = 'UPDATE motherboards SET '
               . 'Manufacturer = :manufacturer, '
               . 'ModelName = :modelName, '
               . 'FormFactor = :formFactor, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'Wattage = :wattage, '
               . 'Chipset = :chipset, '
               . 'Socket = :socket, '
               . 'MaxRAM = :maxRAM, '
               . 'RAMType = :ramType, '
               . 'ExpansionSlots = :expansionSlots, '
               . 'StorageDevices = :storageDevices, '
               . 'Ports = :ports '
               . 'WHERE MotherboardID = :motherboardID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':motherboardID', $motherboard->getMotherboardID());
        $statement->bindValue(':setupID', $motherboard->getSetupID());
        $statement->bindValue(':manufacturer', $motherboard->getManufacturer());
        $statement->bindValue(':modelName', $motherboard->getModelName());
        $statement->bindValue(':formFactor', $motherboard->getFormFactor());
        $statement->bindValue(':cost', $motherboard->getCost());
        $statement->bindValue(':link', $motherboard->getLink());
        $statement->bindValue(':wattage', $motherboard->getWattage());
        $statement->bindValue(':chipset', $motherboard->getChipset());
        $statement->bindValue(':socket', $motherboard->getSocket());
        $statement->bindValue(':maxRAM', $motherboard->getMaxRAM());
        $statement->bindValue(':ramType', $motherboard->getRAMType());
        $statement->bindValue(':expansionSlots', $motherboard->getExpansionSlots());
        $statement->bindValue(':storageDevices', $motherboard->getStorageDevices());
        $statement->bindValue(':ports', $motherboard->getPorts());
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

function updateRAM($ram)
{
    if(findSetupForUsername($_SESSION['username'], $ram->getRAMID()))
    {
        global $conn;
        $query = 'UPDATE rams SET '
               . 'Manufacturer = :manufacturer, '
               . 'ModelName = :modelName, '
               . 'RAMType = :ramType, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'ECC = :ecc, '
               . 'Capacity = :capacity, '
               . 'NumSticks = :numSticks, '
               . 'ClockSpeed = :clockSpeed, '
               . 'Voltage = :voltage, '
               . 'Wattage = :wattage '
               . 'WHERE RAMID = :ramID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':ramID', $ram->getRAMID());
        $statement->bindValue(':setupID', $ram->getSetupID());
        $statement->bindValue(':manufacturer', $ram->getManufacturer());
        $statement->bindValue(':modelName', $ram->getModelName());
        $statement->bindValue(':ramType', $ram->getRAMType());
        $statement->bindValue(':cost', $ram->getCost());
        $statement->bindValue(':link', $ram->getLink());
        $statement->bindValue(':ecc', $ram->getECC());
        $statement->bindValue(':capacity', $ram->getCapacity());
        $statement->bindValue(':numSticks', $ram->getNumSticks());
        $statement->bindValue(':clockSpeed', $ram->getClockSpeed());
        $statement->bindValue(':voltage', $ram->getVoltage());
        $statement->bindValue(':wattage', $ram->getWattage());
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

function updateDrive($drive)
{
    if(findSetupForUsername($_SESSION['username'], $drive->getDriveID()))
    {
        global $conn;
        $query = 'UPDATE drives SET '
               . 'Manufacturer = :manufacturer, '
               . 'ModelName = :modelName, '
               . 'DriveType = :driveType, '
               . 'Capacity = :capacity, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'FormFactor = :formFactor, '
               . 'Interface = :interface, '
               . 'RPM = :rpm, '
               . 'ReadSpeed = :readSpeed, '
               . 'WriteSpeed = :writeSpeed, '
               . 'Wattage = :wattage '
               . 'WHERE DriveID = :driveID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':driveID', $drive->getDriveID());
        $statement->bindValue(':setupID', $drive->getSetupID());
        $statement->bindValue(':manufacturer', $drive->getManufacturer());
        $statement->bindValue(':modelName', $drive->getModelName());
        $statement->bindValue(':driveType', $drive->getDriveType());
        $statement->bindValue(':capacity', $drive->getCapacity());
        $statement->bindValue(':cost', $drive->getCost());
        $statement->bindValue(':link', $drive->getLink());
        $statement->bindValue(':formFactor', $drive->getFormFactor());
        $statement->bindValue(':interface', $drive->getInterface());
        $statement->bindValue(':rpm', $drive->getRPM());
        $statement->bindValue(':readSpeed', $drive->getReadSpeed());
        $statement->bindValue(':writeSpeed', $drive->getWriteSpeed());
        $statement->bindValue(':wattage', $drive->getWattage());
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

function updatePSU($psu)
{
    if(findSetupForUsername($_SESSION['username'], $psu->getPSUID()))
    {
        global $conn;
        $query = 'UPDATE psus SET '
               . 'Manufacturer = :manufacturer, '
               . 'ModelName = :modelName, '
               . 'MaxPower = :maxPower, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'Certification = :certification, '
               . 'Outputs = :outputs, '
               . 'Connectors = :connectors '
               . 'WHERE PSUID = :psuID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':psuID', $psu->getPSUID());
        $statement->bindValue(':setupID', $psu->getSetupID());
        $statement->bindValue(':manufacturer', $psu->getManufacturer());
        $statement->bindValue(':modelName', $psu->getModelName());
        $statement->bindValue(':maxPower', $psu->getMaxPower());
        $statement->bindValue(':cost', $psu->getCost());
        $statement->bindValue(':link', $psu->getLink());
        $statement->bindValue(':certification', $psu->getCertification());
        $statement->bindValue(':outputs', $psu->getOutputs());
        $statement->bindValue(':connectors', $psu->getConnectors());
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

function updateCase($case)
{
    if(findSetupForUsername($_SESSION['username'], $case->getCaseID()))
    {
        global $conn;
        $query = 'UPDATE cases SET '
               . 'Manufacturer = :manufacturer, '
               . 'ModelName = :modelName, '
               . 'FormFactor = :formFactor, '
               . 'Cost = :cost, '
               . 'Link = :link, '
               . 'Diminsions = :diminsions, '
               . 'Material = :material, '
               . 'Color = :color, '
               . 'Expansions = :expansions, '
               . 'Ports = :ports, '
               . 'FanOptions = :fanOptions, '
               . 'Features = :features '
               . 'WHERE CaseID = :caseID AND SetupID = :setupID';
        $statement = $conn->prepare($query);
        $statement->bindValue(':caseID', $case->getCaseID());
        $statement->bindValue(':setupID', $case->getSetupID());
        $statement->bindValue(':manufacturer', $case->getManufacturer());
        $statement->bindValue(':modelName', $case->getModelName());
        $statement->bindValue(':formFactor', $case->getFormFactor());
        $statement->bindValue(':cost', $case->getCost());
        $statement->bindValue(':link', $case->getLink());
        $statement->bindValue(':diminsions', $case->getDiminsions());
        $statement->bindValue(':material', $case->getMaterial());
        $statement->bindValue(':color', $case->getColor());
        $statement->bindValue(':expansions', $case->getExpansions());
        $statement->bindValue(':ports', $case->getPorts());
        $statement->bindValue(':fanOptions', $case->getFanOptions());
        $statement->bindValue(':features', $case->getFeatures());
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