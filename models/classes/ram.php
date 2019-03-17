<?php

class RAM {
    private $RAMID;
    private $setupID;
    private $manufacturer;
    private $modelName;
    private $RAMType;
    private $cost;
    private $link;
    private $ECC;
    private $capacity;
    private $numSticks;
    private $clockSpeed;
    private $voltage;
    private $wattage;

    function __construct($RAMID, $setupID, $manufacturer, $modelName, $RAMType, $cost, $link, $ECC, $capacity, $numSticks, $clockSpeed, $voltage, $wattage) {
        $this->RAMID = $RAMID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->modelName = $modelName;
        $this->RAMType = $RAMType;
        $this->cost = $cost;
        $this->link = $link;
        $this->ECC = $ECC;
        $this->capacity = $capacity;
        $this->numSticks = $numSticks;
        $this->clockSpeed = $clockSpeed;
        $this->voltage = $voltage;
        $this->wattage = $wattage;
    }

    function getRAMID() {
        return $this->RAMID;
    }

    function getSetupID() {
        return $this->setupID;
    }

    function getManufacturer() {
        return $this->manufacturer;
    }

    function getModelName() {
        return $this->modelName;
    }

    function getRAMType() {
        return $this->RAMType;
    }

    function getCost() {
        return $this->cost;
    }

    function getLink() {
        return $this->link;
    }

    function getEcc() {
        return $this->ECC;
    }

    function getCapacity() {
        return $this->capacity;
    }

    function getNumSticks() {
        return $this->numSticks;
    }

    function getClockSpeed() {
        return $this->clockSpeed;
    }

    function getVoltage() {
        return $this->voltage;
    }

    function getWattage() {
        return $this->wattage;
    }

    function setRAMID($RAMID) {
        $this->RAMID = $RAMID;
    }

    function setSetupID($setupID) {
        $this->setupID = $setupID;
    }

    function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
    }

    function setModelName($modelName) {
        $this->modelName = $modelName;
    }

    function setRAMType($RAMType) {
        $this->RAMType = $RAMType;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setEcc($ECC) {
        $this->ECC = $ECC;
    }

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function setNumSticks($numSticks) {
        $this->numSticks = $numSticks;
    }

    function setClockSpeed($clockSpeed) {
        $this->clockSpeed = $clockSpeed;
    }

    function setVoltage($voltage) {
        $this->voltage = $voltage;
    }

    function setWattage($wattage) {
        $this->wattage = $wattage;
    }
}
