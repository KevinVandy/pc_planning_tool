<?php

function validatePreferences($username, $setupName, $budget, $os, $cpuPreference, $gpuPreference, $deskWidth)
{
    $errorMsgs = [];
    $errorMsgs['setupname'] = validateSetupName($username, $setupName);
    $errorMsgs['budget'] = validateBudget($budget);
    $errorMsgs['os'] = validateOS($os);
    $errorMsgs['cpupreference'] = validateCPUPreference($cpuPreference);
    $errorMsgs['gpupreference'] = validateGPUPreference($gpuPreference);
    $errorMsgs['deskwidth'] = validateDeskWidth($deskWidth);
    if(!isArrayNull($errorMsgs)) $errorMsgs['setup'] = 'There is a problem saving your Preferences';
    return $errorMsgs;
}

function validateMonitor($monitor)
{
    $errorMsgs = [];
    $errorMsgs['diagonal'] = validateDiagonal($monitor->getDiagonal());
    $errorMsgs['units'] = validateUnits($monitor->getUnits());
    $errorMsgs['bezelwidth'] = validateBezelWidth($monitor->getBezelWidth());
    $errorMsgs['orientation'] = validateOrientation($monitor->getOrientation());
    $errorMsgs['aspectratiotype'] = validateAspectRatioType($monitor->getAspectRatioType());
    $errorMsgs['resolutiontype'] = validateResolutionType($monitor->getResolutionType());
    $errorMsgs['horizontalresolution'] = validateHorizontalResolution($monitor->getHorizontalResolution());
    $errorMsgs['verticalresolution'] = validateVerticalResolution($monitor->getVerticalResolution());
    /*$errorMsgs['hdr'] = validateHDR($monitor->getHDR());
    $errorMsgs['srgb'] = validateSRGB($monitor->getSRGB());
    $errorMsgs['curved'] = validateCurved($monitor->getCurved());
    $errorMsgs['touch'] = validateTouch($monitor->getTouch());
    $errorMsgs['webcam'] = validateWebcam($monitor->getWebcam());
    $errorMsgs['speakers'] = validateWebcam($monitor->getSpeakers());*/
    if(!isArrayNull($errorMsgs)) $errorMsgs['monitor'] = 'Monitors Error';
    return $errorMsgs;
}



function validateCPU($cpu)
{
    $errorMsgs = [];
    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($cpu->getManufacturer());
    $errorMsgs['codename'] = validateManufacturerFamilySeries($cpu->getCodeName());
    $errorMsgs['family'] = validateManufacturerFamilySeries($cpu->getFamily());
    $errorMsgs['cost'] = validateCost($cpu->getCost());
    $errorMsgs['link'] = validateLink($cpu->getLink());
    $errorMsgs['wattage'] = validateWattage($cpu->getWattage());

    return $errorMsgs;
}

function validateGPU($gpu)
{
    $errorMsgs = [];
    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($gpu->getManufacturer());
    $errorMsgs['codenam'] = validateManufacturerFamilySeries($gpu->getCodeName());
    $errorMsgs['series'] = validateManufacturerFamilySeries($gpu->getSeries());
    $errorMsgs['cost'] = validateCost($gpu->getCost());
    $errorMsgs['link'] = validateLink($gpu->getLink());
    $errorMsgs['wattage'] = validateWattage($gpu->getWattage());

    return $errorMsgs;
}

function validateMotherboard($motherboard)
{
    $errorMsgs = [];

    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($motherboard->getManufacturer());
    $errorMsgs['modelname'] = validateManufacturerFamilySeries($motherboard->getModelName());
    $errorMsgs['cost'] = validateCost($motherboard->getCost());
    $errorMsgs['link'] = validateLink($motherboard->getLink());
    $errorMsgs['wattage'] = validateWattage($motherboard->getWattage());

    return $errorMsgs;
}

function validateRAM($ram)
{
    $errorMsgs = [];

    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($ram->getManufacturer());
    $errorMsgs['modelname'] = validateManufacturerFamilySeries($ram->getModelName());
    $errorMsgs['cost'] = validateCost($ram->getCost());
    $errorMsgs['link'] = validateLink($ram->getLink());

    return $errorMsgs;
}

function validateDrive($drive)
{
    $errorMsgs = [];

    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($drive->getManufacturer());
    $errorMsgs['modelname'] = validateManufacturerFamilySeries($drive->getModelName());
    $errorMsgs['cost'] = validateCost($drive->getCost());
    $errorMsgs['link'] = validateLink($drive->getLink());

    return $errorMsgs;
}

function validatePSU($psu)
{
    $errorMsgs = [];

    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($psu->getManufacturer());
    $errorMsgs['modelname'] = validateManufacturerFamilySeries($psu->getModelName());
    $errorMsgs['cost'] = validateCost($psu->getCost());
    $errorMsgs['link'] = validateLink($psu->getLink());
    $errorMsgs['maxpower'] = validateWattage($psu->getMaxPower());

    return $errorMsgs;
}

function validateCase($case)
{
    $errorMsgs = [];

    $errorMsgs['manufacturer'] = validateManufacturerFamilySeries($case->getManufacturer());
    $errorMsgs['modelname'] = validateManufacturerFamilySeries($case->getModelName());
    $errorMsgs['cost'] = validateCost($case->getCost());
    $errorMsgs['link'] = validateLink($case->getLink());

    return $errorMsgs;
}

?>