<?php
$title = 'Configure Preferences';
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
</aside>
<main class="mainLeft">
    <form action="." method="post" class="part" style="min-width: 450px">
        <h2>Set some Preferences and Constraints for your Setup</h2>
        <input type="hidden" name="action" value="savePreferences">
        <p class="question">
            Name This Setup
            <tooltip>?
                <tooltiptext>
                    You can start multiple setups from your account, so keep track of your setup with a simple name.
                </tooltiptext>
            </tooltip>
        </p>
        <label>Name: </label>
        <input type="text" name="setupName" maxlength="50" value="<?php echo htmlspecialchars($setup->getSetupName()); ?>" placeholder="My First Setup" required>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['setupname'])) echo htmlspecialchars($errorMsgs['setupname']); ?>
        </p>

        <p class="question">
            What is Your Budget?
            <tooltip>?
                <tooltiptext>
                    This tool will help you try to stay under budget while planning your pc build. You can adjust this value later if need be.
                </tooltiptext>
            </tooltip>
        </p>
        <label>Max Budget: </label>
        $<input type="number" min="0.00" max="1000000" step="1" name="budget" value="<?php echo htmlspecialchars($setup->getBudget()); ?>" required><br>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['budget'])) echo htmlspecialchars($errorMsgs['budget']); ?>
        </p>

        <p class="question">
            What Operating System Will You Install?
            <tooltip>?
                <tooltiptext>
                    Certain parts work better on either Windows, Mac, or Linux and this tool will make recommendations based on that. Windows operating systems are usually about $100, while Linux and other operating systems are usually free.
                </tooltiptext>
            </tooltip>
        </p>
        <label>OS: </label>
        <select name="os">
            <option value="Multi-Boot" <?php if($setup->getOS() === 'Multi-Boot') echo 'selected'; ?>>Multi-Boot</option>
            <optgroup label="Microsoft">
                <option value="Windows 10 Home" <?php if($setup->getOS() === 'Windows 10 Home') echo 'selected'; ?>>Windows 10 Home</option>
                <option value="Windows 10 Pro" <?php if($setup->getOS() === 'Windows 10 Pro') echo 'selected'; ?>>Windows 10 Pro</option>
                <option value="Windows 8" <?php if($setup->getOS() === 'Windows 8') echo 'selected'; ?>>Windows 8</option>
                <option value="Windows 7" <?php if($setup->getOS() === 'Windows 7') echo 'selected'; ?>>Windows 7</option>
            </optgroup>
            <optgroup label="Apple">
                <option value="MacOS" <?php if($setup->getOS() === 'MacOS') echo 'selected'; ?>>MacOS</option>
                <option value="Hackintosh" <?php if($setup->getOS() === 'Hackintosh') echo 'selected'; ?>>Hackintosh</option>
            </optgroup>
            <optgroup label="Linux">
                <option value="Debian" <?php if($setup->getOS() === 'Debian') echo 'selected'; ?>>Debian</option>
                <option value="Ubuntu" <?php if($setup->getOS() === 'Ubuntu') echo 'selected'; ?>>Ubuntu</option>
                <option value="KDE Neon" <?php if($setup->getOS() === 'KDE Neon') echo 'selected'; ?>>KDE Neon</option>
                <option value="Linux Mint" <?php if($setup->getOS() === 'Linux Mint') echo 'selected'; ?>>Linux Mint</option>
                <option value="Fedora" <?php if($setup->getOS() === 'Fedora') echo 'selected'; ?>>Fedora</option>
                <option value="Arch Linux" <?php if($setup->getOS() === 'Arch Linux') echo 'selected'; ?>>Arch</option>
                <option value="Antergos" <?php if($setup->getOS() === 'Antergos') echo 'selected'; ?>>Antergos</option>
                <option value="Manjaro" <?php if($setup->getOS() === 'Manjaro') echo 'selected'; ?>>Manjaro</option>
                <option value="OpenSUSE" <?php if($setup->getOS() === 'OpenSUSE') echo 'selected'; ?>>OpenSUSE</option>
                <option value="Solus" <?php if($setup->getOS() === 'Solus') echo 'selected'; ?>>Solus</option>
                <option value="Elementary OS" <?php if($setup->getOS() === 'Elementary OS') echo 'selected'; ?>>Elementary OS</option>
                <option value="Deepin" <?php if($setup->getOS() === 'Deepin') echo 'selected'; ?>>Deepin</option>
                <option value="Steam OS" <?php if($setup->getOS() === 'Steam OS') echo 'selected'; ?>>Steam OS</option>
                <option value="Slackware" <?php if($setup->getOS() === 'Slackware') echo 'selected'; ?>>Slackware</option>
                <option value="Other Linux Distro" <?php if($setup->getOS() === 'Other Linux Distro') echo 'selected'; ?>>Other Linux Distro</option>
            </optgroup>
            <optgroup label="Other">
                <option value="Chrome OS" <?php if($setup->getOS() === 'Chrome OS') echo 'selected'; ?>>Chrome OS</option>
                <option value="Fuchsia" <?php if($setup->getOS() === 'Fuchsia') echo 'selected'; ?>>Fuchsia</option>
                <option value="ReactOS" <?php if($setup->getOS() === 'ReactOS') echo 'selected'; ?>>ReactOS</option>
                <option value="Other" <?php if($setup->getOS() === 'Other') echo 'selected'; ?>>Other Operating System</option>
            </optgroup>
        </select><br>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['os'])) echo htmlspecialchars($errorMsgs['os']); ?>
        </p>

        <p class="question">
            Do you prefer an Intel or AMD CPU?
            <tooltip>?
                <tooltiptext>
                    Certain types of parts will work better with either an Intel or AMD CPU, and this tool will try to recommend the most compatible parts
                </tooltiptext>
            </tooltip>
        </p>
        <input type="radio" name="cpuPreference" value="Intel" <?php if($setup->getCPUPreference() === 'Intel') echo 'checked'; ?>><label>Intel</label>
        <input type="radio" name="cpuPreference" value="AMD" <?php if($setup->getCPUPreference() === 'AMD') echo 'checked'; ?>><label>AMD</label>
        <input type="radio" name="cpuPreference" value="No Preference" <?php if($setup->getCPUPreference() === 'No Preference') echo 'checked'; ?>><label>No Preference</label><br>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['cpupreference'])) echo htmlspecialchars($errorMsgs['cpupreference']); ?>
        </p>

        <p class="question">
            Do you prefer a NVIDIA or AMD GPU?
            <tooltip>?
                <tooltiptext>
                    Certain types of parts will work better with either a NVIDIA or AMD Graphics Card, and this tool will try to recommend the most compatible parts
                </tooltiptext>
            </tooltip>
        </p>
        <input type="radio" name="gpuPreference" value="NVIDIA" <?php if($setup->getGPUPreference() === 'NVIDIA') echo 'checked'; ?>><label>NVIDIA</label>
        <input type="radio" name="gpuPreference" value="AMD" <?php if($setup->getGPUPreference() === 'AMD') echo 'checked'; ?>><label>AMD</label>
        <input type="radio" name="gpuPreference" value="No Preference" <?php if($setup->getGPUPreference() === 'No Preference') echo 'checked'; ?>><label>No Preference</label><br>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['gpupreference'])) echo htmlspecialchars($errorMsgs['gpupreference']); ?>
        </p>

        <p class="question">
            What is the maximum width of your desk?
            <tooltip>?
                <tooltiptext>
                    This tool will keep track of the total width of your monitors and warn you if your desk space is too small.
                </tooltiptext>
            </tooltip>
        </p>
        <label>Max Desk Width: </label>
        <input type="number" min="2" max="30" step=".25" name="deskWidth" value="<?php echo htmlspecialchars($setup->getDeskWidth()); ?>">ft<br>
        <p class="errorMsg">
            <?php if(isset($errorMsgs['deskwidth'])) echo htmlspecialchars($errorMsgs['deskwidth']); ?>
        </p>

        <input type="submit" value="Save Preferences" id="save">
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['preference'])) echo htmlspecialchars($confirmMsgs['preference']); ?>
        </p>
        <input type="hidden" name="monitorsTotalCostHidden" class="monitorsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getMonitorsCost()); ?>">
        <input type="hidden" name="PCPartsTotalCostHidden" class="PCPartsTotalCostHidden" value="<?php if(isset($setup)) echo htmlspecialchars($setup->getPCPartsCost()); ?>">
    </form><br>
    <p class="hint">Remember to save before going to another page!</p>
    <a href=".?action=viewDashboard" class="bottomNav" id="back">Back: Go to Dashboard</a>
    <a href=".?action=viewMonitors" class="bottomNav" id="next">Next: Configure Monitors</a>
</main>
<?php
    include("views/footer.php");
?>
