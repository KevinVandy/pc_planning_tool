/*global $, alert, document */
'use strict';

var numDrives = parseInt($("#numDrives").val());
var maxNumDrives = parseInt($("#maxNumDrives").val());

function getSearchEngine() {
    return $("select[name=searchEngine] option:selected").val();
}

function getCPUManufacturer() {
    return $("select[name=cpuManufacturer] option:selected").val();
}

function getCPUFamily() {
    return $("select[name=cpuFamily] option:selected").val();
}

function getCPUGeneration() {
    return parseInt($("input[name=cpuGeneration]").val());
}

function getCPUCodeName() {
    return $("input[name=cpuCodeName]").val();
}

function getCPUModelName() {
    return $("input[name=cpuModelName]").val();
}

function getGPUManufacturer() {
    return $("select[name=gpuManufacturer] option:selected").val();
}

function getGPUSeries() {
    return $("select[name=gpuSeries] option:selected").val();
}

function getGPUModelName() {
    return $("input[name=gpuModelName]").val();
}

function getMotherboardManufacturer() {
    return $("input[name=motherboardManufacturer]").val();
}

function getMotherboardModelName() {
    return $("input[name=motherboardModelName]").val();
}

function getMotherboardFormFactor() {
    return $("select[name=motherboardFormFactor] option:selected").val();
}

function getMotherboardRAMType() {
    return $("select[name=motherboardRAMType] option:selected").val();
}

function getRAMManufacturer() {
    return $("input[name=ramManufacturer]").val();
}

function getRAMModelName() {
    return $("input[name=ramModelName]").val();
}

function getRAMType() {
    return $("select[name=ramType] option:selected").val();
}

function getRAMECC() {
    return $("input[name=ramECC]:checkbox:checked").val();
}

function getRAMCapacity() {
    return parseInt($("input[name=ramCapacity]").val());
}

function getDriveManufacturer(i) {
    return $("input[name=driveManufacturer" + i + "]").val();
}

function getDriveModelName(i) {
    return $("input[name=driveModelName" + i + "]").val();
}

function getDriveType(i) {
    return $("select[name=driveType" + i + "] option:selected").val();
}

function getDriveCapacity(i) {
    return parseInt($("input[name=driveCapacity" + i + "]").val());
}

function getPSUManufacturer() {
    return $("input[name=psuManufacturer]").val();
}

function getPSUModelName() {
    return $("input[name=psuModelName]").val();
}

function getPSUMaxPower() {
    return parseInt($("input[name=psuMaxPower]").val());
}

function getCaseManufacturer() {
    return $("input[name=caseManufacturer]").val();
}

function getCaseModelName() {
    return $("input[name=caseModelName]").val();
}

function getCaseFormFactor() {
    return $("select[name=caseFormFactor] option:selected").val();
}

function searchCPU() {
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop+CPU"; //starting keywords of search

    if (getCPUManufacturer() != null && getCPUManufacturer() != "" && getCPUManufacturer() != undefined && !getCPUManufacturer().includes("Other")) searchURL += "+" + getCPUManufacturer();
    if (getCPUGeneration() != null && getCPUGeneration() != "" && getCPUGeneration() != undefined && !isNaN(getCPUGeneration()) && getCPUGeneration() != 0) {
        if (getCPUGeneration() < 100) searchURL += "+" + getCPUGeneration() + "th+generation";
        else searchURL += "+" + getCPUGeneration(); // if it's a year, just add the year and not 'th generation'
    }
    if (getCPUCodeName() != null && getCPUCodeName() != "" && getCPUCodeName() != undefined) searchURL += "+" + getCPUCodeName();
    if (getCPUFamily() != null && getCPUFamily() != "" && getCPUFamily() != undefined && !getCPUFamily().includes("Other")) searchURL += "+" + getCPUFamily();
    if (getCPUModelName() != null && getCPUModelName() != "" && getCPUModelName() != undefined) searchURL += "+" + getCPUModelName();

    $("#cpuSearch").prop("href", searchURL);
    $("#cpuSearch").prop("target", "_blank");
}

function searchGPU() {
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop+GPU"; //starting keywords of search

    if (getGPUManufacturer() != null && getGPUManufacturer() != "" && getGPUManufacturer() != undefined && !getGPUManufacturer().includes("Other")) searchURL += "+" + getGPUManufacturer();
    if (getGPUSeries() != null && getGPUSeries() != "" && getGPUSeries() != undefined && !getGPUSeries().includes("Other")) searchURL += "+" + getGPUSeries() + "+Series";
    if (getGPUModelName() != null && getGPUModelName() != "" && getGPUModelName() != undefined) searchURL += "+" + getGPUModelName();

    $("#gpuSearch").prop("href", searchURL);
    $("#gpuSearch").prop("target", "_blank");
}

