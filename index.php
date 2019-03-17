<?php session_start();

//import classes
require_once('models/classes/user.php');
require_once('models/classes/setup.php');
require_once('models/classes/monitor.php');
require_once('models/classes/cpu.php');
require_once('models/classes/gpu.php');
require_once('models/classes/motherboard.php');
require_once('models/classes/ram.php');
require_once('models/classes/drive.php');
require_once('models/classes/psu.php');
require_once('models/classes/tower.php');

//import database function files
require_once('models/functions_db/db_connect.php');
require_once('models/functions_db/db_find.php');
require_once('models/functions_db/db_select.php');
require_once('models/functions_db/db_insert.php');
require_once('models/functions_db/db_update.php');
require_once('models/functions_db/db_delete.php');

//import validation function files
require_once('models/functions_val/val_session.php');
require_once('models/functions_val/val_account.php');
require_once('models/functions_val/val_part.php');
require_once('models/functions_val/val_attribute.php');
require_once('models/functions_val/val_data.php');

if (!isset($_SESSION['username'])) $_SESSION['username'] = NULL;

if (!isset($errorMsgs)) $errorMsgs = [];
if (!isset($confirmMsgs)) $confirmMsgs = [];

//look for action from POST first
$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) //if action was not in POST, look for it in GET. It should only be a function for viewing a page.
{
    $validGetActions = ['viewLogin', 'viewSignUp', 'viewDashboard', 'viewPreferences', 'viewMonitors', 'viewPCParts', 'logout']; //whitelisted actions that can be gotten to by GET
    $action = filter_input(INPUT_GET, 'action'); //action from get
    if(!in_array($action, $validGetActions)) $action = NULL; //sets action to null if the action by GET was not whitelisted
}  

if ($action === NULL && isLoggedIn()) $action = 'viewDashboard';    //default view for logged in user
if ($action === NULL) $action = 'viewLogin';                        //default view for user who is NOT logged in

