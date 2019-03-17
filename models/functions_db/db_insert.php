<?php

function insertUser($user)
{
    global $conn;
    $query = 'INSERT INTO users(Username, Email, Password) '
            . 'VALUES(:username, :email, :password)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $user->getUsername());
    $statement->bindValue(':email', $user->getEmail());
    $statement->bindValue(':password', $user->getPassword());
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

function insertSetup($setup)
{
    global $conn;
    $query = 'INSERT INTO setups(Username, SetupName, Budget, MonitorsCost, PCPartsCost, OS, CPUPreference, GPUPreference, DeskWidth, SCALE) '
           . 'VALUES(:username, :setupName, :budget, :monitorsCost, :pcpartsCost, :OS, :CPUPreference, :GPUPreference, :deskWidth, :SCALE)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $setup->getUsername());
    $statement->bindValue(':setupName', $setup->getSetupName());
    $statement->bindValue(':budget', $setup->getBudget());
    $statement->bindValue(':monitorsCost', $setup->getMonitorsCost());
    $statement->bindValue(':pcpartsCost', $setup->getPCPartsCost());
    $statement->bindValue(':OS', $setup->getOS());
    $statement->bindValue(':CPUPreference', $setup->getCPUPreference());
    $statement->bindValue(':GPUPreference', $setup->getGPUPreference());
    $statement->bindValue(':deskWidth', $setup->getDeskWidth());
    $statement->bindValue(':SCALE', $setup->getSCALE());
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
    return $conn->lastInsertId();
}

function insertMonitor($monitor)
{
    global $conn;
    $query = 'INSERT INTO monitors (SetupID, NumInSetup, Diagonal, Units, BezelWidth, Orientation, AspectRatioType, ResolutionType, HorizontalResolution, VerticalResolution, HDR, sRGB, Curved, Touch, Webcam, Speakers, DisplayType, SyncType, RefreshRate, ResponseTime, VGA, DVI, HDMI, DisplayPort, Brand, Model, Cost, Link) '
           . 'VALUES(:setupID, :numInSetup, :diagonal, :units, :bezelWidth, :orientation, :aspectRatioType, :resolutionType, :horizontalResolution, :verticalResolution, :hdr, :srgb, :curved, :touch, :webcam, :speakers, :displayType, :syncType, :refreshRate, :responseTime, :vga, :dvi, :hdmi, :displayPort, :brand, :model, :cost, :link)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':setupID', $monitor->getSetupID());
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
    return $conn->lastInsertId();
}

function insertCPU($cpu)
{
    global $conn;
    $query = 'INSERT INTO cpus (SetupID, Manufacturer, CodeName, Family, ModelName, Cost, Link, NumberCores, NumberThreads, ClockSpeed, Overclock, Wattage) '
           . 'VALUES(:setupID, :manufacturer, :codeName, :family, :modelName, :cost, :link, :numberCores, :numberThreads, :clockSpeed, :overclock, :wattage)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

function insertGPU($gpu)
{
    global $conn;
    $query = 'INSERT INTO gpus (SetupID, Manufacturer, CodeName, Series, ModelName, Cost, Link, VRAM, ClockSpeed, Overclock, Wattage, VGA, DVI, HDMI, DisplayPort) '
           . 'VALUES(:setupID, :manufacturer, :codeName, :series, :modelName, :cost, :link, :vram, :clockSpeed, :overclock, :wattage, :vga, :dvi, :hdmi, :displayPort)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

function insertMotherboard($motherboard)
{
    global $conn;
    $query = 'INSERT INTO motherboards (SetupID, Manufacturer, ModelName, FormFactor, Cost, Link, Wattage, Chipset, Socket, MaxRAM, RAMType, ExpansionSlots, StorageDevices, Ports) '
           . 'VALUES(:setupID, :manufacturer, :modelName, :formFactor, :cost, :link, :wattage, :chipset, :socket, :maxRAM, :ramType, :expansionSlots, :storageDevices, :ports)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

function insertRAM($ram)
{
    global $conn;
    $query = 'INSERT INTO rams (SetupID, Manufacturer, ModelName, RAMType, Cost, Link, ECC, Capacity, NumSticks, ClockSpeed, Voltage, Wattage) '
           . 'VALUES(:setupID, :manufacturer, :modelName, :ramType, :cost, :link, :ecc, :capacity, :numSticks, :clockSpeed, :voltage, :wattage)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

function insertDrive($drive)
{
    global $conn;
    $query = 'INSERT INTO drives (SetupID, Manufacturer, ModelName, DriveType, Capacity, Cost, Link, FormFactor, Interface, RPM, ReadSpeed, WriteSpeed, Wattage) '
           . 'VALUES(:setupID, :manufacturer, :modelName, :driveType, :capacity, :cost, :link, :formFactor, :interface, :rpm, :readSpeed, :writeSpeed, :wattage)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

function insertPSU($psu)
{
    global $conn;
    $query = 'INSERT INTO psus (SetupID, Manufacturer, ModelName, MaxPower, Cost, Link, Certification, Outputs, Connectors) '
           . 'VALUES(:setupID, :manufacturer, :modelName, :maxPower, :cost, :link, :certification, :outputs, :connectors)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

function insertCase($case)
{
    global $conn;
    $query = 'INSERT INTO cases (SetupID, Manufacturer, ModelName, FormFactor, Cost, Link, Diminsions, Material, Color, Expansions, Ports, FanOptions, Features) '
           . 'VALUES(:setupID, :manufacturer, :modelName, :formFactor, :cost, :link, :diminsions, :material, :color, :expansions, :ports, :fanOptions, :features)';
    $statement = $conn->prepare($query);
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
    return $conn->lastInsertId();
}

?>