function searchMotherboard() {
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop+Motherboard"; //starting keywords of search

    if (getMotherboardManufacturer() != null && getMotherboardManufacturer() != "" && getMotherboardManufacturer() != undefined && !getMotherboardManufacturer().includes("Other")) searchURL += "+" + getMotherboardManufacturer();
    if (getMotherboardModelName() != null && getMotherboardModelName() != "" && getMotherboardModelName() != undefined) searchURL += "+" + getMotherboardModelName();
    if (getMotherboardFormFactor() != null && getMotherboardFormFactor() != "" && getMotherboardFormFactor() != undefined && !getMotherboardFormFactor().includes("Other")) searchURL += "+" + getMotherboardFormFactor();
    if (getMotherboardRAMType() != null && getMotherboardRAMType() != "" && getMotherboardRAMType() != undefined) searchURL += "+" + getMotherboardRAMType();

    $("#motherboardSearch").prop("href", searchURL);
    $("#motherboardSearch").prop("target", "_blank");
}

function searchRAM() {
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop+Desktop+RAM"; //starting keywords of search

    if (getRAMManufacturer() != null && getRAMManufacturer() != "" && getRAMManufacturer() != undefined && !getRAMManufacturer().includes("Other")) searchURL += "+" + getRAMManufacturer();
    if (getRAMModelName() != null && getRAMModelName() != "" && getRAMModelName() != undefined) searchURL += "+" + getRAMModelName();
    if (getRAMType() != null && getRAMType() != "" && getRAMType() != undefined) searchURL += "+" + getRAMType();
    if (getRAMECC() != null && getRAMECC() != "" && getRAMECC() != undefined) searchURL += "+" + getRAMECC();
    if (getRAMCapacity() != null && getRAMCapacity() != "" && getRAMCapacity() != undefined && !isNaN(getRAMCapacity()) && parseFloat(getRAMCapacity()) != 0) searchURL += "+" + getRAMCapacity() + "+GBs";

    $("#ramSearch").prop("href", searchURL);
    $("#ramSearch").prop("target", "_blank");
}

function searchDrive(i) { //needs i index because there can be multiple storage devices
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop"; //starting keywords of search

    if (getDriveType(i) != null && getDriveType(i) != "") searchURL += "+" + getDriveType(i) + "+" + "drive";
    if (getDriveManufacturer(i) != null && getDriveManufacturer(i) != "" && getDriveManufacturer(i) != undefined && !getDriveManufacturer(i).includes("Other")) searchURL += "+" + getDriveManufacturer(i);
    if (getDriveModelName(i) != null && getDriveModelName(i) != "" && getDriveModelName(i) != undefined) searchURL += "+" + getDriveModelName(i);
    if (getDriveCapacity(i) != null && getDriveCapacity(i) != "" && getDriveCapacity(i) != undefined && !isNaN(getDriveCapacity(i))) searchURL += "+" + getDriveCapacity(i);

    $("#driveSearch" + i).prop("href", searchURL);
    $("#driveSearch" + i).prop("target", "_blank");
}

function searchPSU() {
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop+Power+Supply"; //starting keywords of search

    if (getPSUManufacturer() != null && getPSUManufacturer() != "" && getPSUManufacturer() != undefined && !getPSUManufacturer().includes("Other")) searchURL += "+" + getPSUManufacturer();
    if (getPSUModelName() != null && getPSUModelName() != "" && getPSUModelName() != undefined) searchURL += "+" + getPSUModelName();
    if (getPSUMaxPower() != null && getPSUMaxPower() != "" && getPSUMaxPower() != undefined) searchURL += "+" + getPSUMaxPower();

    $("#psuSearch").prop("href", searchURL);
    $("#psuSearch").prop("target", "_blank");
}

function searchCase() {
    var searchEngine = getSearchEngine(); //get the selected search engine from the footer
    var searchURL;

    //detect which search engine is selected
    if (searchEngine === "Google") searchURL = "https://www.google.com/search?q=";
    if (searchEngine === "Bing") searchURL = "https://www.bing.com/search?q=";
    if (searchEngine === "Duck Duck Go") searchURL = "https://www.duckduckgo.com/?q=";

    searchURL += "Shop+PC+Case"; //starting keywords of search

    if (getCaseManufacturer() != null && getCaseManufacturer() != "" && getCaseManufacturer() != undefined && !getCaseManufacturer().includes("Other")) searchURL += "+" + getCaseManufacturer();
    if (getCaseModelName() != null && getCaseModelName() != "" && getCaseModelName() != undefined) searchURL += "+" + getCaseModelName();
    if (getCaseFormFactor() != null && getCaseFormFactor() != "" && getCaseFormFactor() != undefined) searchURL += "+" + getCaseFormFactor();

    $("#caseSearch").prop("href", searchURL);
    $("#caseSearch").prop("target", "_blank");
}

