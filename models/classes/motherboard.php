<?php

class Motherboard {
    private $motherboardID;
    private $setupID;
    private $manufacturer;
    private $modelName;
    private $formFactor;
    private $cost;
    private $link;
    private $wattage;
    private $chipset;
    private $socket;
    private $maxRAM;
    private $RAMType;
    private $expansionSlots;
    private $storageDevices;
    private $ports;

    function __construct($motherboardID, $setupID, $manufacturer, $modelName, $formFactor, $cost, $link, $wattage, $chipset, $socket, $maxRAM, $RAMType, $expansionSlots, $storageDevices, $ports) {
        $this->motherboardID = $motherboardID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->modelName = $modelName;
        $this->formFactor = $formFactor;
        $this->cost = $cost;
        $this->link = $link;
        $this->wattage = $wattage;
        $this->chipset = $chipset;
        $this->socket = $socket;
        $this->maxRAM = $maxRAM;
        $this->RAMType = $RAMType;
        $this->expansionSlots = $expansionSlots;
        $this->storageDevices = $storageDevices;
        $this->ports = $ports;
    }

    function getMotherboardID() {
        return $this->motherboardID;
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

    function getFormFactor() {
        return $this->formFactor;
    }

    function getCost() {
        return $this->cost;
    }

    function getLink() {
        return $this->link;
    }

    function getChipset() {
        return $this->chipset;
    }

    function getSocket() {
        return $this->socket;
    }

    function getMaxRAM() {
        return $this->maxRAM;
    }

    function getRAMType() {
        return $this->RAMType;
    }

    function getWattage() {
        return $this->wattage;
    }

    function getExpansionSlots() {
        return $this->expansionSlots;
    }

    function getStorageDevices() {
        return $this->storageDevices;
    }

    function getPorts() {
        return $this->ports;
    }

    function setMotherboardID($motherboardID) {
        $this->motherboardID = $motherboardID;
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

    function setFormFactor($formFactor) {
        $this->formFactor = $formFactor;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setChipset($chipset) {
        $this->chipset = $chipset;
    }

    function setSocket($socket) {
        $this->socket = $socket;
    }

    function setMaxRAM($maxRAM) {
        $this->maxRAM = $maxRAM;
    }

    function setRAMType($RAMType) {
        $this->RAMType = $RAMType;
    }

    function setWattage($wattage) {
        $this->wattage = $wattage;
    }

    function setExpansionSlots($expansionSlots) {
        $this->expansionSlots = $expansionSlots;
    }

    function setStorageDevices($storageDevices) {
        $this->storageDevices = $storageDevices;
    }

    function setPorts($ports) {
        $this->ports = $ports;
    }


}

?>
