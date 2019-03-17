<?php

class Monitor
{
    private $monitorID;
    private $setupID;
    private $numInSetup;
    private $diagonal;
    private $units;
    private $bezelWidth;
    private $orientation;
    private $aspectRatioType;
    private $resolutionType;
    private $horizontalResolution;
    private $verticalResolution;
    private $HDR;
    private $sRGB;
    private $curved;
    private $touch;
    private $webcam;
    private $speakers;
    private $displayType;
    private $syncType;
    private $refreshRate;
    private $responseTime;
    private $VGA;
    private $DVI;
    private $HDMI;
    private $displayPort;
    private $brand;
    private $model;
    private $cost;
    private $link;

    function __construct($monitorID, $setupID, $numInSetup, $diagonal, $units, $bezelWidth, $orientation, $aspectRatioType, $resolutionType, $horizontalResolution, $verticalResolution, $HDR, $sRGB, $curved, $touch, $webcam, $speakers, $displayType, $syncType, $refreshRate, $responseTime, $VGA, $DVI, $HDMI, $displayPort, $brand, $model, $cost, $link) {
        $this->monitorID = $monitorID;
        $this->setupID = $setupID;
        $this->numInSetup = $numInSetup;
        $this->diagonal = $diagonal;
        $this->units = $units;
        $this->bezelWidth = $bezelWidth;
        $this->orientation = $orientation;
        $this->aspectRatioType = $aspectRatioType;
        $this->resolutionType = $resolutionType;
        $this->horizontalResolution = $horizontalResolution;
        $this->verticalResoultion = $verticalResolution;
        $this->HDR = $HDR;
        $this->sRGB = $sRGB;
        $this->curved = $curved;
        $this->touch = $touch;
        $this->webcam = $webcam;
        $this->speakers = $speakers;
        $this->displayType = $displayType;
        $this->syncType = $syncType;
        $this->refreshRate = $refreshRate;
        $this->responseTime = $responseTime;
        $this->VGA = $VGA;
        $this->DVI = $DVI;
        $this->HDMI = $HDMI;
        $this->displayPort = $displayPort;
        $this->brand = $brand;
        $this->model = $model;
        $this->cost = $cost;
        $this->link = $link;
    }

    function getMonitorID() {
        return $this->monitorID;
    }

    function getSetupID() {
        return $this->setupID;
    }

    function getNumInSetup() {
        return $this->numInSetup;
    }

    function getDiagonal() {
        return $this->diagonal;
    }

    function getUnits() {
        return $this->units;
    }

    function getBezelWidth() {
        return $this->bezelWidth;
    }

    function getOrientation() {
        return $this->orientation;
    }

    function getAspectRatioType() {
        return $this->aspectRatioType;
    }

    function getResolutionType() {
        return $this->resolutionType;
    }

    function getHorizontalResolution() {
        return $this->horizontalResolution;
    }

    function getVerticalResolution() {
        return $this->verticalResoultion;
    }

    function getHDR() {
        return $this->HDR;
    }

    function getSRGB() {
        return $this->sRGB;
    }

    function getCurved() {
        return $this->curved;
    }

    function getTouch() {
        return $this->touch;
    }

    function getWebcam() {
        return $this->webcam;
    }

    function getSpeakers() {
        return $this->speakers;
    }

    function getDisplayType() {
        return $this->displayType;
    }

    function getSyncType() {
        return $this->syncType;
    }

    function getRefreshRate() {
        return $this->refreshRate;
    }

    function getResponseTime() {
        return $this->responseTime;
    }

    function getVGA() {
        return $this->VGA;
    }

    function getDVI() {
        return $this->DVI;
    }

    function getHDMI() {
        return $this->HDMI;
    }

    function getDisplayPort() {
        return $this->displayPort;
    }

    function getBrand() {
        return $this->brand;
    }

    function getModel() {
        return $this->model;
    }

    function getCost() {
        return $this->cost;
    }

    function getLink() {
        return $this->link;
    }

    function setMonitorID($monitorID) {
        $this->monitorID = $monitorID;
    }

    function setSetupID($setupID) {
        $this->setupID = $setupID;
    }

    function setNumInSetup($numInSetup) {
        $this->numInSetup = $numInSetup;
    }

    function setDiagonal($diagonal) {
        $this->diagonal = $diagonal;
    }

    function setUnits($units) {
        $this->units = $units;
    }

    function setBezelWidth($bezelWidth) {
        $this->bezelWidth = $bezelWidth;
    }

    function setOrientation($orientation) {
        $this->orientation = $orientation;
    }

    function setAspectRatioType($aspectRatioType) {
        $this->aspectRatioType = $aspectRatioType;
    }

    function setResolutionType($resolutionType) {
        $this->resolutionType = $resolutionType;
    }

    function setHorizontalResolution($horizontalResolution) {
        $this->horizontalResolution = $horizontalResolution;
    }

    function setVerticalResolution($verticalResolution) {
        $this->verticalResoultion = $verticalResolution;
    }

    function setHDR($HDR) {
        $this->HDR = $HDR;
    }

    function setSRGB($sRGB) {
        $this->sRGB = $sRGB;
    }

    function setCurved($curved) {
        $this->curved = $curved;
    }

    function setTouch($touch) {
        $this->touch = $touch;
    }

    function setWebcam($webcam) {
        $this->webcam = $webcam;
    }

    function setSpeakers($speakers) {
        $this->speakers = $speakers;
    }

    function setDisplayType($displayType) {
        $this->displayType = $displayType;
    }

    function setSyncType($syncType) {
        $this->syncType = $syncType;
    }

    function setRefreshRate($refreshRate) {
        $this->refreshRate = $refreshRate;
    }

    function setResponseTime($responseTime) {
        $this->responseTime = $responseTime;
    }

    function setVGA($VGA) {
        $this->VGA = $VGA;
    }

    function setDVI($DVI) {
        $this->DVI = $DVI;
    }

    function setHDMI($HDMI) {
        $this->HDMI = $HDMI;
    }

    function setDisplayPort($displayPort) {
        $this->displayPort = $displayPort;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }

    function setModel($model) {
        $this->model = $model;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setLink($link) {
        $this->link = $link;
    }

}

?>
