<?php
    $title = 'Configure Monitor Setup';
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
        <caption>Monitor Set-up Analysis</caption>
        <tr>
            <th>Total Pixels: </th>
            <td id="totalPixels"></td>
        </tr>
        <tr title="This includes bezels">
            <th>Total Width: </th>
            <td id="totalWidth"></td>
        </tr>
        <tr title="Total Screen Area">
            <th>Screen Real Estate: </th>
            <td id="totalArea"></td>
        </tr>
        <tr title="Total Cost of Monitors only">
            <th>Total Monitors Cost: </th>
            <td id="totalCost"></td>
        </tr>
    </table>

</aside>
<main class="mainLeft">
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['monitors'])) echo htmlspecialchars($confirmMsgs['monitors']); ?>
    </p>
    <p class="errorMsg">
        <?php if(isset($errorMsgs['monitors'])) echo htmlspecialchars($errorMsgs['monitors']); ?>
    </p>
    <section id="buttons">
        <button id="addMonitor">Add Monitor</button>
        <button id="removeMonitor">Remove Monitor</button>
        <button id="zoomIn">Zoom In</button>
        <button id="zoomOut">Zoom Out</button>
        <button id="undo" onClick="location.reload(true);" title="Undo the changes you have made since loading the page">Undo</button><br>
        <p id="areaTip" title="May not work in Edge">Drag Down for more Area</p>
    </section>
    <form action="." method="post" id="monitorOptionsArea">
        <input type="hidden" name="action" value="saveMonitors">
        <input type="hidden" name="SCALE" id="SCALE" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getSCALE()); ?>">
        <input type="hidden" name="maxNumMonitors" id="maxNumMonitors" value="<?php if(isset($maxNumMonitors)) echo $maxNumMonitors ?>">
        <input type="hidden" name="numMonitors" id="numMonitors" value="<?php if(isset($numMonitors)) echo $numMonitors ?>">
        <!-- Start of For Loop to make all monitors divs -->
        <?php for($i = 1; $i <= $maxNumMonitors; $i++){ ?>
        <!--Monitor <?php echo htmlspecialchars($i) ?>-->
        <section class="monitorBox" id="monitorBox<?php echo htmlspecialchars($i) ?>">
            <div class="monitor" id="monitor<?php echo htmlspecialchars($i) ?>" class="ui-widget-content">
                <p>
                    <?php echo htmlspecialchars($i) ?>
                </p>
            </div>
            <div class="part" id="part<?php echo htmlspecialchars($i) ?>">
                <h4>Monitor
                    <?php echo htmlspecialchars($i) ?>
                </h4>
                <div class="monitorOptions">
                    <h3>Size</h3>
                    <table>
                        <tr>
                            <th>Diagonal:</th>
                            <td>
                                <input type="number" name="diagonal<?php echo htmlspecialchars($i) ?>" id="diagonal<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getDiagonal()); ?>">
                                <tooltip>?
                                    <tooltiptext>
                                        The diagonal length of the screen. Typical values are 17, 19, 22, 24, 27, 29, 34, 38, 49 etc.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['diagonal'])) echo htmlspecialchars($errorMsgs['diagonal']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Units:</th>
                            <td>
                                <input type="radio" name="units<?php echo htmlspecialchars($i) ?>" value="in" <?php if(isset($monitors[$i]) && $monitors[$i]->getUnits() == "in") echo htmlspecialchars("checked"); ?>>in
                                <input type="radio" name="units<?php echo htmlspecialchars($i) ?>" value="cm" <?php if(isset($monitors[$i]) && $monitors[$i]->getUnits() == "cm") echo htmlspecialchars("checked"); ?>>cm
                                <tooltip>?
                                    <tooltiptext>
                                        You can change the units from imperial to metric.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['units'])) echo htmlspecialchars($errorMsgs['units']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Bezel Width: </th>
                            <td>
                                <input type="range" min="0.0" max="2" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getBezelWidth()); ?>" step="0.25" data-show-value="true" name="bezelWidth<?php echo htmlspecialchars($i) ?>">
                                <span id="bezelValue<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getBezelWidth()); ?>"></span>
                                <tooltip>?
                                    <tooltiptext>
                                        The width of the border around the screen.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['bezelwidth'])) echo htmlspecialchars($errorMsgs['bezelwidth']); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- Toggle for landscape or portrait orientation -->
                <div class="monitorOptions">
                    <h3>
                        Orientation
                        <tooltip>?
                            <tooltiptext>
                                You can preview what tilting the monitor sideways will look like.
                            </tooltiptext>
                        </tooltip>
                    </h3>
                    <table>
                        <tr>
                            <td><input type="radio" name="orientation<?php echo htmlspecialchars($i) ?>" value="landscape" <?php if(isset($monitors[$i]) && $monitors[$i]->getOrientation() == "landscape") echo htmlspecialchars("checked"); ?>>Landscape</td>
                            <td><input type="radio" name="orientation<?php echo htmlspecialchars($i) ?>" value="portrait" <?php if(isset($monitors[$i]) && $monitors[$i]->getOrientation() == "portrait") echo htmlspecialchars("checked"); ?>>Portrait</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['orientation'])) echo htmlspecialchars($errorMsgs['orientation']); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- Toggle for different aspect ratios.-->
                <div class="monitorOptions">
                    <h3>
                        Aspect Ratio
                        <tooltip>?
                            <tooltiptext>
                                The ratio between the number of horizontal pixels to the number of vertical pixels. 16:9 is the most common aspect ratio.
                            </tooltiptext>
                        </tooltip>
                    </h3>
                    <table>
                        <tr>
                            <th>Common: </th>
                            <td><input type="radio" name="aspectRatioCC<?php echo htmlspecialchars($i) ?>" id="commonAspectRatio<?php echo htmlspecialchars($i) ?>" value="common" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() != "detect") echo htmlspecialchars("checked"); ?>></td>
                            <td>
                                <select name="aspectRatioType<?php echo htmlspecialchars($i) ?>" id="aspectRatioChoices<?php echo htmlspecialchars($i) ?>">
                                    <option value="detect" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "detect") echo htmlspecialchars("selected"); ?>>Detect</option>
                                    <optgroup label="Tall">
                                        <option value="5:4" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "5:4") echo htmlspecialchars("selected"); ?>>5:4</option>
                                        <option value="4:3" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "4:3") echo htmlspecialchars("selected"); ?>>4:3</option>
                                    </optgroup>
                                    <optgroup label="Wide">
                                        <option value="16:10" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "16:10") echo htmlspecialchars("selected"); ?>>16:10</option>
                                        <option value="16:9" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "16:9") echo htmlspecialchars("selected"); ?>>16:9</option>
                                    </optgroup>
                                    <optgroup label="Ultrawide">
                                        <option value="21:9" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "21:9") echo htmlspecialchars("selected"); ?>>21:9</option>
                                        <option value="32:9" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "32:9") echo htmlspecialchars("selected"); ?>>32:9</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Custom:</th>
                            <td><input type="radio" name="aspectRatioCC<?php echo htmlspecialchars($i) ?>" id="customAspectRatio<?php echo htmlspecialchars($i) ?>" value="custom" <?php if(isset($monitors[$i]) && $monitors[$i]->getAspectRatioType() == "detect") echo htmlspecialchars("checked"); ?>></td>
                            <td>
                                Detect Ratio
                                <tooltip>?
                                    <tooltiptext>
                                        If the aspect ratio of your monitor is not listed in the dropdown box, you can have this tool automatically detect the aspect ratio after you type in a custom resolution in the resolution area.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="errorMsg">
                                <?php if(isset($errorMsgs['aspectratiotype'])) echo htmlspecialchars($errorMsgs['aspectratiotype']); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- Resolution fields -->
                <div class="monitorOptions">
                    <h3>
                        Resolution
                        <tooltip>?
                            <tooltiptext>
                                The pixel layout that the monitor has. The higher the resolution, the sharper and better the image quality will be, though a high resolution is not the only factor in how good a monitor will look.
                            </tooltiptext>
                        </tooltip>
                    </h3>
                    <table>
                        <tr>
                            <th>Common: </th>
                            <td><input type="radio" name="resolutionCC<?php echo htmlspecialchars($i) ?>" id="commonResolution<?php echo htmlspecialchars($i) ?>" value="common" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() != "custom") echo htmlspecialchars("checked"); ?>></td>
                            <td>
                                <select name="resolutionType<?php echo htmlspecialchars($i) ?>" id="resolutionChoices<?php echo htmlspecialchars($i) ?>">
                                    <option value="custom" id="customResolutionChoice" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "custom") echo htmlspecialchars("selected"); ?>>Custom</option>
                                    <option value="VGA" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "VGA") echo htmlspecialchars("selected"); ?>>SVGA 600i</option>
                                    <option value="HD" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "HD") echo htmlspecialchars("selected"); ?>>HD 768p</option>
                                    <option value="HDplus" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "HDplus") echo htmlspecialchars("selected"); ?>>HD+ 900p</option>
                                    <option value="FHD" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "FHD") echo htmlspecialchars("selected"); ?>>FHD 1080p</option>
                                    <option value="FHDplus" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "FHDplus") echo htmlspecialchars("selected"); ?>>FHD+ 1200p</option>
                                    <option value="QHD" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "QHD") echo htmlspecialchars("selected"); ?>>QHD 1440p</option>
                                    <option value="QHDplus" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "QHDplus") echo htmlspecialchars("selected"); ?>>QHD+ 1600p</option>
                                    <option value="4K" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "4K") echo htmlspecialchars("selected"); ?>>4K 2160p</option>
                                    <option value="5K" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "5K") echo htmlspecialchars("selected"); ?>>5K 2880p</option>
                                    <option value="8K" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "8K") echo htmlspecialchars("selected"); ?>>8K 4320p</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Custom: </th>
                            <td><input type="radio" name="resolutionCC<?php echo htmlspecialchars($i) ?>" id="customResolution<?php echo htmlspecialchars($i) ?>" value="custom" <?php if(isset($monitors[$i]) && $monitors[$i]->getResolutionType() == "custom") echo htmlspecialchars("checked"); ?>></td>
                            <td>
                                <input type="number" name="horRes<?php echo htmlspecialchars($i) ?>" id="horRes<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getHorizontalResolution()); ?>">x<input type="number" name="verRes<?php echo htmlspecialchars($i) ?>" id="verRes<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getVerticalResolution()); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="errorMsg">
                                <?php if(isset($errorMsgs['horizontalresolution'])) echo htmlspecialchars($errorMsgs['horizontalresoultion']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="errorMsg">
                                <?php if(isset($errorMsgs['verticalresolution'])) echo htmlspecialchars($errorMsgs['verticalresolution']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="errorMsg">
                                <?php if(isset($errorMsgs['resolutiontype'])) echo htmlspecialchars($errorMsgs['resolutiontype']); ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- Toggle to Show more specs -->
                <h3>More Specs <span class="toggle">+</span></h3>
                <!-- More specs to be choses -->
                <div class="extraSpecs">
                    <table>
                        <tr>
                            <td>
                                <input type="checkbox" name="hdr<?php echo htmlspecialchars($i) ?>" value="HDR" <?php if(isset($monitors[$i]) && $monitors[$i]->getHDR() == 1) echo htmlspecialchars("checked"); ?>>HDR
                                <tooltip>?
                                    <tooltiptext>
                                        HDR, or High Dynamic Range, is a feature that makes the contrast between the whitest whites and blackest backs more apparent on screen. This will make light and dark images/videos/games look better.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                            <td>
                                <input type="checkbox" name="srgb<?php echo htmlspecialchars($i) ?>" value="sRGB" <?php if(isset($monitors[$i]) && $monitors[$i]->getSRGB() == 1) echo htmlspecialchars("checked"); ?>>sRGB
                                <tooltip>?
                                    <tooltiptext>
                                        A monitor with a high sRGB value is more color accurate than the avergae monitor. Look for sRGB 99%.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                            <td>
                                <input type="checkbox" name="curved<?php echo htmlspecialchars($i) ?>" value="Curved" <?php if(isset($monitors[$i]) && $monitors[$i]->getCurved() == 1) echo htmlspecialchars("checked"); ?>>Curved
                                <tooltip>?
                                    <tooltiptext>
                                        Some large or wide monitors can be curved to reduce the distortion effect when a user is close to the monitor. However, distortion may be increased for people looking at a curved monitor from far away.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="touch<?php echo htmlspecialchars($i) ?>" value="Touch" <?php if(isset($monitors[$i]) && $monitors[$i]->getTouch() == 1) echo htmlspecialchars("checked"); ?>>Touch
                                <tooltip>?
                                    <tooltiptext>
                                        Indicate if this monitor has a touch screen.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                            <td>
                                <input type="checkbox" name="webcam<?php echo htmlspecialchars($i) ?>" value="Webcam" <?php if(isset($monitors[$i]) && $monitors[$i]->getWebcam() == 1) echo htmlspecialchars("checked"); ?>>Webcam
                                <tooltip>?
                                    <tooltiptext>
                                        Indicate if this monitor has a camera.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                            <td>
                                <input type="checkbox" name="speakers<?php echo htmlspecialchars($i) ?>" value="Speakers" <?php if(isset($monitors[$i]) && $monitors[$i]->getSpeakers() == 1) echo htmlspecialchars("checked"); ?>>Speakers
                                <tooltip>?
                                    <tooltiptext>
                                        Indicate if this monitor has a built in speakers.
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>Display Type: </th>
                            <td>
                                <select name="displayType<?php echo htmlspecialchars($i) ?>">
                                    <option value="any" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "any") echo htmlspecialchars("selected"); ?>>Any</option>
                                    <option value="IPS" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "IPS") echo htmlspecialchars("selected"); ?>>IPS</option>
                                    <option value="VA Panel" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "VA Panel") echo htmlspecialchars("selected"); ?>>VA Panel</option>
                                    <option value="TN Panel" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "TN Panel") echo htmlspecialchars("selected"); ?>>TN Panel</option>
                                    <option value="LCD" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "LCD") echo htmlspecialchars("selected"); ?>>LCD</option>
                                    <option value="AFFS" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "AFFS") echo htmlspecialchars("selected"); ?>>AFFS</option>
                                    <option value="OLED" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayType() == "OLED") echo htmlspecialchars("selected"); ?>>OLED</option>
                                </select>
                                <tooltip>?
                                    <tooltiptext>
                                        The technology behind the panel of the monitor. Each type of panel has its pros and cons. Click <a href="http://nauticomp.com/how-to-choose-best-types-lcd-panels/" target="_blank">here</a> for more information
                                    </tooltiptext>
                                </tooltip>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="hint">
                                <?php
                                        if(isset($setup) && $setup->getGPUPreference() === 'NVIDIA') echo htmlspecialchars("G-Sync is Recommended for an NVIDIA GPU");
                                        else if(isset($setup) && $setup->getGPUPreference() === 'AMD') echo htmlspecialchars("Freesync is Recommended for an AMD GPU");
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Sync Type: </th>
                            <td>
                                <select name="syncType<?php echo htmlspecialchars($i) ?>">
                                    <option value="any" <?php if(isset($monitors[$i]) && $monitors[$i]->getSyncType() == "any") echo htmlspecialchars("selected"); ?>>Any</option>
                                    <option value="none" <?php if(isset($monitors[$i]) && $monitors[$i]->getSyncType() == "none") echo htmlspecialchars("selected"); ?>>None</option>
                                    <option value="G-Sync" <?php if(isset($monitors[$i]) && $monitors[$i]->getSyncType() == "G-Sync") echo htmlspecialchars("selected"); ?>>G-Sync</option>
                                    <option value="FreeSync" <?php if(isset($monitors[$i]) && $monitors[$i]->getSyncType() == "FreeSync") echo htmlspecialchars("selected"); ?>>FreeSync</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Refresh Rate: </th>
                            <td>
                                <select name="refreshRate<?php echo htmlspecialchars($i) ?>">
                                    <option value="any" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "any") echo htmlspecialchars("selected"); ?>>Any</option>
                                    <option value="30Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "30Hz") echo htmlspecialchars("selected"); ?>>30Hz</option>
                                    <option value="45Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "45Hz") echo htmlspecialchars("selected"); ?>>45Hz</option>
                                    <option value="60Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "60Hz") echo htmlspecialchars("selected"); ?>>60Hz</option>
                                    <option value="75Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "75Hz") echo htmlspecialchars("selected"); ?>>75Hz</option>
                                    <option value="90Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "90Hz") echo htmlspecialchars("selected"); ?>>90Hz</option>
                                    <option value="100Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "100Hz") echo htmlspecialchars("selected"); ?>>100Hz</option>
                                    <option value="120Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "120Hz") echo htmlspecialchars("selected"); ?>>120Hz</option>
                                    <option value="144Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "144Hz") echo htmlspecialchars("selected"); ?>>144Hz</option>
                                    <option value="240Hz" <?php if(isset($monitors[$i]) && $monitors[$i]->getRefreshRate() == "240Hz") echo htmlspecialchars("selected"); ?>>240Hz</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Response Time: </th>
                            <td><input type="number" name="responseTime<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getResponseTime()); ?>">ms</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="vga<?php echo htmlspecialchars($i) ?>" value="VGA" <?php if(isset($monitors[$i]) && $monitors[$i]->getVGA() == 1) echo htmlspecialchars("checked"); ?>><label>VGA</label>
                                <input type="checkbox" name="dvi<?php echo htmlspecialchars($i) ?>" value="DVI" <?php if(isset($monitors[$i]) && $monitors[$i]->getDVI() == 1) echo htmlspecialchars("checked"); ?>><label>DVI</label>
                                <input type="checkbox" name="hdmi<?php echo htmlspecialchars($i) ?>" value="HDMI" <?php if(isset($monitors[$i]) && $monitors[$i]->getHDMI() == 1) echo htmlspecialchars("checked"); ?>><label>HDMI</label>
                                <input type="checkbox" name="displayPort<?php echo htmlspecialchars($i) ?>" value="Display Port" <?php if(isset($monitors[$i]) && $monitors[$i]->getDisplayPort() == 1) echo htmlspecialchars("checked"); ?>><label>Display Port</label>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="stats">
                    <h3>Stats</h3>
                    <table>
                        <tr>
                            <th>Size: </th>
                            <td id="sizeStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th>Height: </th>
                            <td id="heightStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th>Width: </th>
                            <td id="widthStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th>Area: </th>
                            <td id="areaStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th>Aspect Ratio: </th>
                            <td id="aspectRatioStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th>Resolution: </th>
                            <td id="resolutionStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th>Pixels: </th>
                            <td id="pixelsStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                        <tr>
                            <th id="ppuStat<?php echo htmlspecialchars($i) ?>">PPI: </th>
                            <td id="ppiStat<?php echo htmlspecialchars($i) ?>"></td>
                        </tr>
                    </table>
                </div>
                <div class="shopInfo">
                    <h3>Shopping Info</h3>
                    <table>
                        <tr>
                            <th>Manufacturer: </th>
                            <td>
                                <input type="text" name="brand<?php echo htmlspecialchars($i) ?>" list="monitorBrands" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getBrand()); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Model Name: </th>
                            <td><input type="text" name="model<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getModel()); ?>"></td>
                        </tr>
                        <tr>
                            <th>Cost: </th>
                            <td><input type="number" min="0.00" max="50000.00" step="0.01" name="cost<?php echo htmlspecialchars($i) ?>" id="cost<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getCost()); ?>"></td>
                        </tr>
                        <tr>
                            <th>Paste Link: </th>
                            <td><input type="text" name="link<?php echo htmlspecialchars($i) ?>" value="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getLink()); ?>"></td>
                        </tr>
                        <tr>
                            <?php if(isset($monitors[$i]) && $monitors[$i]->getLink() != NULL) { ?>
                            <td colspan="2" class="realLink">
                                <a href="<?php if(isset($monitors[$i])) echo htmlspecialchars($monitors[$i]->getLink()); ?>" target="_blank">Your Link To Monitor</a>
                            </td>
                            <?php } else { ?>
                            <td colspan="2"><a>Save a Link For This Monitor</a></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td colspan="2" class="realLink"><a id="search<?php echo htmlspecialchars($i) ?>">Search for This Monitor</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <?php } ?><br>
        <!-- End of For Loop to make all monitors sections -->


        <input type="submit" value="Save Monitors">
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['monitors'])) echo htmlspecialchars($confirmMsgs['monitors']); ?>
        </p>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['monitors'])) echo htmlspecialchars($errorMsgs['monitors']); ?>
        </p>
        <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
        <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
    </form><br>
    <p class="hint">Remember to save before going to another page!</p>
    <a href=".?action=viewPreferences" class="bottomNav" id="back">Back: Configure Preferences</a>
    <a href=".?action=viewPCParts" class="bottomNav" id="next">Next: Configure PC Parts</a>
</main>
<datalist id="monitorBrands">
    <option value="Apple">
    <option value="3M">
    <option value="Acer">
    <option value="Alienware">
    <option value="AOC">
    <option value="Asus">
    <option value="AOpen">
    <option value="AU Optronics">
    <option value="BenQ">
    <option value="Biostar">
    <option value="Chassis Plans">
    <option value="Foxconn">
    <option value="Compaq">
    <option value="Dell">
    <option value="Eizo">
    <option value="Fujitsu">
    <option value="Gateway">
    <option value="Hanns-G">
    <option value="HP">
    <option value="iZ3D">
    <option value="LaCie">
    <option value="Lenovo">
    <option value="LG">
    <option value="MAG Innovision">
    <option value="NEC">
    <option value="Philips">
    <option value="Planar">
    <option value="Samsung">
    <option value="Sceptre">
    <option value="Sharp">
    <option value="Shuttle">
    <option value="Sony">
    <option value="Tatung">
    <option value="ViewSonic">
    <option value="Zalman">
    <option value="zSpace">
</datalist>
<?php include("views/footer.php"); ?>
