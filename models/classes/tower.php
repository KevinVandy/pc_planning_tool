<?php

// Case is a reserved word
class Tower {
    private $caseID;
    private $setupID;
    private $manufacturer;
    private $modelName;
    private $formFactor;
    private $cost;
    private $link;
    private $diminsions;
    private $material;
    private $color;
    private $expansions;
    private $ports;
    private $fanOptions;
    private $features;

    function __construct($caseID, $setupID, $manufacturer, $modelName, $formFactor, $cost, $link, $diminsions, $material, $color, $expansions, $ports, $fanOptions, $features) {
        $this->caseID = $caseID;
        $this->setupID = $setupID;
        $this->manufacturer = $manufacturer;
        $this->modelName = $modelName;
        $this->formFactor = $formFactor;
        $this->cost = $cost;
        $this->link = $link;
        $this->diminsions = $diminsions;
        $this->material = $material;
        $this->color = $color;
        $this->expansions = $expansions;
        $this->ports = $ports;
        $this->fanOptions = $fanOptions;
        $this->features = $features;
    }

    function getCaseID() {
        return $this->caseID;
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

    function getDiminsions() {
        return $this->diminsions;
    }

    function getMaterial() {
        return $this->material;
    }

    function getColor() {
        return $this->color;
    }

    function getExpansions() {
        return $this->expansions;
    }

    function getPorts() {
        return $this->ports;
    }

    function getFanOptions() {
        return $this->fanOptions;
    }

    function getFeatures() {
        return $this->features;
    }

    function setCaseID($caseID) {
        $this->caseID = $caseID;
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

    function setDiminsions($diminsions) {
        $this->diminsions = $diminsions;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setExpansions($expansions) {
        $this->expansions = $expansions;
    }

    function setPorts($ports) {
        $this->ports = $ports;
    }

    function setFanOptions($fanOptions) {
        $this->fanOptions = $fanOptions;
    }

    function setFeatures($features) {
        $this->features = $features;
    }
}