function getCPUWattage() {
    return parseInt($("#cpuWattage").val())
}

function getGPUWattage() {
    return parseInt($("#gpuWattage").val())
}

function getMotherboardWattage() {
    return parseInt($("#motherboardWattage").val())
}

function getRAMWattage() {
    return parseInt($("#ramWattage").val())
}

function getDriveWattage(i) {
    return parseInt($("#driveWattage" + i).val())
}

function calculateTotalWattage() {
    var totalWattage = 0;
    var wattage = 0;

    wattage = getCPUWattage();
    if (isNaN(wattage)) wattage = 0;
    totalWattage += wattage;

    wattage = getGPUWattage();
    if (isNaN(wattage)) wattage = 0;
    totalWattage += wattage;

    wattage = getMotherboardWattage();
    if (isNaN(wattage)) wattage = 0;
    totalWattage += wattage;

    wattage = getRAMWattage();
    if (isNaN(wattage)) wattage = 0;
    totalWattage += wattage;

    for (var i = 1; i <= numDrives; i++) {
        wattage = getDriveWattage(i);
        if (isNaN(wattage)) wattage = 0;
        totalWattage += wattage;
    }

    return totalWattage;
}

function displayTotalWattage() {
    $("#totalWattage").html(calculateTotalWattage() + " W");
    $("#recommendedPSUPower").html(Math.ceil((calculateTotalWattage() + calculateTotalWattage() * 0.3) / 50 ) * 50 + " W"); //rounds up to the nearest 50
}

function calculateTotalPCPartsCost() {
    var totalCost = 0.00;
    var cost = 0.00;

    cost = parseFloat($("#cpuCost").val());
    if (isNaN(cost)) cost = 0;
    totalCost += cost;

    cost = parseFloat($("#gpuCost").val());
    if (isNaN(cost)) cost = 0;
    totalCost += cost;

    cost = parseFloat($("#motherboardCost").val());
    if (isNaN(cost)) cost = 0;
    totalCost += cost;

    cost = parseFloat($("#ramCost").val());
    if (isNaN(cost)) cost = 0;
    totalCost += cost;

    cost = parseFloat($("#psuCost").val());
    if (isNaN(cost)) cost = 0;
    totalCost += cost;

    cost = parseFloat($("#caseCost").val());
    if (isNaN(cost)) cost = 0;
    totalCost += cost;

    for (var i = 1; i <= numDrives; i++) {
        cost = parseFloat($("#driveCost" + i).val());
        if (isNaN(cost)) cost = 0;
        totalCost += cost;
    }
    return totalCost;
}

function displayTotalPCPartsCost() {
    $("#totalCost").html("$ " + calculateTotalPCPartsCost().toFixed(2)); //totals section
    $(".PCPartsTotalCostHidden").val(calculateTotalPCPartsCost());
}

function calculateTotalSetupCost() {
    var totalCost = 0.00;
    var monitorCost = parseFloat($(".monitorsTotalCostHidden").val());
    if (isNaN(monitorCost)) monitorCost = 0;
    totalCost += monitorCost;

    totalCost += calculateTotalPCPartsCost();

    return totalCost;
}

function displayTotalSetupCost() {
    $("#totalSetupCost").html("$ " + calculateTotalSetupCost().toFixed(2));
}

function addDrive() {
    if (numDrives >= maxNumDrives) {
        alert("This tool has a limit of " + maxNumDrives + " storage drives");
    } else {
        $("#drive" + ++numDrives).fadeIn(400);
        $("#drive" + numDrives).css("display", "inline-table");
    }
}

function removeDrive() {
    if (numDrives > 1) {
        $("#drive" + numDrives--).fadeOut(200);
    }
}

function changeNumDrives() {
    $("#numDrives").val(numDrives);
}

function updateOutput() {
    searchCPU();
    searchGPU();
    searchMotherboard();
    searchRAM();
    for (var i = 1; i <= maxNumDrives; i++) searchDrive(i);
    searchPSU();
    searchCase();

    displayTotalPCPartsCost();
    displayTotalSetupCost();
    displayTotalWattage();
}

