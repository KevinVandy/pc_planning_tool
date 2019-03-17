<?php

class GPU {
    private $GPUID;
    private $setupID;
    private $manufacturer;
    private $codeName;
    private $series;
    private $modelName;
    private $cost;
    private $link;
    private $VRAM;
    private $clockSpeed;
    private $overclock;
    private $wattage;
    private $VGA;
    private $DVI;
    private $HDMI;
    private $displayPort;

    function __construct($GPUID, $setupID, $manufacturer, $codeName, $series, $modelName, $cost, $link, $VRAM, $clockSpeed, $overclock, $wattage, $VGA, $DVI, $HDMI, $displayPort) {
        $this->GPUID = $GPUID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->codeName = $codeName;
        $this->series = $series;
        $this->modelName = $modelName;
        $this->cost = $cost;
        $this->link = $link;
        $this->VRAM = $VRAM;
        $this->clockSpeed = $clockSpeed;
        $this->overclock = $overclock;
        $this->wattage = $wattage;
        $this->VGA = $VGA;
        $this->DVI = $DVI;
        $this->HDMI = $HDMI;
        $this->displayPort = $displayPort;
    }

    function getGPUID() {
        return $this->GPUID;
    }

    function getSetupID() {
        return $this->setupID;
    }

    function getManufacturer() {
        return $this->manufacturer;
    }

    function getCodeName() {
        return $this->codeName;
    }

    function getSeries() {
        return $this->series;
    }

    function getModelName() {
        return $this->modelName;
    }

    function getCost() {
        return $this->cost;
    }

    function getLink() {
        return $this->link;
    }

    function getVRAM() {
        return $this->VRAM;
    }

    function getClockSpeed() {
        return $this->clockSpeed;
    }

    function getOverclock() {
        return $this->overclock;
    }

    function getWattage() {
        return $this->wattage;
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

    function setGPUID($GPUID) {
        $this->GPUID = $GPUID;
    }

    function setSetupID($setupID) {
        $this->setupID = $setupID;
    }

    function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
    }

    function setCodeName($codeName) {
        $this->codeName = $codeName;
    }

    function setSeries($series) {
        $this->series = $series;
    }

    function setModelName($modelName) {
        $this->modelName = $modelName;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setVRAM($VRAM) {
        $this->VRAM = $VRAM;
    }

    function setClockSpeed($clockSpeed) {
        $this->clockSpeed = $clockSpeed;
    }

    function setOverclock($overclock) {
        $this->overclock = $overclock;
    }

    function setWattage($wattage) {
        $this->wattage = $wattage;
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
}

?>
