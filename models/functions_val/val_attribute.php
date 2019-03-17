<?php

function validateSearchEngine($searchEngine)
{
    if($searchEngine === NULL) return 'Search Engine Problem';
    else return NULL;
}

function validateSetupName($username, $setupName)
{
    if(isStringBlank($setupName)) return 'A Setup Name is required';
    else if(strlen($setupName) < 3) return 'Give this setup a proper name';
    else if(strlen($setupName) > 50) return 'Setup Name is too long';
    else if(!preg_match('/^[a-zA-Z0-9_ ]{1,30}$/', $setupName)) return 'Setup Name can contain letters, numbers, and spaces and must be 3 to 30 characters long.';
//  else if(findSetupName($username, $setupName)) return 'You already have a Setup called ' . $setupName;
    else return NULL;
}

function validateBudget($budget)
{
    if($budget === NULL || $budget === FALSE || $budget <= 0) return 'A valid budget is required';
    else if($budget > 999999999) return 'You are so rich that it breaks our database';
    else return NULL;
}

function validateOS($os)
{
    if($os === NULL) return 'Your compter will need an operating system';
    else return NULL;
}

function validateCPUPreference($cpuPreference)
{
    $validCPUTypes = ['Intel', 'AMD', 'Qualcomm', 'Other', 'No Preference'];
    if(!in_array($cpuPreference, $validCPUTypes)) return 'Not a valid CPU type';
    else return NULL;
}

function validateGPUPreference($gpuPreference)
{
    $validGPUTypes = ['NVIDIA', 'AMD', 'Other', 'No Preference'];
    if(!in_array($gpuPreference, $validGPUTypes)) 'Not a valid GPU type';
    else return NULL;
}

function validateDeskWidth($deskWidth)
{
    if($deskWidth === FALSE || $deskWidth < 0 || $deskWidth > 999) return 'Invalid Desk Width';
    else return NULL;
}

function validateDiagonal($diagonal)
{
    if($diagonal === NULL || $diagonal === FALSE) return 'A valid number for diagonal length is required';
    else if($diagonal < 0) return 'Diagonal must be greater than 0';
    else if($diagonal > 500) return 'This tool is for monitors, not jumbotrons!';
    else return NULL;
}

function validateUnits($units)
{
    if($units === NULL || ($units != 'in' && $unints != 'cm')) return 'invalid units';
    else return NULL;
}

function validateBezelWidth($bezelWidth)
{
    if($bezelWidth === NULL || $bezelWidth === FALSE || $bezelWidth < 0 || $bezelWidth > 12) return 'Invalid Bezel Width';
    else return NULL;
}

function validateOrientation($orientation)
{
    if($orientation === NULL || ($orientation != 'landscape' && $orientation != 'portrait')) return 'Invalid Orientation';
    else return NULL;
}

function validateAspectRatioType($aspectRatioType)
{
    if($aspectRatioType === NULL) return 'Aspect Ratio needed';
    else return NULL;
}

function validateResolutionType($resolutionType)
{
    if($resolutionType === NULL) return 'Resolution needed';
    else return NULL;
}

function validateHorizontalResolution($horizontalResolution)
{
    if($horizontalResolution === FALSE || $horizontalResolution < 0 || $horizontalResolution > 1000000) return 'Invalid Resolution';
    else return NULL;
}

function validateVerticalResolution($verticalResolution)
{
    if($verticalResolution === FALSE || $verticalResolution < 0 || $verticalResolution > 1000000) return 'Invalid Resolution';
    else return NULL;
}

function validateHDR($hdr)
{
if($hdr != NULL && $hdr != 0 && $hdr != 1) return 'Invalid HDR';
    else return NULL;
}

function validateSRGB($srgb)
{
    if($srgb != NULL || $srgb != 'sRGB' || $srgb != 0 || $srgb != 1) return 'Invalid sRGB';
    else return NULL;
}

function validateCurved($curved)
{
    if($curved != NULL || $curved != 'Curved' || $curved != 0 || $curved != 1) return 'Invalid Curved';
    else return NULL;
}

function validateTouch($touch)
{
    if($touch != NULL || $touch != 'Touch' || $touch != 0 || $touch != 1) return 'Invalid Touch';
    else return NULL;
}

function validateWebcam($webcam)
{
    if($webcam != NULL || $webcam != 'Webcam' || $webcam != 0 || $webcam != 1) return 'Invalid Webcam';
    else return NULL;
}

function validateSpeakers($speakers)
{
    if($speakers != NULL || $speakers != 'Speakers' || $speakers != 0 || $speakers != 1) return 'Invalid Webcam';
    else return NULL;
}

function validateManufacturerFamilySeries($name)
{
    if($name == NULL) return NULL;
    if(strlen($name) > 30) return 'Too Long';
    else return NULL;
}

function validateModelName($name)
{
    if($name == NULL) return NULL;
    if(strlen($name) > 40) return 'Too Long';
    else return NULL;
}

function validateCost($cost)
{
    if($cost == NULL) return NULL;
    if($cost == FALSE || $cost < 0 || $cost > 999999999) return 'Cost Too Big';
    else return NULL;
}

function validateLink($link)
{
    if($link == NULL) return NULL;
    // https://stackoverflow.com/questions/16481641/php-regex-match-all-urls
    if($link === FALSE || !preg_match('#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si', $link)) return 'Invalid Link';
    else return NULL;
}

function validateWattage($wattage)
{
    if($wattage == NULL || $wattage == 0) return NULL;
    if($wattage == FALSE || !validateNumRange($wattage, 0, 999999999)) return 'Wattage Range Error';
    else return NULL;
}

?>