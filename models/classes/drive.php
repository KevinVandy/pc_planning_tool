<?php

class Drive {
    private $driveID;
    private $setupID;
    private $manufacturer;
    private $modelName;
    private $driveType;
    private $capacity;
    private $cost;
    private $link;
    private $formFactor;
    private $interface;
    private $rpm;
    private $readSpeed;
    private $writeSpeed;
    private $wattage;

    function __construct($driveID, $setupID, $manufacturer, $modelName, $driveType, $capacity, $cost, $link, $formFactor, $interface, $rpm, $readSpeed, $writeSpeed, $wattage) {
        $this->driveID = $driveID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->modelName = $modelName;
        $this->driveType = $driveType;
        $this->capacity = $capacity;
        $this->cost = $cost;
        $this->link = $link;
        $this->formFactor = $formFactor;
        $this->interface = $interface;
        $this->rpm = $rpm;
        $this->readSpeed = $readSpeed;
        $this->writeSpeed = $writeSpeed;
        $this->wattage = $wattage;
    }

    function getDriveID() {
        return $this->driveID;
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

    function getDriveType() {
        return $this->driveType;
    }

    function getCapacity() {
        return $this->capacity;
    }

    function getCost() {
        return $this->cost;
    }

    function getLink() {
        return $this->link;
    }

    function getFormFactor() {
        return $this->formFactor;
    }

    function getInterface() {
        return $this->interface;
    }

    function getRpm() {
        return $this->rpm;
    }

    function getReadSpeed() {
        return $this->readSpeed;
    }

    function getWriteSpeed() {
        return $this->writeSpeed;
    }

    function getWattage() {
        return $this->wattage;
    }

    function setDriveID($driveID) {
        $this->driveID = $driveID;
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

    function setDriveType($driveType) {
        $this->driveType = $driveType;
    }

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setFormFactor($formFactor) {
        $this->formFactor = $formFactor;
    }

    function setInterface($interface) {
        $this->interface = $interface;
    }

    function setRpm($rpm) {
        $this->rpm = $rpm;
    }

    function setReadSpeed($readSpeed) {
        $this->readSpeed = $readSpeed;
    }

    function setWriteSpeed($writeSpeed) {
        $this->writeSpeed = $writeSpeed;
    }

    function setWattage($wattage) {
        $this->wattage = $wattage;
    }
}