$(document).ready(function () {

    //loads the correct number of monitors to be shown on page load. Remembers a saved setup
    for (var i = 1; i <= numDrives; i++) {
        numDrives--;
        $("#drive" + i).fadeIn(200);
        $("#drive" + i).css("display", "inline-table");
        numDrives++;
    }

    updateOutput();

    $("input").change(function () {
        updateOutput();
    });

    $("input").keyup(function () {
        updateOutput();
    });

    $("select").change(function () {
        updateOutput();
    });

    //show correct options on page load
    if ($("#cpuManufacturer").val() == "Intel") {
        $(".intelCPUFamily").show();
        $(".amdCPUFamily").hide();
        $(".qualcommCPUFamily").hide();
        $(".otherCPUFamily").hide();
    } else if ($("#cpuManufacturer").val() == "AMD") {
        $(".intelCPUFamily").hide();
        $(".amdCPUFamily").show();
        $(".otherCPUFamily").hide();
        $(".qualcommCPUFamily").hide();
    } else if ($("#cpuManufacturer").val() == "Qualcomm") {
        $(".intelCPUFamily").hide();
        $(".amdCPUFamily").hide();
        $(".qualcommCPUFamily").show();
        $(".otherCPUFamily").hide();
    } else if ($("#cpuManufacturer").val() == "Other") {
        $(".intelCPUFamily").hide();
        $(".amdCPUFamily").hide();
        $(".qualcommCPUFamily").hide();
        $(".otherCPUFamily").show();
    }

    if ($("#gpuManufacturer").val() == "NVIDIA") {
        $(".nvidiaGPUSeries").show();
        $(".amdGPUSeries").hide();
        $(".otherGPUSeries").hide();
    } else if ($("#gpuManufacturer").val() == "AMD") {
        $(".nvidiaGPUSeries").hide();
        $(".amdGPUSeries").show();
        $(".otherGPUSeries").hide();
    } else if ($("#gpuManufacturer").val() == "Qualcomm") {
        $(".nvidiaGPUSeries").hide();
        $(".amdGPUSeries").hide();
        $(".otherGPUSeries").show();
    }

    //show correct options on change
    $("#cpuManufacturer").change(function () {
        if ($("#cpuManufacturer").val() == "Intel") {
            $(".intelCPUFamily").show();
            $(".amdCPUFamily").hide();
            $(".qualcommCPUFamily").hide();
            $(".otherCPUFamily").hide();
        } else if ($("#cpuManufacturer").val() == "AMD") {
            $(".intelCPUFamily").hide();
            $(".amdCPUFamily").show();
            $(".otherCPUFamily").hide();
            $(".qualcommCPUFamily").hide();
        } else if ($("#cpuManufacturer").val() == "Qualcomm") {
            $(".intelCPUFamily").hide();
            $(".amdCPUFamily").hide();
            $(".qualcommCPUFamily").show();
            $(".otherCPUFamily").hide();
        } else if ($("#cpuManufacturer").val() == "Other") {
            $(".intelCPUFamily").hide();
            $(".amdCPUFamily").hide();
            $(".qualcommCPUFamily").hide();
            $(".otherCPUFamily").show();
        }
    });

    $("#gpuManufacturer").change(function () {
        if ($("#gpuManufacturer").val() == "NVIDIA") {
            $(".nvidiaGPUSeries").show();
            $(".amdGPUSeries").hide();
            $(".otherGPUSeries").hide();
        } else if ($("#gpuManufacturer").val() == "AMD") {
            $(".nvidiaGPUSeries").hide();
            $(".amdGPUSeries").show();
            $(".otherGPUSeries").hide();
        } else if ($("#gpuManufacturer").val() == "Other") {
            $(".nvidiaGPUSeries").hide();
            $(".amdGPUSeries").hide();
            $(".otherGPUSeries").show();
        }
    });

    $(".toggle").click(function () {
        $(".extraSpecs").toggle(500);
        if ($(".toggle").html() === "-") {
            $(".toggle").html("+");
        } else {
            $(".toggle").html("-");
        }
    });

    //hides the error confirm messages after some time
    setTimeout(function () {
        //$(".errorMsg").hide(10);
        //$(".confirmMsg").hide(10);
    }, 4000);

    var prevOffset, curOffset;

    $(".analysis").draggable({
        snap: true
    });
    $(".part").draggable({
        snap: false,
        cancel: "form",
        cursor: "grab"

    });

    $("#addDrive").click(function () {
        addDrive();
        changeNumDrives();
    });
    $("#removeDrive").click(function () {
        removeDrive();
        changeNumDrives();
    });

});
