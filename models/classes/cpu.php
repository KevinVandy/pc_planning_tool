<?php

class CPU {
    private $CPUID;
    private $setupID;
    private $manufacturer;
    private $codeName;
    private $family;
    private $modelName;
    private $cost;
    private $link;
    private $numberCores;
    private $numberThreads;
    private $clockSpeed;
    private $overclock;
    private $wattage;

    function __construct($CPUID, $setupID, $manufacturer, $codeName, $family, $modelName, $cost, $link, $numberCores, $numberThreads, $clockSpeed, $overclock, $wattage) {
        $this->CPUID = $CPUID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->codeName = $codeName;
        $this->family = $family;
        $this->modelName = $modelName;
        $this->cost = $cost;
        $this->link = $link;
        $this->numberCores = $numberCores;
        $this->numberThreads = $numberThreads;
        $this->clockSpeed = $clockSpeed;
        $this->overclock = $overclock;
        $this->wattage = $wattage;
    }

    function getCPUID() {
        return $this->CPUID;
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

    function getFamily() {
        return $this->family;
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

    function getNumberCores() {
        return $this->numberCores;
    }

    function getNumberThreads() {
        return $this->numberThreads;
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

    function setCPUID($CPUID) {
        $this->CPUID = $CPUID;
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

    function setFamily($family) {
        $this->family = $family;
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

    function setNumberCores($numberCores) {
        $this->numberCores = $numberCores;
    }

    function setNumberThreads($numberThreads) {
        $this->numberThreads = $numberThreads;
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
}

?>