switch ($action)
{
    case 'viewLogin': viewLogin:
        include('views/login.php');
        exit();
        break;

    case 'login':

        $usernameOrEmail = filter_input(INPUT_POST, 'usernameOrEmail');
        $password = filter_input(INPUT_POST, 'password');

        $errorMsgs['login'] = validateLogin($usernameOrEmail, $password);

        if ($errorMsgs['login'] != NULL)
        {
            logout();
            goto viewLogin;
        }
        else
        {
            $user = selectUser($usernameOrEmail);
            login($user->getUsername());
            $confirmMsgs['account'] = 'Welcome Back ' . $_SESSION['username'];
            goto viewDashboard;
        }
        break;

    case 'logout':

        logout();
        $confirmMsgs['login'] = 'You have been logged out';
        
        goto viewLogin;
        break;

    case 'viewSignUp': viewSignUp:

        include('views/signup.php');
        break;

    case 'signUp':

        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');

        $errorMsgs = validateSignUp($username, $email, $password, $passwordConfirm);

        if($errorMsgs['signup'] === NULL) //if there were any errorMsgs then ['signup'] also gets set
        {
            if($email == "") $email = NULL;
            $user = new User($username, $email, hashPassword($password), NULL, NULL, NULL);
            insertUser($user);
            login($user->getUsername());
            $confirmMsgs['account'] = 'Congratulations ' . $_SESSION['username'] . ', Your Account has Successfuly been Created!';
            goto viewDashboard;
        }
        else
        {
            goto viewSignUp;
        }

        break;

    case 'viewDashboard': viewDashboard:
        if(isLoggedIn())
        {
            if(isset($_SESSION['setupID'])) $_SESSION['setupID'] = NULL; //if you are on the dashboard, you are no longer actively editing a setup, so setup is set to null
            $user = selectUser($_SESSION['username']);
            $setups = selectSetupsForUser($_SESSION['username']);
            include('views/dashboard.php');
        }
        else
        {
            $errorMsgs['login'] = 'You cannot view your Dashboard until you log in or create an account.';
            goto viewLogin;
        }
        exit();
        break;

    case 'deleteSetup':

        $setupID = filter_input(INPUT_POST, 'setupID');
        $setupName = filter_input(INPUT_POST, 'setupName');

        deleteSetup($_SESSION['username'], $setupID, $setupName); //only deletes setups for logged in users' account because of 'and' condition in deleteSetup
        $confirmMsgs['delete'] = 'Your Setup "' . $setupName . '" has been deleted';

        goto viewDashboard;
        break;

    case 'changeEmail':

        $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_VALIDATE_EMAIL);
        $errorMsgs['email'] = validateEmail($newEmail);

        if($errorMsgs['email'] === NULL)
        {
            updateEmail($_SESSION['username'], $newEmail);
            $confirmMsgs['email'] = 'Your email was changed';
        }
        else
        {
            $deleteEmail = filter_input(INPUT_POST, 'newEmail');
            if($deleteEmail == "" || $deleteEmail == NULL)
            {
                updateEmail($_SESSION['username'], NULL);
                $errorMsgs['email'] = NULL;
                $confirmMsgs['email'] = 'Your Email address was deleted';
            }
        }

        goto viewDashboard;
        break;

    case 'changePassword':

        $oldPassword = filter_input(INPUT_POST, 'oldPassword');
        $newPassword = filter_input(INPUT_POST, 'newPassword');
        $newPasswordConfirm = filter_input(INPUT_POST, 'newPasswordConfirm');

        $errorMsgs['oldpassword'] = validateLogin($_SESSION['username'], $oldPassword);
        $errorMsgs['newpassword'] = validatePassword($newPassword, $newPasswordConfirm);

        if($errorMsgs['oldpassword'] === NULL && $errorMsgs['newpassword'] === NULL)
        {
            updatePassword($_SESSION['username'], hashPassword($newPassword));
            $confirmMsgs['password'] = 'Your Password Was Succesfully Changed';
        }

        goto viewDashboard;
        break;

    case 'changeSettings':

        $searchEngine = filter_input(INPUT_POST, 'searchEngine');
        $showMoreSpecs = filter_input(INPUT_POST, 'showMoreSpecs');
        $hideToolTips = filter_input(INPUT_POST, 'hideToolTips');
        
        if($showMoreSpecs != "") 
        {
            $showMoreSpecs = TRUE;
            $confirmMsgs['showmorespecs'] = 'More Specs will be expanded by default';
        } 
        else $showMoreSpecs = FALSE;
        
        if($hideToolTips != "") 
        {
            $hideToolTips = TRUE;
            $confirmMsgs['hidetooltips'] = 'All Tooltips will now be hidden';
        } 
        else $hideToolTips = FALSE;
        
        $errorMsgs['searchengine'] = validateSearchEngine($searchEngine);
        
        
        if($errorMsgs['searchengine'] === NULL)
        {
            updateSearchEngine($_SESSION['username'], $searchEngine);
            $confirmMsgs['searchengine'] = $searchEngine . ' is now your default search engine';
        }

        updateShowMoreSpecs($_SESSION['username'], $showMoreSpecs);
        updateHideToolTips($_SESSION['username'], $hideToolTips);
        
        goto viewDashboard;
        break;
        
    case 'deleteAccount':
        
        $password = filter_input(INPUT_POST, 'password');

        $errorMsgs['deleteaccount'] = validateLogin($_SESSION['username'], $password);

        if ($errorMsgs['deleteaccount'] != NULL)
        {
            echo '<script>alert("Error: Could NOT Delete Account Because Your Password was Incorrect");</script>';
            goto viewDashboard;
        }
        else
        {
            deleteUser($_SESSION['username']);
            $confirmMsgs['deleteaccount'] = 'Your Account has been deleted';
            logout();
            goto viewSignUp;
        }
        
        break;
        
    case 'viewPreferences': viewPreferences:

        if(isLoggedIn())
        {
            $setupID = filter_input(INPUT_POST, 'setupID');
            if($setupID === NULL) $setupID = $_SESSION['setupID'];
            $_SESSION['setupID'] = $setupID;

            $user = selectUser($_SESSION['username']);
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);

            if($setupID === NULL)
            {
                $setup = new Setup(NULL, $_SESSION['username'], '', 0, NULL, NULL, 'Windows 10 Home', 'No Preference', 'No Preference', 5, 14);
            }
            include('views/configure_preferences.php');
            exit();
        }
        else
        {
            $errorMsgs['login'] = 'You cannot view this Page until you log in or create an account.';
            goto viewLogin;
        }

        break;

    case 'savePreferences':

        if(isset($_SESSION['setupID']) && $_SESSION['setupID'] != NULL) $setupID = $_SESSION['setupID']; //if this setup is already loaded in session, get id from there
        else $setupID = NULL; //This will trigger a new setup to be created in database instead of updating an old one
        $_SESSION['setupID'] = $setupID; //make sure these two are equal and set

        $setupName = filter_input(INPUT_POST, 'setupName');
        $budget = filter_input(INPUT_POST, 'budget', FILTER_VALIDATE_FLOAT);
        $os = filter_input(INPUT_POST, 'os');
        $cpuPreference = filter_input(INPUT_POST, 'cpuPreference');
        $gpuPreference = filter_input(INPUT_POST, 'gpuPreference');
        $deskWidth = filter_input(INPUT_POST, 'deskWidth');
        $totalMonitorsCost = filter_input(INPUT_POST, 'monitorsTotalCostHidden', FILTER_VALIDATE_FLOAT);
        $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);

        $errorMsgs = validatePreferences($_SESSION['username'], $setupName, $budget, $os, $cpuPreference, $gpuPreference, $deskWidth);

        $setup = new Setup($setupID, $_SESSION['username'], $setupName, $budget, $totalMonitorsCost, $totalPCPartsCost, $os, $cpuPreference, $gpuPreference, $deskWidth, NULL);

        if(isArrayNull($errorMsgs) && $setupID === NULL)
        {
            $_SESSION['setupID'] = insertSetup($setup); //returns autogenerated key from database
            $confirmMsgs['preference'] = 'You have started a new setup: "' . $setupName . '"';
        }
        else if(isArrayNull($errorMsgs) && $setupID != NULL)
        {
            updateSetup($_SESSION['username'], $setup);
            $confirmMsgs['preference'] = 'Your Preferences for "' . $setupName . '" have been saved';
        }

        goto viewPreferences;
        break;

    case 'viewMonitors': viewMonitors:
        if(isLoggedIn() && isSetupLoaded())
        {
            $user = selectUser($_SESSION['username']);
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']); //also makes sure the setup is only for the logged in user
            $_SESSION['setupID'] = $setup->getSetupID(); //makes sure the session variable is set to the same valid setupID

            $monitors = array();
            $monitorsDB = selectMonitors($setup->getSetupID()); //select monitors from the database

            if($setup->getSCALE() == NULL) $setup->setSCALE(15);
            $maxNumMonitors = 9;
            if($monitorsDB != NULL) $numMonitors = count($monitorsDB);
            else $numMonitors = 0;

            //set default values for all monitors, database values may replace these
            for($i = 1; $i <= $maxNumMonitors; $i++) //for all 9 potential monitors
            {
                $monitorNumInSetup = $i;
                $diagonal = 24;
                $units = 'in';
                $bezelWidth = 1.00;
                $orientation = 'landscape';
                $aspectRatioType = '16:9';
                $resolutionType = 'FHD';
                $horizontalResolution = NULL; //js will calculate since it's not custom
                $verticalResolution = NULL;   //js will calculate since it's not custom
                $hdr = FALSE;
                $srgb = FALSE;
                $curved = FALSE;
                $touch = FALSE;
                $webcam = FALSE;
                $speakers = FALSE;
                $displayType = 'any';
                $syncType = 'any';
                $refreshRate = 'any';
                $responseTime = NULL;
                $vga = FALSE;
                $dvi = FALSE;
                $hdmi = FALSE;
                $displayPort = FALSE;
                $brand = NULL;
                $model = NULL;
                $cost = NULL;
                $link = NULL;

                $monitors[$i] = new Monitor(NULL, $_SESSION['setupID'], $monitorNumInSetup, $diagonal, $units, $bezelWidth, $orientation, $aspectRatioType, $resolutionType, $horizontalResolution, $verticalResolution, $hdr, $srgb, $curved, $touch, $webcam, $speakers, $displayType, $syncType, $refreshRate, $responseTime, $vga, $dvi, $hdmi, $displayPort, $brand, $model, $cost, $link);
            }

            //overwrite monitors with database
            for($i = 0; $i < $numMonitors; $i++)
            {
                $monitors[$i+1] = $monitorsDB[$i]; //the monitors on the webpage have arrays start at 1 to make it simpler... kind of...
            }

            include('views/configure_monitors.php');
            exit();
        }
        else
        {
            $errorMsgs['login'] = 'You cannot view your Dashboard until you log in or create an account.';
            goto viewLogin;
        }

        break;

    case 'saveMonitors':

        $setupID = $_SESSION['setupID'];
        $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']); //also makes sure the setup is only for the logged in user
        $numMonitors = filter_input(INPUT_POST, 'numMonitors', FILTER_VALIDATE_INT);
        if($numMonitors === FALSE || $numMonitors < 0 || $numMonitors > 16) $numMonitors = 0; //quick validation

        //get info from the page to save for just the monitors that are shown -- ? The arrays for the temp vars are unnessesary?
        for ($i = 1; $i <= $numMonitors; $i++)
        {
            $monitorNumInSetup = $i;
            $diagonal = filter_input(INPUT_POST, 'diagonal' . $i, FILTER_VALIDATE_FLOAT);
            $units = filter_input(INPUT_POST, 'units' . $i);
            $bezelWidth = filter_input(INPUT_POST, 'bezelWidth' . $i, FILTER_VALIDATE_FLOAT);
            $orientation = filter_input(INPUT_POST, 'orientation' . $i);
            $aspectRatioType = filter_input(INPUT_POST, 'aspectRatioType' . $i);
            $resolutionType = filter_input(INPUT_POST, 'resolutionType' . $i);
            $horizontalResolution = filter_input(INPUT_POST, 'horRes' . $i, FILTER_VALIDATE_INT); //only if custom, else null because disabled
            $verticalResolution = filter_input(INPUT_POST, 'verRes' . $i, FILTER_VALIDATE_INT); //only if custom, else null because disabled
            $hdr = filter_input(INPUT_POST, 'hdr' . $i);
            $srgb = filter_input(INPUT_POST, 'srgb' . $i);
            $curved = filter_input(INPUT_POST, 'curved' . $i);
            $touch = filter_input(INPUT_POST, 'touch' . $i);
            $webcam = filter_input(INPUT_POST, 'webcam' . $i);
            $speakers = filter_input(INPUT_POST, 'speakers' . $i);
            $displayType = filter_input(INPUT_POST, 'displayType' . $i);
            $syncType = filter_input(INPUT_POST, 'syncType' . $i);
            $refreshRate = filter_input(INPUT_POST, 'refreshRate' . $i);
            $responseTime = filter_input(INPUT_POST, 'responseTime' . $i, FILTER_VALIDATE_INT);
            $vga = filter_input(INPUT_POST, 'vga' . $i);
            $dvi = filter_input(INPUT_POST, 'dvi' . $i);
            $hdmi = filter_input(INPUT_POST, 'hdmi' . $i);
            $displayPort = filter_input(INPUT_POST, 'displayPort' . $i);
            $brand = filter_input(INPUT_POST, 'brand' . $i);
            $model = filter_input(INPUT_POST, 'model' . $i);
            $cost = filter_input(INPUT_POST, 'cost' . $i, FILTER_VALIDATE_FLOAT);
            $link = filter_input(INPUT_POST, 'link' . $i);

            if($hdr != NULL) $hdr = TRUE;
            if($srgb != NULL) $srgb = TRUE;
            if($curved != NULL) $curved = TRUE;
            if($touch != NULL) $touch = TRUE;
            if($webcam != NULL) $webcam = TRUE;
            if($speakers != NULL) $speakers = TRUE;
            if($vga != NULL) $vga = TRUE;
            if($dvi != NULL) $dvi = TRUE;
            if($hdmi != NULL) $hdmi = TRUE;
            if($displayPort != NULL) $displayPort = TRUE;


            //put all the variables into a Monitor object, put that monitor object in the array of monitors at index $i
            $monitors[$i] = new Monitor(NULL, $setupID, $monitorNumInSetup, $diagonal, $units, $bezelWidth, $orientation, $aspectRatioType, $resolutionType, $horizontalResolution, $verticalResolution, $hdr, $srgb, $curved, $touch, $webcam, $speakers, $displayType, $syncType, $refreshRate, $responseTime, $vga, $dvi, $hdmi, $displayPort, $brand, $model, $cost, $link);
        }

        //validate the monitor info for each monitor, but only if there are monitors to check
        if(isset($monitors))
        {
            foreach($monitors as $monitor)
            {
                $errorMsgs = validateMonitor($monitor);
                if(!isArrayNull($errorMsgs)) break;
            }
        }

        if(isArrayNull($errorMsgs))
        {
            deleteMonitors($_SESSION['setupID']); //deletes any monitors so that the new setup takes it place, no update function needed
            $confirmMsgs['monitors'] = 'Your Monitor Setup is now empty';
            if(isset($monitors))
            {
                foreach($monitors as $monitor)
                {
                    $monitorID[$i] = insertMonitor($monitor);
                }
                $confirmMsgs['monitors'] = 'Your Monitor Setup was Saved';
            }
            
            //now save the total cost of the monitors to the setups table
            $totalMonitorsCost = filter_input(INPUT_POST, 'monitorsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            $setup->setMonitorsCost($totalMonitorsCost);

            //now also save the scale
            $SCALE = filter_input(INPUT_POST, 'SCALE', FILTER_VALIDATE_INT);
            $setup->setSCALE($SCALE);

            updateSetup($_SESSION['username'], $setup);
            
        }
        else
        {
            $errorMsgs['monitors'] = 'There Was a problem saving your Monitor Setup';
        }

        goto viewMonitors;
        break;

    case 'viewPCParts': viewPCParts:
        if(isLoggedIn() && isSetupLoaded())
        {
            $user = selectUser($_SESSION['username']);

            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']); //the select statement makes sure the setup is only for the logged in user
            $_SESSION['setupID'] = $setup->getSetupID(); //makes sure the session variable is set to the same valid setupID

            //only from verified setup from line above
            $cpu = selectCPU($_SESSION['setupID']);
            $gpu = selectGPU($_SESSION['setupID']);
            $motherboard = selectMotherboard($_SESSION['setupID']);
            $ram = selectRAM($_SESSION['setupID']);

            $drivesDB = selectDrives($_SESSION['setupID']);
            $drives = array();
            $maxNumDrives = 5;
            $numDrives;
            if($drivesDB != NULL) $numDrives = count($drivesDB);
            else $numDrives = 0;
            for($i = 0; $i < $numDrives; $i++)
            {
                $drives[$i+1] = $drivesDB[$i]; //the drives on the webpage have arrays start at 1 to make it simpler... kind of...
            }
            if($numDrives == 0) $numDrives = 1; //makes sure at least 1 blank drive shows on the page

            $psu = selectPSU($_SESSION['setupID']);
            $case = selectCase($_SESSION['setupID']);

            include('views/configure_pcparts.php');
            exit();
        }
        else
        {
            $errorMsgs['login'] = 'You cannot view this page until you log in or create an account.';
            goto viewLogin;
        }

        break;

    case 'saveCPU':

        $cpuID = filter_input(INPUT_POST, 'cpuID');
        $manufacturer = filter_input(INPUT_POST, 'cpuManufacturer');
        $codeName = filter_input(INPUT_POST, 'cpuCodeName');
        $family = filter_input(INPUT_POST, 'cpuFamily');
        $modelName = filter_input(INPUT_POST, 'cpuModelName');
        $cost = filter_input(INPUT_POST, 'cpuCost', FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'cpuLink');
        $numberCores = filter_input(INPUT_POST, 'cpuNumberCores', FILTER_VALIDATE_INT);
        $numberTheads = filter_input(INPUT_POST, 'cpuNumberThreads', FILTER_VALIDATE_INT);
        $clockSpeed = filter_input(INPUT_POST, 'cpuClockSpeed', FILTER_VALIDATE_FLOAT);
        $overclock = filter_input(INPUT_POST, 'cpuOverclock');
        $wattage = filter_input(INPUT_POST, 'cpuWattage', FILTER_VALIDATE_INT);

        if($overclock != NULL) $overclock = TRUE;

        $cpu = new CPU($cpuID, $_SESSION['setupID'], $manufacturer, $codeName, $family, $modelName, $cost, $link, $numberCores, $numberTheads, $clockSpeed, $overclock, $wattage);

        $errorMsgs = validateCPU($cpu);

        if(isArrayNull($errorMsgs))
        {
            if ($cpuID === "") //insert a new cpu record if it is new
            {
                $cpuID = insertCPU($cpu);
                $confirmMsgs['cpu'] = 'Your CPU Information was Created';
            }
            else //update the cpu if it is modifying an already made cpu record
            {
                updateCPU($cpu);
                $confirmMsgs['cpu'] = 'Your CPU Information was Saved';
            }
            
            //now save the total cost of the monitors to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            $setup->setCPUPreference($cpu->getManufacturer()); //updates the preference automatically if the user changed their mind
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['cpu'] = 'There was a problem saving your CPU Information';
        }

        goto viewPCParts;
        break;

    case 'deleteCPU':

        $cpuID = filter_input(INPUT_POST, 'deleteCPUID', FILTER_VALIDATE_INT);
        deleteCPU($_SESSION['setupID'], $cpuID);
        $confirmMsgs['cpu'] = 'CPU was successfully deleted';

        goto viewPCParts;
        break;

    case 'saveGPU':

        $gpuID = filter_input(INPUT_POST, 'gpuID');
        $manufacturer = filter_input(INPUT_POST, 'gpuManufacturer');
        $codeName = filter_input(INPUT_POST, 'gpuCodeName');
        $series = filter_input(INPUT_POST, 'gpuSeries');
        $modelName = filter_input(INPUT_POST, 'gpuModelName');
        $cost = filter_input(INPUT_POST, 'gpuCost', FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'gpuLink');
        $vram = filter_input(INPUT_POST, 'gpuVRAM', FILTER_VALIDATE_FLOAT);
        $clockSpeed = filter_input(INPUT_POST, 'gpuClockSpeed', FILTER_VALIDATE_FLOAT);
        $overclock = filter_input(INPUT_POST, 'gpuOverclock');
        $wattage = filter_input(INPUT_POST, 'gpuWattage', FILTER_VALIDATE_INT);
        $vga = filter_input(INPUT_POST, 'gpuVGA');
        $dvi = filter_input(INPUT_POST, 'gpuDVI');
        $hdmi = filter_input(INPUT_POST, 'gpuHDMI');
        $displayPort = filter_input(INPUT_POST, 'gpuDisplayPort');

        //force values to be boolean true or NULL(false) in database
        if($overclock != NULL) $overclock = TRUE;
        if($vga != NULL) $vga = TRUE;
        if($dvi != NULL) $dvi = TRUE;
        if($hdmi != NULL) $hdmi = TRUE;
        if($displayPort != NULL) $displayPort = TRUE;

        $gpu = new GPU($gpuID, $_SESSION['setupID'], $manufacturer, $codeName, $series, $modelName, $cost, $link, $vram, $clockSpeed, $overclock, $wattage, $vga, $dvi, $hdmi, $displayPort);

        $errorMsgs = validateGPU($gpu);

        if(isArrayNull($errorMsgs))
        {
            if($gpuID === "") //if the gpu does not have an id create it in the database
            {
                $gpuID = insertGPU($gpu);
                $confirmMsgs['gpu'] = 'Your GPU Information was Created';
            }
            else  //if the gpu does have an id, just update the info
            {
                updateGPU($gpu);
                $confirmMsgs['gpu'] = 'Your GPU Information was Saved';
            }
            
            //now save the total cost of the monitors to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            $setup->setGPUPreference($gpu->getManufacturer()); //updates the preference automatically if the user changed their mind
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['gpu'] = 'There was a problem saving your GPU Information';
        }

        goto viewPCParts;
        break;

    case 'deleteGPU':

        $gpuID = filter_input(INPUT_POST, 'deleteGPUID', FILTER_VALIDATE_INT);
        deleteGPU($_SESSION['setupID'], $gpuID);
        $confirmMsgs['gpu'] = 'GPU was successfully deleted';

        goto viewPCParts;
        break;

    case 'saveMotherboard':

        $motherboardID = filter_input(INPUT_POST, 'motherboardID');
        $manufacturer = filter_input(INPUT_POST, 'motherboardManufacturer');
        $modelName = filter_input(INPUT_POST, 'motherboardModelName');
        $formFactor = filter_input(INPUT_POST, 'motherboardFormFactor');
        $cost = filter_input(INPUT_POST, 'motherboardCost', FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'motherboardLink');
        $wattage = filter_input(INPUT_POST, 'motherboardWattage');
        $chipset = filter_input(INPUT_POST, 'motherboardChipset');
        $socket = filter_input(INPUT_POST, 'motherboardSocket');
        $maxRAM = filter_input(INPUT_POST, 'motherboardMaxRAM', FILTER_VALIDATE_INT);
        $RAMType = filter_input(INPUT_POST, 'motherboardRAMType');
        $expansionSlots = filter_input(INPUT_POST, 'motherboardExpansionSlots');
        $storageDevices = filter_input(INPUT_POST, 'motherboardStorageDevices');
        $ports = filter_input(INPUT_POST, 'motherboardPorts');

        $motherboard = new Motherboard($motherboardID, $_SESSION['setupID'], $manufacturer, $modelName, $formFactor, $cost, $link, $wattage, $chipset, $socket, $maxRAM, $RAMType, $expansionSlots, $storageDevices, $ports);

        $errorMsgs = validateMotherboard($motherboard);

        if(isArrayNull($errorMsgs))
        {
            if($motherboardID === "") //if the gpu does not have an id create it in the database
            {
                $motherboardID = insertMotherboard($motherboard);
                $confirmMsgs['motherboard'] = 'Your Motherboard Information was Created';
            }
            else  //if the gpu does have an id, just update the info
            {
                updateMotherboard($motherboard);
                $confirmMsgs['motherboard'] = 'Your Motherboard Information was Saved';
            }
            
            //now save the total cost of the monitors to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['motherboard'] = 'There was a problem saving your Motherboard Information';
        }

        goto viewPCParts;
        break;
        
    case 'deleteMotherboard':

        $motherboardID = filter_input(INPUT_POST, 'deleteMotherboardID', FILTER_VALIDATE_INT);
        deleteMotherboard($_SESSION['setupID'], $motherboardID);
        $confirmMsgs['motherboard'] = 'Motherboard was successfully deleted';

        goto viewPCParts;
        break;

    case 'saveRAM':

        $ramID = filter_input(INPUT_POST, 'ramID');
        $manufacturer = filter_input(INPUT_POST, 'ramManufacturer');
        $modelName = filter_input(INPUT_POST, 'ramModelName');
        $RAMType = filter_input(INPUT_POST, 'ramType');
        $cost = filter_input(INPUT_POST, 'ramCost', FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'ramLink');
        $ecc = filter_input(INPUT_POST, 'ramECC');
        $capacity = filter_input(INPUT_POST, 'ramCapacity', FILTER_VALIDATE_FLOAT);
        $numSticks = filter_input(INPUT_POST, 'numRamSticks', FILTER_VALIDATE_FLOAT);
        $clockSpeed = filter_input(INPUT_POST, 'ramClockSpeed', FILTER_VALIDATE_FLOAT);
        $voltage = filter_input(INPUT_POST, 'ramVoltage');
        $wattage = filter_input(INPUT_POST, 'ramWattage', FILTER_VALIDATE_INT);

        //force values to be boolean true or NULL(false) in database
        if($ecc != NULL) $ecc = TRUE;

        $ram = new RAM($ramID, $_SESSION['setupID'], $manufacturer, $modelName, $RAMType, $cost, $link, $ecc, $capacity, $numSticks, $clockSpeed, $voltage, $wattage);

        $errorMsgs = validateRAM($ram);

        if(isArrayNull($errorMsgs))
        {
            if($ramID === "") //if the ram does not have an id create it in the database
            {
                $ramID = insertRAM($ram);
                $confirmMsgs['ram'] = 'Your RAM Information was Created';
            }
            else  //if the ram does have an id, just update the info
            {
                updateRAM($ram);
                $confirmMsgs['ram'] = 'Your RAM Information was Saved';
            }

            //now save the total cost of the pc parts to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['ram'] = 'There was a problem saving your RAM Information';
        }

        goto viewPCParts;
        break;
        
    case 'deleteRAM':

        $ramID = filter_input(INPUT_POST, 'deleteRAMID', FILTER_VALIDATE_INT);
        deleteRAM($_SESSION['setupID'], $ramID);
        $confirmMsgs['ram'] = 'RAM was successfully deleted';

        goto viewPCParts;
        break;

    case 'saveDrive': //this only saves one drive, it knows which one to save from the $i variable

        $i = filter_input(INPUT_POST, 'numInSetup', FILTER_VALIDATE_INT); //so that this save method gets info from the right names of the drive to be saved

        $driveID = filter_input(INPUT_POST, 'driveID' . $i);
        $manufacturer = filter_input(INPUT_POST, 'driveManufacturer' . $i);
        $modelName = filter_input(INPUT_POST, 'driveModelName' . $i);
        $driveType = filter_input(INPUT_POST, 'driveType' . $i);
        $capacity = filter_input(INPUT_POST, 'driveCapacity' . $i, FILTER_VALIDATE_INT);
        $cost = filter_input(INPUT_POST, 'driveCost' . $i, FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'driveLink' . $i);
        $formFactor = filter_input(INPUT_POST, 'driveFormFactor' . $i);
        $interface = filter_input(INPUT_POST, 'driveInterface' . $i);
        $rpm = filter_input(INPUT_POST, 'driveRPM' . $i, FILTER_VALIDATE_INT);
        $readSpeed = filter_input(INPUT_POST, 'driveReadSpeed' . $i, FILTER_VALIDATE_INT);
        $writeSpeed = filter_input(INPUT_POST, 'driveWriteSpeed' . $i, FILTER_VALIDATE_INT);
        $wattage = filter_input(INPUT_POST, 'driveWattage' . $i, FILTER_VALIDATE_INT);

        $drive = new Drive($driveID, $_SESSION['setupID'], $manufacturer, $modelName, $driveType, $capacity, $cost, $link, $formFactor, $interface, $rpm, $readSpeed, $writeSpeed, $wattage);

        $errorMsgs = validateDrive($drive);

        if(isArrayNull($errorMsgs))
        {
            if($driveID === "") //if the ram does not have an id create it in the database
            {
                $driveID = insertDrive($drive);
                $confirmMsgs['drive'] = 'Your Drive Information was Created';
            }
            else  //if the ram does have an id, just update the info
            {
                updateDrive($drive);
                $confirmMsgs['drive'] = 'Your Drive Information was Saved';
            }

            //now save the total cost of the pc parts to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['drive'] = 'There was a problem saving your Drive Information';
        }

        goto viewPCParts;
        break;

    case 'deleteDrive':

        $driveID = filter_input(INPUT_POST, 'deleteDriveID', FILTER_VALIDATE_INT);
        deleteDrive($_SESSION['setupID'], $driveID);
        $confirmMsgs['drive'] = 'Drive was successfully deleted';

        goto viewPCParts;
        break;

    case 'savePSU':

        $psuID = filter_input(INPUT_POST, 'psuID');
        $manufacturer = filter_input(INPUT_POST, 'psuManufacturer');
        $modelName = filter_input(INPUT_POST, 'psuModelName');
        $maxPower = filter_input(INPUT_POST, 'psuMaxPower', FILTER_VALIDATE_INT);
        $cost = filter_input(INPUT_POST, 'psuCost', FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'psuLink');
        $certification = filter_input(INPUT_POST, 'psuCertification');
        $outputs = filter_input(INPUT_POST, 'psuOutputs');
        $connectors = filter_input(INPUT_POST, 'psuConnectors');

        $psu = new PSU($psuID, $_SESSION['setupID'], $manufacturer, $modelName, $maxPower, $cost, $link, $certification, $outputs, $connectors);

        $errorMsgs = validatePSU($psu);

        if(isArrayNull($errorMsgs))
        {
            if($psuID === "") //if the psu does not have an id create it in the database
            {
                $psuID = insertPSU($psu);
                $confirmMsgs['psu'] = 'Your PSU Information was Created';
            }
            else  //if the gpu does have an id, just update the info
            {
                updatePSU($psu);
                $confirmMsgs['psu'] = 'Your PSU Information was Saved';
            }

            //now save the total cost of the pc parts to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['psu'] = 'There was a problem saving your PSU Information';
        }

        goto viewPCParts;
        break;

    case 'deletePSU':

        $psuID = filter_input(INPUT_POST, 'deletePSUID', FILTER_VALIDATE_INT);
        deletePSU($_SESSION['setupID'], $psuID);
        $confirmMsgs['psu'] = 'Power Supply was successfully deleted';

        goto viewPCParts;
        break;
        
    case 'saveCase':

        $caseID = filter_input(INPUT_POST, 'caseID');
        $manufacturer = filter_input(INPUT_POST, 'caseManufacturer');
        $modelName = filter_input(INPUT_POST, 'caseModelName');
        $formFactor = filter_input(INPUT_POST, 'caseFormFactor');
        $cost = filter_input(INPUT_POST, 'caseCost', FILTER_VALIDATE_FLOAT);
        $link = filter_input(INPUT_POST, 'caseLink');
        $diminsions = filter_input(INPUT_POST, 'caseDiminsions');
        $material = filter_input(INPUT_POST, 'caseMaterial');
        $color = filter_input(INPUT_POST, 'caseColor');
        $expansions = filter_input(INPUT_POST, 'caseExpansions');
        $ports = filter_input(INPUT_POST, 'casePorts');
        $fanOptions = filter_input(INPUT_POST, 'caseFanOptions');
        $features = filter_input(INPUT_POST, 'caseFeatures');

        $case = new Tower($caseID, $_SESSION['setupID'], $manufacturer, $modelName, $formFactor, $cost, $link, $diminsions, $material, $color, $expansions, $ports, $fanOptions, $features);

        $errorMsgs = validateCase($case);

        if(isArrayNull($errorMsgs))
        {
            if($caseID === "") //if the case does not have an id create it in the database
            {
                $caseID = insertCase($case);
                $confirmMsgs['case'] = 'Your Case Information was Created';
            }
            else  //if the case does have an id, just update the info
            {
                updateCase($case);
                $confirmMsgs['case'] = 'Your Case Information was Saved';
            }

            //now save the total cost of the monitors to the database
            $setup = selectSetup($_SESSION['username'], $_SESSION['setupID']);
            $totalPCPartsCost = filter_input(INPUT_POST, 'PCPartsTotalCostHidden', FILTER_VALIDATE_FLOAT);
            if($totalPCPartsCost != NULL && $totalPCPartsCost != FALSE) $setup->setPCPartsCost($totalPCPartsCost);
            updateSetup($_SESSION['username'], $setup);

        }
        else
        {
            $errorMsgs['case'] = 'There was a problem saving your Case Information';
        }

        goto viewPCParts;
        break;
        
    case 'deleteCase':

        $caseID = filter_input(INPUT_POST, 'deleteCaseID', FILTER_VALIDATE_INT);
        deleteCase($_SESSION['setupID'], $caseID);
        $confirmMsgs['case'] = 'Case was successfully deleted';

        goto viewPCParts;
        break;

}

?>
