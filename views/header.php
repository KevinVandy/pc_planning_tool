<!DOCTYPE html>
<html lang="en">

<head>
    <title>PC Setup Planning Tool -
        <?php echo $title ?>
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="../lib/css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/main.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <?php if(isset($title) && $title === 'Dashboard' || $title === 'Configure Preferences') { ?>
    <script src="../lib/js/jquery-3.3.1.min.js"></script>
    <script src="../lib/js/main.min.js" defer></script>
    <?php } ?>
    <?php if(isset($title) && $title === 'Configure Monitor Setup') { ?>
    <link rel="stylesheet" type="text/css" href="css/monitor.css">
    <script src="../lib/js/jquery-3.3.1.min.js"></script>
    <script src="../lib/js/jquery-ui.min.js"></script>
    <!--<script src="../lib/js/jquery.ui.touch-punch.min.js"></script>-->
    <script src="js/monitor.min.js" defer></script>
    <?php } ?>
    <?php if(isset($title) && $title === 'Configure PC Parts') { ?>
    <script src="../lib/js/jquery-3.3.1.min.js"></script>
    <script src="../lib/js/jquery-ui.min.js"></script>
    <script src="js/pcpart.min.js" defer></script>
    <?php } ?>
    <link rel="shortcut icon" href="../favicon.ico">
    <!-- Apply Settings for Always Show Extra Specs or Hide Tooltips -->
    <?php if(isset($user) && $user->getShowMoreSpecs() == 1 && $title != 'Dashboard') { ?>
        <style>.extraSpecs {display: block;}</style>
        <script>$(document).ready(function () { $(".toggle").html("-"); });</script>
    <?php } ?>
    <?php if(isset($user) && $user->getHideToolTips() == 1) { ?>
        <style>tooltip {display: none;}</style>
    <?php } ?>
</head>

<body>
    <nav>
        <?php include('../lib/views/nav_myProjects.php'); ?>
        <ul class="navRightGroup">
            <?php if(isLoggedIn()) { ?>
            <li class="dropdown-trigger"><a href=".?action=viewDashboard" id="hello">Hello <?php if(isset($_SESSION['username'])) echo htmlspecialchars($_SESSION['username']) ?></a>
                <ul class="dropdown-items" id="right">
                    <li><a href=".?action=viewDashboard">Dashboard</a></li>
                    <li><a href=".?action=logout">Log out</a></li>
                </ul>
            </li>
            <?php } else { ?>
            <li><a href=".?action=viewSignUp">Sign Up</a></li>
            <li><a href=".?action=viewLogin">Login</a></li>
            <?php } ?>
        </ul>
        <?php if(isLoggedIn() && isSetupLoaded()) { ?>
        <ul class="navCenterGroup">
            <li><a href=".?action=viewPreferences">Start</a></li>
            <li><a href=".?action=viewMonitors">Monitors</a></li>
            <li><a href=".?action=viewPCParts">PC</a></li>
        </ul>
        <?php } else if(isLoggedIn()) { ?>
        <ul class="navCenterGroup">
            <li>
                <a href=".?action=viewPreferences">Start New Setup</a>
            </li>
        </ul>
        <?php } ?>
    </nav>
    <header>
        <h1 <?php if($title == 'Configure Preferences' || $title == 'Configure Monitor Setup' || $title == 'Configure PC Parts') echo 'class="h1Left"'; ?>>
            <?php echo $title ?>
        </h1>
    </header>
