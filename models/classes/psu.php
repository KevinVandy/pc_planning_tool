<?php

class PSU {
    private $PSUID;
    private $setupID;
    private $manufacturer;
    private $modelName;
    private $maxPower;
    private $cost;
    private $link;
    private $certification;
    private $outputs;
    private $connectors;

    function __construct($PSUID, $setupID, $manufacturer, $modelName, $maxPower, $cost, $link, $certification, $outputs, $connectors) {
        $this->PSUID = $PSUID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->modelName = $modelName;
        $this->maxPower = $maxPower;
        $this->cost = $cost;
        $this->link = $link;
        $this->certification = $certification;
        $this->outputs = $outputs;
        $this->connectors = $connectors;
    }

    function getPSUID() {
        return $this->PSUID;
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

    function getMaxPower() {
        return $this->maxPower;
    }

    function getCost() {
        return $this->cost;
    }

    function getLink() {
        return $this->link;
    }

    function getCertification() {
        return $this->certification;
    }

    function getOutputs() {
        return $this->outputs;
    }

    function getConnectors() {
        return $this->connectors;
    }

    function setPSUID($PSUID) {
        $this->PSUID = $PSUID;
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

    function setMaxPower($maxPower) {
        $this->maxPower = $maxPower;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setCertification($certification) {
        $this->certification = $certification;
    }

    function setOutputs($outputs) {
        $this->outputs = $outputs;
    }

    function setConnectors($connectors) {
        $this->connectors = $connectors;
    }
}
