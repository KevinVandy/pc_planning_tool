<?php
    $title = 'Configure PC Parts';
    include("views/header.php");
?>
<aside class="analysis">
    <h2>Analysis</h2>
    <table>
        <caption>Budget Stats</caption>
        <tr>
            <th> Budget: </th>
            <td id="budget">$
                <?php if(isset($setup)) echo htmlspecialchars($setup->getBudget()); ?>
            </td>
        </tr>
        <tr>
            <th> Total Cost: </th>
            <td id="totalSetupCost">$
                <?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost() + $setup->getPCPartsCost()); ?>
            </td>
        </tr>
    </table>
    <table>
        <caption>PC Stats</caption>
        <tr>
            <th>TotalWattage: </th>
            <td id="totalWattage"></td>
        </tr>
        <tr>
            <th>Recommended<br>PSU Power: </th>
            <td id="recommendedPSUPower"></td>
        </tr>
    </table>
</aside>
<main class="mainLeft">
    <p class="errorMsg">
        <?php if(isset($errorMsgs['cpu'])) echo htmlspecialchars($errorMsgs['cpu']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['gpu'])) echo htmlspecialchars($errorMsgs['gpu']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['motherboard'])) echo htmlspecialchars($errorMsgs['motherboard']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['ram'])) echo htmlspecialchars($errorMsgs['ram']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['drive'])) echo htmlspecialchars($errorMsgs['drive']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['psu'])) echo htmlspecialchars($errorMsgs['psu']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['case'])) echo htmlspecialchars($errorMsgs['case']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['cpu'])) echo htmlspecialchars($confirmMsgs['cpu']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['gpu'])) echo htmlspecialchars($confirmMsgs['gpu']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['motherboard'])) echo htmlspecialchars($confirmMsgs['motherboard']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['ram'])) echo htmlspecialchars($confirmMsgs['ram']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['drive'])) echo htmlspecialchars($confirmMsgs['drive']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['psu'])) echo htmlspecialchars($confirmMsgs['psu']); ?>
    </p>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['case'])) echo htmlspecialchars($confirmMsgs['case']); ?>
    </p>
    <p class="hint">Save each section before filling out the next one</p>
    <section class="part">
        <h2>
            CPU
            <tooltip>?
                <tooltiptext>
                    The CPU, or Central Processing Unit, is the most important part of a PC, as it does all of the calculations to make your PC run.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="saveCPU">
            <input type="hidden" name="cpuID" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getCPUID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <select name="cpuManufacturer" id="cpuManufacturer">
                            <option value=""></option>
                            <option value="Intel" <?php if(isset($cpu) && $cpu->getManufacturer() === 'Intel') echo htmlspecialchars("selected"); else if(isset($setup) && $setup->getCPUPreference() === 'Intel') echo htmlspecialchars('selected'); ?>>Intel</option>
                            <option value="AMD" <?php if(isset($cpu) && $cpu->getManufacturer() === 'AMD') echo htmlspecialchars("selected"); else if(isset($setup) && $setup->getCPUPreference() === 'AMD') echo htmlspecialchars('selected'); ?>>AMD</option>
                            <option value="Qualcomm" <?php if(isset($cpu) && $cpu->getManufacturer() === 'Qualcomm') echo htmlspecialchars("selected"); ?>>Qualcomm</option>
                            <option value="Other" <?php if(isset($cpu) && $cpu->getManufacturer() === 'Other') echo htmlspecialchars("selected"); ?>>Other</option>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The Company that makes the CPU. Most Desktop CPUs are made by Intel or AMD, though Qualcomm is just starting to make some Laptop and possible Desktop CPUs.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Code Name: </th>
                    <td>
                        <input type="text" name="cpuCodeName" list="cpuCodeNames" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getCodeName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Codename is associated with The Generation (or Year) and the Family of the CPU. For example, Coffee Lake CPUs are 14nm 8th generation Intel CPUs
                            </tooltiptext>
                        </tooltip>
                        <datalist id="cpuCodeNames">
                            <option value="Ice Lake">
                            <option value="Cooper Lake">
                            <option value="Cascade Lake">
                            <option value="Amber Lake">
                            <option value="Whiskey Lake">
                            <option value="Cannon Lake">
                            <option value="Coffee Lake">
                            <option value="Kaby Lake">
                            <option value="Goldmont">
                            <option value="Goldmont Plus">
                            <option value="Skylake">
                            <option value="Airmont">
                            <option value="Broadwell">
                            <option value="Haswell">
                            <option value="Silvermont">
                            <option value="Ivy Bridge">
                            <option value="Sandy Bridge">
                            <option value="Saltwell">
                            <option value="Zen">
                            <option value="Jaguar">
                            <option value="Bulldozer">
                            <option value="Athlon">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['codename'])) echo htmlspecialchars($errorMsgs['codename']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Family: </th>
                    <td>
                        <select name="cpuFamily">
                            <option></option>
                            <optgroup label="Intel (x86/x64)">
                                <option class="intelCPUFamily" value="Pentium" <?php if(isset($cpu) && $cpu->getFamily() === 'Pentium') echo htmlspecialchars("selected"); ?>>Pentium</option>
                                <option class="intelCPUFamily" value="Celeron" <?php if(isset($cpu) && $cpu->getFamily() === 'Celeron') echo htmlspecialchars("selected"); ?>>Celeron</option>
                                <option class="intelCPUFamily" value="Atom" <?php if(isset($cpu) && $cpu->getFamily() === 'Atom') echo htmlspecialchars("selected"); ?>>Atom</option>
                                <option class="intelCPUFamily" value="Core i3" <?php if(isset($cpu) && $cpu->getFamily() === 'Core i3') echo htmlspecialchars("selected"); ?>>Core i3</option>
                                <option class="intelCPUFamily" value="Core i5" <?php if(isset($cpu) && $cpu->getFamily() === 'Core i5') echo htmlspecialchars("selected"); ?>>Core i5</option>
                                <option class="intelCPUFamily" value="Core i7" <?php if(isset($cpu) && $cpu->getFamily() === 'Core i7') echo htmlspecialchars("selected"); ?>>Core i7</option>
                                <option class="intelCPUFamily" value="Core i9" <?php if(isset($cpu) && $cpu->getFamily() === 'Core i9') echo htmlspecialchars("selected"); ?>>Core i9</option>
                                <option class="intelCPUFamily" value="Xeon" <?php if(isset($cpu) && $cpu->getFamily() === 'Xeon') echo htmlspecialchars("selected"); ?>>Xeon</option>
                                <option class="intelCPUFamily" value="Other Intel Family" <?php if(isset($cpu) && $cpu->getFamily() === 'Other Intel Family') echo htmlspecialchars("selected"); ?>>Other Intel Family</option>
                            </optgroup>
                            <optgroup label="AMD (x86/x64)">
                                <!-- TODO Learn more about AMD CPUs -->
                                <option class="amdCPUFamily" value="Ryzen" <?php if(isset($cpu) && $cpu->getFamily() === 'Ryzen') echo htmlspecialchars("selected"); ?>>Ryzen (Zen arch.)</option>
                                <option class="amdCPUFamily" value="Puma" <?php if(isset($cpu) && $cpu->getFamily() === 'Puma') echo htmlspecialchars("selected"); ?>>Puma (Jaguar arch.)</option>
                                <option class="amdCPUFamily" value="Jaguar" <?php if(isset($cpu) && $cpu->getFamily() === 'Jaguar') echo htmlspecialchars("selected"); ?>>Jaguar (Jaguar arch.)</option>
                                <option class="amdCPUFamily" value="Excavator" <?php if(isset($cpu) && $cpu->getFamily() === 'Excavator') echo htmlspecialchars("selected"); ?>>Excavator (Bulldozer arch.)</option>
                                <option class="amdCPUFamily" value="Steamroller" <?php if(isset($cpu) && $cpu->getFamily() === 'Steamroller') echo htmlspecialchars("selected"); ?>>Steamroller (Bulldozer arch.)</option>
                                <option class="amdCPUFamily" value="Piledriver" <?php if(isset($cpu) && $cpu->getFamily() === 'Piledriver') echo htmlspecialchars("selected"); ?>>Piledriver (Bulldozer arch.)</option>
                                <option class="amdCPUFamily" value="Bulldozer" <?php if(isset($cpu) && $cpu->getFamily() === 'Bulldozer') echo htmlspecialchars("selected"); ?>>Bulldozer (Bulldozer arch.)</option>
                                <option class="amdCPUFamily" value="Bobcat" <?php if(isset($cpu) && $cpu->getFamily() === 'Bobcat') echo htmlspecialchars("selected"); ?>>Bobcat (Bobcat arch.)</option>
                                <option class="amdCPUFamily" value="Other AMD Family" <?php if(isset($cpu) && $cpu->getFamily() === 'Other AMD Family') echo htmlspecialchars("selected"); ?>>Other AMD Family</option>
                            </optgroup>
                            <optgroup label="Qualcomm (ARM)">
                                <option class="qualcommCPUFamily" value="Other Qualcomm Family" <?php if(isset($cpu) && $cpu->getFamily() === 'Other Qualcomm Family') echo htmlspecialchars("selected"); ?>>Other Qualcomm Family</option>
                            </optgroup>
                            <optgroup label="Other">
                                <option class="otherCPUFamily" value="Other Family" <?php if(isset($cpu) && $cpu->getFamily() === 'Other Family') echo htmlspecialchars("selected"); ?>>Other Family</option>
                            </optgroup>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The name of a CPU series from a manufacturer. Different from Code Names because the family name lasts for multiple generations of CPUs.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['family'])) echo htmlspecialchars($errorMsgs['family']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Model Name: </th>
                    <td>
                        <input type="text" name="cpuModelName" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Model Number of the particular CPU.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="50000.00" step="0.01" name="cpuCost" id="cpuCost" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of your CPU. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="cpuLink" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a CPU if you want to save it for later. Click the 'Your Link to CPU' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($cpu) && $cpu->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php echo htmlspecialchars($cpu->getLink()); ?>" target="_blank">Your Link To CPU</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This CPU</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="cpuSearch">Search for This CPU</a></td>
                </tr>
            </table>
            <h3></h3>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>Number of Cores: </th>
                        <td>
                            <input type="number" min="0" max="256" name="cpuNumberCores" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getNumberCores()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    A CPU can have 1 or many 'Cores' to help share the computational workload. More Cores generally results in a more powerful processor.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['numbercores'])) echo htmlspecialchars($errorMsgs['numbercores']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Number of Threads: </th>
                        <td>
                            <input type="number" min="0" max="512" name="cpuNumberThreads" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getNumberThreads()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    Most CPU Cores support Threading, which helps the CPU to multi-task better. The Number of Threads is usually exactly double the amount of Cores.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['numbertheads'])) echo htmlspecialchars($errorMsgs['numberthreads']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Clock Speed: </th>
                        <td>
                            <input type="number" min="0" max="99.9" step="0.1" name="cpuClockSpeed" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getClockSpeed()); ?>">GHz
                            <tooltip>?
                                <tooltiptext>
                                    The fequency of the CPU. The higher the clock speed, the more calculations per second can be done. A high clock speed can indicate a powerful CPU, but it is not the only factor.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['clockspeed'])) echo htmlspecialchars($errorMsgs['clockspeed']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Overclock: </th>
                        <td>
                            <input type="checkbox" name="cpuOverclock" value="1" <?php if(isset($cpu) && $cpu->getOverclock() == TRUE) echo htmlspecialchars("checked") ?>>
                            <tooltip>?
                                <tooltiptext>
                                    Some high-end CPUs support overclocking. This means that you can manually make the Clock Speed higher in the BIOS settings to make your CPU more powerful. However, there are some risks including overheating, frying the chip, and a reduced CPU lifespan.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td class="warningMsg">
                            <?php if(isset($warningMsgs['overclock'])) echo htmlspecialchars($warningMsgs['overclock']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Wattage: </th>
                        <td>
                            <input type="number" min="0" max="50000" step="5" name="cpuWattage" id="cpuWattage" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getWattage()); ?>">W
                            <tooltip>?
                                <tooltiptext>
                                    The Power consumption of the CPU. Make sure that you put the max wattage value and not the idle wattage value here. Also, if you overclock, the wattage will be higher than advertised. The average CPU wattage is about 90 Watts.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['wattage'])) echo htmlspecialchars($errorMsgs['wattage']); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save CPU">
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE your CPU information?')">
            <input type="hidden" name="action" value="deleteCPU">
            <input type="hidden" name="deleteCPUID" value="<?php if(isset($cpu)) echo htmlspecialchars($cpu->getCPUID()); ?>">
            <input type="submit" value="Delete CPU">
        </form>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['cpu'])) echo htmlspecialchars($confirmMsgs['cpu']); ?>
        </p>
    </section>
    <section class="part">
        <h2>
            GPU
            <tooltip>?
                <tooltiptext>
                    The GPU, or Graphics Processing Unit, usually comes in a 'Graphics Card' and is responsible for creating the images you see on your monitor.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="saveGPU">
            <input type="hidden" name="gpuID" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getGPUID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <select name="gpuManufacturer" id="gpuManufacturer">
                            <option value=""></option>
                            <option value="NVIDIA" <?php if(isset($gpu) && $gpu->getManufacturer() === 'NVIDIA') echo htmlspecialchars('selected'); else if(isset($setup) && $setup->getGPUPreference() === 'NVIDIA') echo htmlspecialchars('selected'); ?>>NVIDIA</option>
                            <option value="AMD" <?php if(isset($gpu) && $gpu->getManufacturer() === 'AMD') echo htmlspecialchars('selected'); else if(isset($setup) && $setup->getGPUPreference() === 'AMD') echo htmlspecialchars('selected'); ?>>AMD</option>
                            <option value="Other" <?php if(isset($gpu) && $gpu->getManufacturer() === 'Other') echo htmlspecialchars('selected'); ?>>Other</option>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The company that makes the GPU. Notice that this may not be the same manufacturer that makes the Graphics Card that has the GPU in it. This is just for the 'GPU' manufacturer, which is usally NVIDIA or AMD.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Code Name: </th>
                    <td>
                        <input type="text" name="gpuCodeName" list="gpuCodeNames" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getCodeName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Name associated with the architecture and genereration associated with the Card.
                            </tooltiptext>
                        </tooltip>
                        <datalist id="gpuCodeNames">
                            <option value="Turing">
                            <option value="Pascal">
                            <option value="Maxwell">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Series</th>
                    <td>
                        <select name="gpuSeries">
                            <option></option>
                            <optgroup label="NVIDIA">
                                <option class="nvidiaGPUSeries" value="GeForce RTX 20" <?php if(isset($gpu) && $gpu->getSeries() === 'GeForce RTX 20') echo htmlspecialchars('selected'); ?>>GeForce RTX 20 (2018)</option>
                                <option class="nvidiaGPUSeries" value="GeForce GTX 10" <?php if(isset($gpu) && $gpu->getSeries() === 'GeForce GTX 10') echo htmlspecialchars('selected'); ?>>GeForce GTX 10 (2016)</option>
                                <option class="nvidiaGPUSeries" value="GeForce GTX 900" <?php if(isset($gpu) && $gpu->getSeries() === 'GeForce GTX 900') echo htmlspecialchars('selected'); ?>>GeForce GTX 900 (2015)</option>
                                <option class="nvidiaGPUSeries" value="GeForce GTX 700" <?php if(isset($gpu) && $gpu->getSeries() === 'GeForce GTX 700') echo htmlspecialchars('selected'); ?>>GeForce GTX 700 (2014)</option>
                                <option class="nvidiaGPUSeries" value="GeForce GTX 600" <?php if(isset($gpu) && $gpu->getSeries() === 'GeForce GTX 600') echo htmlspecialchars('selected'); ?>>GeForce GTX 600 (2012)</option>
                                <option class="nvidiaGPUSeries" value="Volta" <?php if(isset($gpu) && $gpu->getSeries() === 'Volta') echo htmlspecialchars('selected'); ?>>Volta (Titan)</option>
                                <option class="nvidiaGPUSeries" value="Other NVIDIA Family" <?php if(isset($gpu) && $gpu->getSeries() === 'Other NVIDIA Family') echo htmlspecialchars('selected'); ?>>Other NVIDIA Series</option>
                            </optgroup>
                            <optgroup label="AMD">
                                <!-- TODO Learn more about AMD GPUs -->
                                <option class="amdGPUSeries" value="Radeon RX Vega" <?php if(isset($gpu) && $gpu->getSeries() === 'Radeon RX Vega') echo htmlspecialchars('selected'); ?>>Radeon RX Vega (2017)</option>
                                <option class="amdGPUSeries" value="Radeon RX 500" <?php if(isset($gpu) && $gpu->getSeries() === 'Radeon RX 500') echo htmlspecialchars('selected'); ?>>Radeon RX 500 (2017)</option>
                                <option class="amdGPUSeries" value="Radeon RX 400" <?php if(isset($gpu) && $gpu->getSeries() === 'Radeon RX 400') echo htmlspecialchars('selected'); ?>>Radeon RX 400 (2016)</option>
                                <option class="amdGPUSeries" value="Radeon R5/R7/R9" <?php if(isset($gpu) && $gpu->getSeries() === 'Radeon R5/R7/R9') echo htmlspecialchars('selected'); ?>>Radeon R5/R7/R9 300 (2015)</option>
                                <option class="amdGPUSeries" value="Radeon R5/R7/R9" <?php if(isset($gpu) && $gpu->getSeries() === 'Radeon R5/R7/R9') echo htmlspecialchars('selected'); ?>>Radeon R5/R7/R9 200 (2014)</option>
                                <option class="amdGPUSeries" value="Radeon HD 8000" <?php if(isset($gpu) && $gpu->getSeries() === 'Radeon HD 8000') echo htmlspecialchars('selected'); ?>>Radeon HD 8000 (2013)</option>
                                <option class="amdGPUSeries" value="Other AMD Series" <?php if(isset($gpu) && $gpu->getSeries() === 'Other AMD Series') echo htmlspecialchars('selected'); ?>>Other AMD Series</option>
                            </optgroup>
                            <optgroup label="Other">
                                <option class="otherGPUSeries" value="Other Series" <?php if(isset($gpu) && $gpu->getSeries() === 'Other Series') echo htmlspecialchars('selected'); ?>>Other Series</option>
                            </optgroup>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                Related to the generation or year that the GPU came out. For example, the GeForce RTX 20 Series came out in 2018 from NVIDIA.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['series'])) echo htmlspecialchars($errorMsgs['series']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Model Name: </th>
                    <td>
                        <input type="text" name="gpuModelName" list="gpuModelNames" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Number for this particluar Graphics Card.
                            </tooltiptext>
                        </tooltip>
                        <datalist id="gpuModelNames">
                            <option value="RTX 2080">
                            <option value="RTX 2070">
                            <option value="RTX 2060">
                            <option value="RTX 2050">
                            <option value="GTX 1080ti">
                            <option value="GTX 1080">
                            <option value="GTX 1070">
                            <option value="GTX 1060">
                            <option value="GTX 1050">
                            <option value="GTX 980ti">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="50000.00" step="0.01" name="gpuCost" id="gpuCost" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of this Graphics Card. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="gpuLink" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a GPU if you want to save it for later. Click the 'Your Link to GPU' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($gpu) && $gpu->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php echo htmlspecialchars($gpu->getLink()); ?>" target="_blank">Your Link To GPU</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This GPU</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="gpuSearch">Search for This GPU</a></td>
                </tr>
            </table>
            <h3></h3>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>VRAM </th>
                        <td>
                            <input type="number" min="0" max="64" name="gpuVRAM" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getVRAM()); ?>">GBs
                            <tooltip>?
                                <tooltiptext>
                                    The amount of Video RAM that is built onto the chip. Higher is better.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['vram'])) echo htmlspecialchars($errorMsgs['vram']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Clock Speed: </th>
                        <td>
                            <input type="number" min="0" max="10000" step="1" name="gpuClockSpeed" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getClockSpeed()); ?>">MHz
                            <tooltip>?
                                <tooltiptext>
                                    The fequency of the GPU. The higher the clock speed, the more calculations per second can be done. A high clock speed can indicate a powerful GPU, but it is not the only factor.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Overclock: </th>
                        <td>
                            <input type="checkbox" name="gpuOverclock" value="1" <?php if(isset($gpu) && $gpu->getOverclock() == TRUE) echo htmlspecialchars("checked") ?>>
                            <tooltip>?
                                <tooltiptext>
                                    Some high-end GPUs support overclocking. This means that you can manually make the Clock Speed higher to make your Graphics Card more powerful. However, there are some risks including overheating, frying the chip, and a reduced GPU lifespan.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td class="warningMsg">
                            <?php if(isset($warningMsgs['overclock'])) echo htmlspecialchars($warningMsgs['overclock']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['clockspeed'])) echo htmlspecialchars($errorMsgs['clockspeed']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Wattage: </th>
                        <td>
                            <input type="number" min="0" max="500" step="0.1" name="gpuWattage" id="gpuWattage" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getWattage()); ?>">W
                            <tooltip>?
                                <tooltiptext>
                                    The power consumption of the Graphics Card. Make sure that you put the max wattage value and not the idle wattage value here. Also, if you overclock, the wattage will be higher than advertised. A high end GPU can draw over 300 watts.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['wattage'])) echo htmlspecialchars($errorMsgs['wattage']); ?>
                        </td>
                    </tr>
                </table>
                <h4>
                    Ports
                    <tooltip>?
                        <tooltiptext>
                            The output ports that are available on the graphics card. Make sure that your monitor(s) has at least 1 of the same ports as your graphics card.
                        </tooltiptext>
                    </tooltip>
                </h4>
                <table>
                    <tr>
                        <td>
                            <input type="checkbox" name="gpuVGA" value="1" <?php if(isset($gpu) && $gpu->getVGA() == 1) echo htmlspecialchars('checked'); ?>><label>VGA</label>
                            <input type="checkbox" name="gpuDVI" value="1" <?php if(isset($gpu) && $gpu->getDVI() == 1) echo htmlspecialchars('checked'); ?>><label>DVI</label>
                            <input type="checkbox" name="gpuHDMI" value="1" <?php if(isset($gpu) && $gpu->getHDMI() == 1) echo htmlspecialchars('checked'); ?>><label>HDMI</label>
                            <input type="checkbox" name="gpuDisplayPort" value="1" <?php if(isset($gpu) && $gpu->getDisplayPort() == 1) echo htmlspecialchars('checked'); ?>><label>Display Port</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['ports'])) echo htmlspecialchars($errorMsgs['ports']); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save GPU">
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE your Graphics Card information?')">
            <input type="hidden" name="action" value="deleteGPU">
            <input type="hidden" name="deleteGPUID" value="<?php if(isset($gpu)) echo htmlspecialchars($gpu->getGPUID()) ?>">
            <input type="submit" value="Delete GPU">
        </form>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['gpu'])) echo htmlspecialchars($confirmMsgs['gpu']); ?>
        </p>
    </section>
    <section class="part">
        <h2>
            Motherboard
            <tooltip>?
                <tooltiptext>
                    The motherboard connects all of your PC parts together.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="saveMotherboard">
            <input type="hidden" name="motherboardID" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getMotherboardID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <input type="text" name="motherboardManufacturer" list="motherboardManufacturers" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getManufacturer()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Company that makes the Motherboard.
                            </tooltiptext>
                        </tooltip>
                        <datalist id="motherboardManufacturers">
                            <option value="ASRock">
                            <option value="AMD">
                            <option value="ASUS">
                            <option value="Gigabyte">
                            <option value="Intel">
                            <option value="MSI">
                            <option value="Biostar">
                            <option value="Acer">
                            <option value="EVGA">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Model Name: </th>
                    <td>
                        <input type="text" name="motherboardModelName" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Model Number of the particular Motherboard.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Form Factor: </th>
                    <td>
                        <select name="motherboardFormFactor">
                            <option></option>
                            <option value="ATX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'ATX') echo htmlspecialchars('selected'); ?>>ATX</option>
                            <option value="Mini ATX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'Mini ATX') echo htmlspecialchars('selected'); ?>>Mini ATX</option>
                            <option value="Mini ITX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'Mini ITX') echo htmlspecialchars('selected'); ?>>Mini ITX</option>
                            <option value="Micro ATX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'Micro ATX') echo htmlspecialchars('selected'); ?>>Micro ATX</option>
                            <option value="Flex ATX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'Flex ATX') echo htmlspecialchars('selected'); ?>>Flex ATX</option>
                            <option value="LPX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'LPX') echo htmlspecialchars('selected'); ?>>LPX</option>
                            <option value="BTX" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'BTX') echo htmlspecialchars('selected'); ?>>BTX</option>
                            <option value="Other" <?php if(isset($motherboard) && $motherboard->getFormFactor() === 'Other') echo htmlspecialchars('selected'); ?>>Other</option>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The size and diminsion standard of the motherboard. Most motherboards for a full size PC are ATX. Make sure that your motherboard will fit in your case/tower.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['formfactor'])) echo htmlspecialchars($errorMsgs['formfactor']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="100000.00" step="0.01" name="motherboardCost" id="motherboardCost" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of your Motherboard. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="motherboardLink" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a Motherboard if you want to save it for later. Click the 'Your Link to Motherboard' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($motherboard) && $motherboard->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getLink()); ?>" target="_blank">Your Link To Motherboard</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This Motherboard</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="motherboardSearch">Search for This Motherboard</a></td>
                </tr>
            </table>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>Wattage: </th>
                        <td>
                            <input type="number" min="0" max="1000" step="0.1" name="motherboardWattage" id="motherboardWattage" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getWattage()); ?>">W
                            <tooltip>?
                                <tooltiptext>
                                    The power consumption of the motherboard. The average motherboard draws about 50 watts.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['wattage'])) echo htmlspecialchars($errorMsgs['wattage']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Chipset: </th>
                        <td>
                            <input type="text" name="motherboardChipset" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getChipset()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    The part of the motherboard that connects the cpu and the rest of the parts on the motherboard. Make sure that your CPU is compatible with the chipset or the motherboard as a whole.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['chipset'])) echo htmlspecialchars($errorMsgs['chipset']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>CPU Socket: </th>
                        <td>
                            <input type="text" name="motherboardSocket" list="sockets" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getSocket()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    The Slot for the CPU on the motherboard. Make sure that your CPU has the exact same Socket as your motherboard does! Examples: LGA 1151, LGA 2066, AM1, TR4...
                                </tooltiptext>
                            </tooltip>
                            <datalist id="sockets">
                                <option value="LGA 2066/Socket R4">
                                <option value="Socket TR4">
                                <option value="Socket AM4">
                                <option value="LGA 1151v2">
                                <option value="LGA 1151/Socket H4">
                                <option value="Socket AM1">
                                <option value="Socket FM2+">
                                <option value="Socket FM2">
                                <option value="Socket AM3+">
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['socket'])) echo htmlspecialchars($errorMsgs['socket']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Max RAM: </th>
                        <td>
                            <input type="number" min="0" max="1024" step="1" name="motherboardMaxRAM" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getMaxRAM()); ?>">GBs
                            <tooltip>?
                                <tooltiptext>
                                    A motherboard will have a max amount of memory that it can support. Make sure that the motherboard you get has enough room for the amount of RAM you will want now, and maybe in the future.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['capacity'])) echo htmlspecialchars($errorMsgs['capacity']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>RAM Type: </th>
                        <td>
                            <select name="motherboardRAMType">
                                <option></option>
                                <option value="DDR5" <?php if(isset($motherboard) && $motherboard->getRAMType() === 'DDR5') echo htmlspecialchars('selected'); ?>>DDR5</option>
                                <option value="DDR4" <?php if(isset($motherboard) && $motherboard->getRAMType() === 'DDR4') echo htmlspecialchars('selected'); ?>>DDR4</option>
                                <option value="DDR3" <?php if(isset($motherboard) && $motherboard->getRAMType() === 'DDR3') echo htmlspecialchars('selected'); ?>>DDR3</option>
                                <option value="DDR2" <?php if(isset($motherboard) && $motherboard->getRAMType() === 'DDR2') echo htmlspecialchars('selected'); ?>>DDR2</option>
                            </select>
                            <tooltip>?
                                <tooltiptext>
                                    The type of RAM that is supported. As of 2019, DDR4 is the most current technology for RAM, though DDR5 should come sometime around 2020.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['ramtype'])) echo htmlspecialchars($errorMsgs['ramtype']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Expansion<br>Slots: </th>
                        <td>
                            <textarea name="motherboardExpansionSlots" rows="6" cols="25" placeholder="Examples:&#10;PCI Express 3.0 x16&#10;PCI Express x1"><?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getExpansionSlots()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    The available expansion slots on the motherboard for various expansion cards, drives, etc.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Storage<br>Devices: </th>
                        <td>
                            <textarea name="motherboardStorageDevices" rows="6" cols="25" placeholder="Examples:&#10;SATA 6Gb/s&#10;M.2"><?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getStorageDevices()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    Some more available slots that are specifically for storage devices.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Ports: </th>
                        <td>
                            <textarea name="motherboardPorts" rows="6" cols="25" placeholder="Examples:&#10;4 USB 3.0&#10;PS/2"><?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getPorts()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    Any other ports on the motherboard, usually on the rear panel or the internal I/O.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save Motherboard">
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE your Motherboard information?')">
            <input type="hidden" name="action" value="deleteMotherboard">
            <input type="hidden" name="deleteMotherboardID" value="<?php if(isset($motherboard)) echo htmlspecialchars($motherboard->getMotherboardID()) ?>">
            <input type="submit" value="Delete Motherboard">
        </form>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['motherboard'])) echo htmlspecialchars($confirmMsgs['motherboard']); ?>
        </p>
    </section>
    <section class="part">
        <h2>
            RAM
            <tooltip>?
                <tooltiptext>
                    Also known as 'memory'. Your operating system and programs are loaded into memory when your PC turns on.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="saveRAM">
            <input type="hidden" name="ramID" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getRAMID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <input type="text" name="ramManufacturer" list="ramManufacturers" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getManufacturer()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The company that makes the RAM.
                            </tooltiptext>
                        </tooltip>
                        <datalist id="ramManufacturers">
                            <option value="ADATA">
                            <option value="Apacer">
                            <option value="ASUS">
                            <option value="Axiom">
                            <option value="Buffalo">
                            <option value="Chaintech">
                            <option value="Corsair">
                            <option value="Crucial">
                            <option value="Dataram">
                            <option value="Fujitsu">
                            <option value="G.Skill">
                            <option value="GeIL">
                            <option value="HyperX">
                            <option value="IBM">
                            <option value="Infineon">
                            <option value="Kingston">
                            <option value="Lenovo">
                            <option value="Micron">
                            <option value="Mushkin">
                            <option value="Nanya">
                            <option value="PNY">
                            <option value="Rambus">
                            <option value="Ramtron">
                            <option value="Rendition">
                            <option value="Renesas">
                            <option value="Samsung">
                            <option value="Sandisk">
                            <option value="Sea Sonic">
                            <option value="SK Hynix">
                            <option value="Silicon Power">
                            <option value="Super Talent">
                            <option value="Toshiba">
                            <option value="Transcent">
                            <option value="Wilk Elektronik">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Kit/Model Name: </th>
                    <td>
                        <input type="text" name="ramModelName" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Number for this RAM kit.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>RAM Type: </th>
                    <td>
                        <select name="ramType">
                            <option></option>
                            <option value="DDR5" <?php if(isset($ram) && $ram->getRAMType() === 'DDR5') echo htmlspecialchars('selected'); ?>>DDR5 SDRAM TBA Pin</option>
                            <option value="DDR4" <?php if(isset($ram) && $ram->getRAMType() === 'DDR4') echo htmlspecialchars('selected'); ?>>DDR4 SDRAM 288 Pin</option>
                            <option value="DDR3" <?php if(isset($ram) && $ram->getRAMType() === 'DDR3') echo htmlspecialchars('selected'); ?>>DDR3 SDRAM 240 Pin</option>
                            <option value="DDR2" <?php if(isset($ram) && $ram->getRAMType() === 'DDR2') echo htmlspecialchars('selected'); ?>>DDR2 SDRAM 240 Pin</option>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The type of RAM. As of 2019, DDR4 is the most current technology for RAM, though DDR5 should come sometime around 2020. Make sure that you get RAM that is compatible with your motherboard.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['ramtype'])) echo htmlspecialchars($errorMsgs['ramtype']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="100000.00" step="0.01" name="ramCost" id="ramCost" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of your RAM. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="ramLink" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a RAM kit if you want to save it for later. Click the 'Your Link to RAM' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($ram) && $ram->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php if(isset($ram)) echo htmlspecialchars($ram->getLink()); ?>" target="_blank">Your Link To RAM</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This RAM kit</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="ramSearch">Search for This RAM</a></td>
                </tr>
            </table>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>ECC: </th>
                        <td>
                            <input type="checkbox" name="ramECC" value="ECC" <?php if(isset($ram) && $ram->getRAMType() == 1) echo htmlspecialchars('checked'); ?>>
                            <tooltip>?
                                <tooltiptext>
                                    ECC or Error-Correcting Code means that this type of memory will be much less prone random errors, and will prevent crashes better. This is usually much more expensive and only for very high end or important systems that cannot afford go down.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Total RAM Capacity: </th>
                        <td>
                            <input type="number" min="0" max="9999999" step="1" name="ramCapacity" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getCapacity()); ?>">GB
                            <tooltip>?
                                <tooltiptext>
                                    The total amount of RAM between all of the RAM modules. For example, 8GB, 16GB, 32GB, 128GB...
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['capacity'])) echo htmlspecialchars($errorMsgs['capacity']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th># of RAM Modules: </th>
                        <td>
                            <input type="number" min="0" max="256" step="1" name="numRamSticks" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getNumSticks()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    The number of RAM Modules/Sticks that you will install on your motherboard. For example, 1, 2, 4, maybe 8... Also make sure that you install them the right way and in the correct slot/order to enable the proper channeling.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['numsticks'])) echo htmlspecialchars($errorMsgs['numsticks']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Clock Speed: </th>
                        <td>
                            <input type="number" min="0" max="9999" step="1" name="ramClockSpeed" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getClockSpeed()); ?>">MHz
                            <tooltip>?
                                <tooltiptext>
                                    The speed of the memory. A higher memory speed will be able to feed the CPU more data faster. However, the bottleneck usually lies within the CPU, unless it is a very powerful CPU. Make sure that your motherboard and CPU will be able to take advantage of fast memory if you do get fast memory.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['clockspeed'])) echo htmlspecialchars($errorMsgs['clockspeed']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Voltage: </th>
                        <td>
                            <input type="number" min="0" max="99" step=".05" name="ramVoltage" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getVoltage()); ?>">V
                            <tooltip>?
                                <tooltiptext>
                                    Make sure that your motherboard and RAM are rated for the same voltage. A slight difference in voltage such as 1.35 and 1.5 between the motherboard and RAM might still work for a short time, but it is not recommended and should be avoided.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['voltage'])) echo htmlspecialchars($errorMsgs['voltage']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Wattage: </th>
                        <td>
                            <input type="number" min="0" max="9999" step="1" name="ramWattage" id="ramWattage" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getWattage()); ?>">W
                            <tooltip>?
                                <tooltiptext>
                                    The power consumption of the RAM. Most RAM draws about 2-3 watts per module. It may be a small amount, but it is still important to keep track of all power consumption in your PC.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['wattage'])) echo htmlspecialchars($errorMsgs['wattage']); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save RAM">
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE your RAM information?')">
            <input type="hidden" name="action" value="deleteRAM">
            <input type="hidden" name="deleteRAMID" value="<?php if(isset($ram)) echo htmlspecialchars($ram->getRAMID()) ?>">
            <input type="submit" value="Delete RAM">
        </form>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['ram'])) echo htmlspecialchars($confirmMsgs['ram']); ?>
        </p>
    </section>
    <input type="hidden" name="numDrives" id="numDrives" value="<?php echo htmlspecialchars($numDrives); ?>">
    <input type="hidden" name="maxNumDrives" id="maxNumDrives" value="<?php echo htmlspecialchars($maxNumDrives); ?>">
    <?php for($i = 1; $i <= $maxNumDrives; $i++) { ?>
    <section class="part" id="drive<?php echo htmlspecialchars($i) ?>">
        <h2>
            <?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getDriveType()) ?> Storage Drive
            <tooltip>?
                <tooltiptext>
                    A drive stores data. For example, you will save your files and install your operating system on a hard drive.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="saveDrive">
            <input type="hidden" name="driveID<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getDriveID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <input type="text" name="driveManufacturer<?php echo htmlspecialchars($i); ?>" list="driveManufacturers" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getManufacturer()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Company that makes the Drive.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Model Name: </th>
                    <td>
                        <input type="text" name="driveModelName<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Model Number of the particular Drive.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Drive Type: </th>
                    <td>
                        <select name="driveType<?php echo htmlspecialchars($i); ?>">
                            <option value=""></option>
                            <option value="SSD" <?php if(isset($drives[$i]) && $drives[$i]->getDriveType() === 'SSD') echo htmlspecialchars('selected'); ?>>SSD</option>
                            <option value="HDD" <?php if(isset($drives[$i]) && $drives[$i]->getDriveType() === 'HDD') echo htmlspecialchars('selected'); ?>>HDD</option>
                            <option value="Hybrid" <?php if(isset($drives[$i]) && $drives[$i]->getDriveType() === 'Hybrid') echo htmlspecialchars('selected'); ?>>Hybrid</option>
                            <option value="Optane" <?php if(isset($drives[$i]) && $drives[$i]->getDriveType() === 'Optane') echo htmlspecialchars('selected'); ?>>Optane</option>
                            <option value="Optical" <?php if(isset($drives[$i]) && $drives[$i]->getDriveType() === 'Optical') echo htmlspecialchars('selected'); ?>>Optical</option>
                            <option value="Network" <?php if(isset($drives[$i]) && $drives[$i]->getDriveType() === 'Network') echo htmlspecialchars('selected'); ?>>Network</option>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The kind of drive that this will be. SSDs are fast, and slightly more expensive than HDDs, but HDDs usually have more storage space for cheaper. It is recommended to install your operating system on an SSD. Hybrid Drives are a combination of SSDs and HDDs. Optane drives are new from Intel and even faster and more expensive than SSDs. Optical drives are like CD/DVD/BluRay Drives.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['drivetype'])) echo htmlspecialchars($errorMsgs['drivetype']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Capacity: </th>
                    <td>
                        <input type="number" min="0.00" max="100000.00" step="0.01" name="driveCapacity<?php echo htmlspecialchars($i); ?>" id="driveCapacity<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getCapacity()); ?>">GB
                        <tooltip>?
                            <tooltiptext>
                                The total storage capacity of the drive. For example 240GB, 750GB, 1000GB (1TB), 2000GB (2TB), etc...
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['capacity'])) echo htmlspecialchars($errorMsgs['capacity']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="100000.00" step="0.01" name="driveCost<?php echo htmlspecialchars($i); ?>" id="driveCost<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of your Drive. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="driveLink<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a Drive if you want to save it for later. Click the 'Your Link to Drive' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($drives[$i]) && $drives[$i]->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php if(isset($ram)) echo htmlspecialchars($drives[$i]->getLink()); ?>" target="_blank">Your Link To Drive</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This RAM kit</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="driveSearch<?php echo htmlspecialchars($i); ?>">Search for This Drive</a></td>
                </tr>
            </table>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>Form Factor: </th>
                        <td>
                            <select name="driveFormFactor<?php echo htmlspecialchars($i); ?>">
                                <option value=""></option>
                                <option value="1.8 in" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === '1.8 in') echo htmlspecialchars('selected'); ?>>1.8 in</option>
                                <option value="2.5 in" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === '2.5 in') echo htmlspecialchars('selected'); ?>>2.5 in</option>
                                <option value="3.5 in" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === '3.5 in') echo htmlspecialchars('selected'); ?>>3.5 in</option>
                                <option value="mSATA" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'mSATA') echo htmlspecialchars('selected'); ?>>mSATA</option>
                                <option value="mSATA-mini" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'mSATA=mini') echo htmlspecialchars('selected'); ?>>mSATA-mini</option>
                                <option value="slimSATA" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'slimSATA') echo htmlspecialchars('selected'); ?>>slimSATA</option>
                                <option value="M.2 NVMe" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'M.2 NVMe') echo htmlspecialchars('selected'); ?>>M.2 NVMe</option>
                                <option value="M.2 SATA 2242" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'M.2 SATA 2242') echo htmlspecialchars('selected'); ?>>M.2 SATA 2242</option>
                                <option value="M.2 SATA 2260" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'M.2 SATA 2260') echo htmlspecialchars('selected'); ?>>M.2 SATA 2260</option>
                                <option value="M.2 SATA 2280" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'M.2 SATA 2280') echo htmlspecialchars('selected'); ?>>M.2 SATA 2280</option>
                                <option value="External" <?php if(isset($drives[$i]) && $drives[$i]->getFormFactor() === 'External') echo htmlspecialchars('selected'); ?>>External</option>
                            </select>
                            <tooltip>?
                                <tooltiptext>
                                    The size type of your drive. This can also somewhat be related to how your drive connects to your motherboard.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['formfactor'])) echo htmlspecialchars($errorMsgs['formfactor']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Interface: </th>
                        <td>
                            <select name="driveInterface<?php echo htmlspecialchars($i); ?>">
                                <option value=""></option>
                                <option value="IDE" <?php if(isset($drives[$i]) && $drives[$i]->getInterface() === 'IDE') echo htmlspecialchars('selected'); ?>>IDE</option>
                                <option value="PCIe" <?php if(isset($drives[$i]) && $drives[$i]->getInterface() === 'PCIe') echo htmlspecialchars('selected'); ?>>PCIe</option>
                                <option value="SATA I" <?php if(isset($drives[$i]) && $drives[$i]->getInterface() === 'SATA I') echo htmlspecialchars('selected'); ?>>SATA I</option>
                                <option value="SATA II" <?php if(isset($drives[$i]) && $drives[$i]->getInterface() === 'SATA II') echo htmlspecialchars('selected'); ?>>SATA II</option>
                                <option value="SATA III" <?php if(isset($drives[$i]) && $drives[$i]->getInterface() === 'SATA III') echo htmlspecialchars('selected'); ?>>SATA III</option>
                                <option value="SAS" <?php if(isset($drives[$i]) && $drives[$i]->getInterface() === 'SAS') echo htmlspecialchars('selected'); ?>>SAS</option>
                            </select>
                            <tooltip>?
                                <tooltiptext>
                                    The technology of which your drive connects to your motherboard. SATA III and PCIe are the most common interfaces.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['interface'])) echo htmlspecialchars($errorMsgs['interface']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>RPM: </th>
                        <td>
                            <input type="number" min="0" max="999999" step="1" name="driveRPM<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getRPM()); ?>">RPM
                            <tooltip>?
                                <tooltiptext>
                                    RPM, or Revolutions Per Minute, is the speed of a HDD, Hybrid, or Optical Drive. SSDs and Optane storage do not have RPM because they are solid state.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['clockspeed'])) echo htmlspecialchars($errorMsgs['clockspeed']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Read Speed: </th>
                        <td>
                            <input type="number" min="0" max="99" step=".05" name="driveReadSpeed<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getReadSpeed()); ?>">Mb/s
                            <tooltip>?
                                <tooltiptext>
                                    The speed at which the drive can read data. SSDs and Optane storage have the fastest read speeds, while HDDs have the slowest.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['readspeed'])) echo htmlspecialchars($errorMsgs['readspeed']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Write Speed: </th>
                        <td>
                            <input type="number" min="0" max="99999" step="1" name="driveWriteSpeed<?php echo htmlspecialchars($i); ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getWriteSpeed()); ?>">Mb/s
                            <tooltip>?
                                <tooltiptext>
                                    The speed at which the drive can write data. SSDs and Optane storage have the fastest write speeds, while HDDs have the slowest.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['writespeed'])) echo htmlspecialchars($errorMsgs['writespeed']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Wattage: </th>
                        <td>
                            <input type="number" min="0" max="9999" step="1" name="driveWattage<?php echo htmlspecialchars($i) ?>" id="driveWattage<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getWattage()); ?>">W
                            <tooltip>?
                                <tooltiptext>
                                    The power consumption of the drive. Wattage can vary by drive type. SSDs and HDDs will range from 10-20 watts, while Optical drives can draw up to 40-50 watts.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['wattage'])) echo htmlspecialchars($errorMsgs['wattage']); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save Drive">
            <input type="hidden" name="numInSetup" value="<?php echo htmlspecialchars($i) ?>"><!-- So the save function will know which drive to save -->
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE this Drive?')">
            <input type="hidden" name="action" value="deleteDrive">
            <input type="hidden" name="deleteDriveID" value="<?php if(isset($drives[$i])) echo htmlspecialchars($drives[$i]->getDriveID()) ?>">
            <input type="submit" value="Delete Drive">
        </form>
        <?php if($i == 1) { ?>
        <button id="addDrive">Add Drive</button>
        <button id="removeDrive">Remove Drive</button>
        <?php } ?>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['drive'])) echo htmlspecialchars($confirmMsgs['drive']); ?>
        </p>
    </section>
    <?php } ?>
    <!-- List does not need to be printed multiple times in the loop -->
    <datalist id="driveManufacturers">
        <option value="ADATA">
        <option value="Apacer">
        <option value="ASUS">
        <option value="ATP">
        <option value="Corsair">
        <option value="Crucial">
        <option value="Fujitsu">
        <option value="G.Skill">
        <option value="IBM">
        <option value="Intel">
        <option value="Kingston">
        <option value="PNY">
        <option value="Samsung">
        <option value="Seagate">
        <option value="Sandisk">
        <option value="Toshiba">
        <option value="Transcent">
        <option value="Western Digital">
    </datalist>
    <section class="part">
        <h2>
            Power Supply
            <tooltip>?
                <tooltiptext>
                    The Power Supply is the part that gives power to all of the other parts in the PC by converting AC from the wall outlet to DC for the parts to use.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="savePSU">
            <input type="hidden" name="psuID" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getPSUID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <input type="text" name="psuManufacturer" list="psuManufacturers" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getManufacturer()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Company that makes the Power Supply.
                            </tooltiptext>
                        </tooltip>
                        <datalist id="psuManufacturers">
                            <option value="Adata">
                            <option value="Akasa">
                            <option value="Antec">
                            <option value="APEVIA">
                            <option value="Arctic">
                            <option value="Be quiet!">
                            <option value="BFG">
                            <option value="Cooler Master">
                            <option value="Corsair">
                            <option value="Deepcool">
                            <option value="Dynex">
                            <option value="Deepcool">
                            <option value="EVGA">
                            <option value="Foxconn">
                            <option value="Fractal Design">
                            <option value="Gigabyte">
                            <option value="In Win Development">
                            <option value="Lian Li">
                            <option value="LiteOn">
                            <option value="Maplin">
                            <option value="OCZ">
                            <option value="PC Power and Cooling">
                            <option value="RAIDMax">
                            <option value="Seasonic">
                            <option value="Seventeam">
                            <option value="SilverStone">
                            <option value="StarTech">
                            <option value="Super Flower">
                            <option value="Thermaltake">
                            <option value="Trust">
                            <option value="XFX">
                            <option value="Xilence">
                            <option value="Zalman">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Model Name: </th>
                    <td>
                        <input type="text" name="psuModelName" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Model Number of the particular Power Supply.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Max Power: </th>
                    <td>
                        <input type="number" min="0" max="99999" step="1" name="psuMaxPower" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getMaxPower()); ?>">W
                        <tooltip>?
                            <tooltiptext>
                                The Maximum Power that the power supply is rated for. You should buy the power supply last so that you can calculate the wattage that will be used by all of the other parts in your system. The general rule and recommendation is to buy a power supply that is 30% more powerful than the sum wattages of ALL your parts. Look at the Analysis section to the right and you will see a rough calculation of the recommended power supply value.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['maxpower'])) echo htmlspecialchars($errorMsgs['maxpower']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="100000.00" step="0.01" name="psuCost" id="psuCost" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of your Power Supply. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="psuLink" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a Power Supply if you want to save it for later. Click the 'Your Link to Power Supply' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($psu) && $psu->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php if(isset($psu)) echo htmlspecialchars($psu->getLink()); ?>" target="_blank">Your Link To Power Supply</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This Power Supply</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="psuSearch">Search for This Power Supply</a></td>
                </tr>
            </table>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>Certification: </th>
                        <td>
                            <select name="psuCertification">
                                <option value=""></option>
                                <option value="None" <?php if(isset($psu) && $psu->getCertification() === 'None') echo htmlspecialchars('selected'); ?>>None</option>
                                <option value="80 Plus" <?php if(isset($psu) && $psu->getCertification() === '80 Plus') echo htmlspecialchars('selected'); ?>>80 Plus</option>
                                <option value="80 Plus Bronze" <?php if(isset($psu) && $psu->getCertification() === '80 Plus Bronze') echo htmlspecialchars('selected'); ?>>80 Plus Bronze</option>
                                <option value="80 Plus Silver" <?php if(isset($psu) && $psu->getCertification() === '80 Plus Silver') echo htmlspecialchars('selected'); ?>>80 Plus Silver</option>
                                <option value="80 Plus Gold" <?php if(isset($psu) && $psu->getCertification() === '80 Plus Gold') echo htmlspecialchars('selected'); ?>>80 Plus Gold</option>
                                <option value="80 Plus Platinum" <?php if(isset($psu) && $psu->getCertification() === '80 Plus Platinum') echo htmlspecialchars('selected'); ?>>80 Plus Platinum</option>
                                <option value="80 Plus Titanium" <?php if(isset($psu) && $psu->getCertification() === '80 Plus Titanium') echo htmlspecialchars('selected'); ?>>80 Plus Titanium</option>
                            </select>
                            <tooltip>?
                                <tooltiptext>
                                    The certification given to power supplies to rate their reliability.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['certification'])) echo htmlspecialchars($errorMsgs['certification']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Output Values: </th>
                        <td>
                            <textarea name="psuOutputs" rows="6" cols="25" placeholder="Examples:&#10;+3.3V@20A&#10;+5V@20A"><?php if(isset($psu)) echo htmlspecialchars($psu->getOutputs()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    The available output values in voltz and amps that the power supply has.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Connectors: </th>
                        <td>
                            <textarea name="psuConnectors" rows="6" cols="25" placeholder="Examples:&#10;4 x PCIE&#10;8 x SATA"><?php if(isset($psu)) echo htmlspecialchars($psu->getConnectors()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    The output connectors from the power supply
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save Power Supply">
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE your Power Supply information?')">
            <input type="hidden" name="action" value="deletePSU">
            <input type="hidden" name="deletePSUID" value="<?php if(isset($psu)) echo htmlspecialchars($psu->getPSUID()) ?>">
            <input type="submit" value="Delete Power Supply">
        </form>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['psu'])) echo htmlspecialchars($confirmMsgs['psu']); ?>
        </p>
    </section>
    <section class="part">
        <h2>
            Case
            <tooltip>?
                <tooltiptext>
                    Also known as the 'Tower'. This is where you put all of your other parts.
                </tooltiptext>
            </tooltip>
        </h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="saveCase">
            <input type="hidden" name="caseID" value="<?php if(isset($case)) echo htmlspecialchars($case->getCaseID()); ?>">
            <h3>Shopping Info</h3>
            <table class="shopInfo">
                <tr>
                    <th>Manufacturer: </th>
                    <td>
                        <input type="text" name="caseManufacturer" list="caseManufacturers" value="<?php if(isset($case)) echo htmlspecialchars($case->getManufacturer()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The company that makes the case.
                            </tooltiptext>
                        </tooltip>
                        <datalist id="caseManufacturers">
                            <option value="AeroCool">
                            <option value="AMAX IT">
                            <option value="Antec">
                            <option value="AOpen">
                            <option value="APEVIA">
                            <option value="ASRock">
                            <option value="Be quiet!">
                            <option value="Chassis Plans">
                            <option value="Cooler Master">
                            <option value="Corsair">
                            <option value="Cougar">
                            <option value="Dell">
                            <option value="Deepcool">
                            <option value="DFI">
                            <option value="ECS">
                            <option value="EVGA">
                            <option value="Foxconn">
                            <option value="Fractal Design">
                            <option value="Gigabyte">
                            <option value="IBall">
                            <option value="Intel">
                            <option value="Lenovo">
                            <option value="Lian Li">
                            <option value="MSI">
                            <option value="MiTAC">
                            <option value="NZXT">
                            <option value="Phanteks">
                            <option value="RAIDMax">
                            <option value="Razer">
                            <option value="Rosewill">
                            <option value="Seasonic">
                            <option value="Shuttle">
                            <option value="SilverStone">
                            <option value="Thermaltake">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['manufacturer'])) echo htmlspecialchars($errorMsgs['manufacturer']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Model Name: </th>
                    <td>
                        <input type="text" name="caseModelName" value="<?php if(isset($case)) echo htmlspecialchars($case->getModelName()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                The Model Name or Model Number of the particular Case.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['modelname'])) echo htmlspecialchars($errorMsgs['modelname']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Form Factor: </th>
                    <td>
                        <select name="caseFormFactor">
                            <option></option>
                            <option value="ATX" <?php if(isset($case) && $case->getFormFactor() === 'ATX') echo htmlspecialchars('selected'); ?>>ATX</option>
                            <option value="Mini ATX" <?php if(isset($case) && $case->getFormFactor() === 'Mini ATX') echo htmlspecialchars('selected'); ?>>Mini ATX</option>
                            <option value="Mini ITX" <?php if(isset($case) && $case->getFormFactor() === 'Mini ITX') echo htmlspecialchars('selected'); ?>>Mini ITX</option>
                            <option value="Micro ATX" <?php if(isset($case) && $case->getFormFactor() === 'Micro ATX') echo htmlspecialchars('selected'); ?>>Micro ATX</option>
                            <option value="Flex ATX" <?php if(isset($case) && $case->getFormFactor() === 'Flex ATX') echo htmlspecialchars('selected'); ?>>Flex ATX</option>
                            <option value="LPX" <?php if(isset($case) && $case->getFormFactor() === 'LPX') echo htmlspecialchars('selected'); ?>>LPX</option>
                            <option value="BTX" <?php if(isset($case) && $case->getFormFactor() === 'BTX') echo htmlspecialchars('selected'); ?>>BTX</option>
                            <option value="Other" <?php if(isset($case) && $case->getFormFactor() === 'Other') echo htmlspecialchars('selected'); ?>>Other</option>
                        </select>
                        <tooltip>?
                            <tooltiptext>
                                The Form Factor of motherboard that the case supports. Make sure that your motherboard will fit in your case/tower.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['formfactor'])) echo htmlspecialchars($errorMsgs['formfactor']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Cost: </th>
                    <td>
                        <input type="number" min="0.00" max="100000.00" step="0.01" name="caseCost" id="caseCost" value="<?php if(isset($case)) echo htmlspecialchars($case->getCost()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                Keep track of the cost of your Case. Just put 0 if you already own it.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['cost'])) echo htmlspecialchars($errorMsgs['cost']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Paste Link: </th>
                    <td>
                        <input type="text" name="caseLink" value="<?php if(isset($case)) echo htmlspecialchars($case->getLink()); ?>">
                        <tooltip>?
                            <tooltiptext>
                                You can paste a link to a Case if you want to save it for later. Click the 'Your Link to Case' button to open your saved link.
                            </tooltiptext>
                        </tooltip>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="errorMsg">
                        <?php if(isset($errorMsgs['link'])) echo htmlspecialchars($errorMsgs['link']); ?>
                    </td>
                </tr>
                <tr>
                    <?php if(isset($case) && $case->getLink() != NULL) { ?>
                    <td colspan="2" class="realLink"><a href="<?php if(isset($case)) echo htmlspecialchars($case->getLink()); ?>" target="_blank">Your Link To Case</a></td>
                    <?php } else { ?>
                    <td colspan="2"><a>Save a Link For This Case</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td colspan="2" class="realLink"><a id="caseSearch">Search for This Case</a></td>
                </tr>
            </table>
            <h3>More Specs <span class="toggle">+</span></h3>
            <div class="extraSpecs">
                <table>
                    <tr>
                        <th>Diminsions: </th>
                        <td>
                            <input type="text" name="caseDiminsions" value="<?php if(isset($case)) echo htmlspecialchars($case->getDiminsions()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    The size of the entire case. (H x W x D)
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['diminsions'])) echo htmlspecialchars($errorMsgs['diminsions']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Material: </th>
                        <td>
                            <input type="text" name="caseMaterial" value="<?php if(isset($case)) echo htmlspecialchars($case->getMaterial()); ?>">
                            <tooltip>?
                                <tooltiptext>
                                    What the case/tower is made out of. For example, SECC Steel, Brushed Aluminum, Plastic, Glass, etc...
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['material'])) echo htmlspecialchars($errorMsgs['material']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Color: </th>
                        <td>
                            <input type="color" name="caseColor" value="<?php if(isset($case)) echo htmlspecialchars($case->getColor()); else echo htmlspecialchars(" #222222") ?>">
                            <tooltip>?
                                <tooltiptext>
                                    Keep track of the color of the case.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['color'])) echo htmlspecialchars($errorMsgs['color']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Expansions: </th>
                        <td>
                            <textarea name="caseExpansions" rows="6" cols="25" placeholder="Examples:&#10;7 Expansion Slots&#10;Internal 3.5" Drive Bay><?php if(isset($case)) echo htmlspecialchars($case->getExpansions()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    The built in slots of the case. For example, an optical drive bay. Make sure that the case has room for all of the hard drives you want to install.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Ports: </th>
                        <td>
                            <textarea name="casePorts" rows="6" cols="25" placeholder="Examples:&#10;2 USB 3.0&#10;Headphone Jack"><?php if(isset($case)) echo htmlspecialchars($case->getPorts()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    The ports that are built into the case itself. This is not meant to include all of the ports on the motherboard. The case will usually have some USB and Audio ports on the front of the case.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Cooling<br>Options: </th>
                        <td>
                            <textarea name="caseFanOptions" rows="6" cols="25" placeholder="Examples:&#10;Top: 2 x 120mm fan&#10;Bottom: 1 x 120mm fan"><?php if(isset($case)) echo htmlspecialchars($case->getFanOptions()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    The options and space available for cooling devices.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                    <tr>
                        <th>Other<br>Features: </th>
                        <td>
                            <textarea name="caseFeatures" rows="6" cols="25" placeholder="Example:&#10;RGB Lighting"><?php if(isset($case)) echo htmlspecialchars($case->getFeatures()); ?></textarea>
                            <tooltip>?
                                <tooltiptext>
                                    List any other features that you want to keep track of.
                                </tooltiptext>
                            </tooltip>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Save Case">
            <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
            <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
        </form>
        <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE your Case information?')">
            <input type="hidden" name="action" value="deleteCase">
            <input type="hidden" name="deleteCaseID" value="<?php if(isset($case)) echo htmlspecialchars($case->getCaseID()) ?>">
            <input type="submit" value="Delete Case">
        </form>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['case'])) echo htmlspecialchars($confirmMsgs['case']); ?>
        </p>
    </section><br>
    <p class="hint">Remember to save before going to another page!</p>
    <a href=".?action=viewMonitors" class="bottomNav" id="back">Back: Configure Monitors</a>
    <a href=".?action=viewDashboard" class="bottomNav" id="next">Finish and Go to Dashboard</a>
</main>
<?php
    include("views/footer.php");
?>
