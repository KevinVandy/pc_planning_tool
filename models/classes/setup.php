<?php

class Setup
{
    private $setupID;
    private $userName;
    private $setupName;
    private $budget;
    private $monitorsCost;
    private $PCPartsCost;
    private $OS;
    private $CPUPreference;
    private $GPUPreference;
    private $deskWidth;
    private $SCALE;

    function __construct($setupID, $userName, $setupName, $budget, $monitorsCost, $PCPartsCost, $OS, $CPUPreference, $GPUPreference, $deskWidth, $SCALE) {
        $this->setupID = $setupID;
        $this->userName = $userName;
        $this->setupName = $setupName;
        $this->budget = $budget;
        $this->monitorsCost = $monitorsCost;
        $this->PCPartsCost = $PCPartsCost;
        $this->OS = $OS;
        $this->CPUPreference = $CPUPreference;
        $this->GPUPreference = $GPUPreference;
        $this->deskWidth = $deskWidth;
        $this->SCALE = $SCALE;
    }

    function getSetupID() {
        return $this->setupID;
    }

    function getUserName() {
        return $this->userName;
    }

    function getSetupName() {
        return $this->setupName;
    }

    function getBudget() {
        return $this->budget;
    }

    function getMonitorsCost() {
        return $this->monitorsCost;
    }

    function getPCPartsCost() {
        return $this->PCPartsCost;
    }

    function getOS() {
        return $this->OS;
    }

    function getCPUPreference() {
        return $this->CPUPreference;
    }

    function getGPUPreference() {
        return $this->GPUPreference;
    }

    function getDeskWidth() {
        return $this->deskWidth;
    }

    function getSCALE() {
        return $this->SCALE;
    }

    function setSetupID($setupID) {
        $this->setupID = $setupID;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setSetupName($setupName) {
        $this->setupName = $setupName;
    }

    function setBudget($budget) {
        $this->budget = $budget;
    }

    function setMonitorsCost($monitorsCost) {
        $this->monitorsCost = $monitorsCost;
    }

    function setPCPartsCost($PCPartsCost) {
        $this->PCPartsCost = $PCPartsCost;
    }

    function setOS($OS) {
        $this->OS = $OS;
    }

    function setCPUPreference($CPUPreference) {
        $this->CPUPreference = $CPUPreference;
    }

    function setGPUPreference($GPUPreference) {
        $this->GPUPreference = $GPUPreference;
    }

    function setDeskWidth($deskWidth) {
        $this->deskWidth = $deskWidth;
    }

    function setSCALE($SCALE) {
        $this->SCALE = $SCALE;
    }

}

?>
