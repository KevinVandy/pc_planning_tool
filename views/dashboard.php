<?php
    $title = 'Dashboard';
    include("views/header.php");
?>
<main>
    <p class="confirmMsg">
        <?php if(isset($confirmMsgs['account'])) echo htmlspecialchars($confirmMsgs['account']); ?>
    </p>
    <section class="part">
        <h2>Open a Previous Setup</h2>
        <table class="dashboardSetups">
            <tr>
                <th></th>
                <th>Setup Name</th>
                <th>Budget</th>
                <th>Cost</th>
                <th></th>
            </tr>
            <?php
                    if(isset($setups) && $setups!= NULL)
                    {
                    foreach($setups as $setup)
                    {
                    ?>
            <tr>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="viewPreferences">
                        <input type="hidden" name="setupID" value="<?php echo htmlspecialchars($setup->getSetupID()); ?>">
                        <input type="submit" value="Open">
                    </form>
                </td>
                <td>
                    <?php echo htmlspecialchars($setup->getSetupName()); ?>
                </td>
                <td>$
                    <?php echo htmlspecialchars($setup->getBudget()); ?>
                </td>
                <td>$
                    <?php echo htmlspecialchars($setup->getMonitorsCost() + $setup->getPCPartsCost()); ?>
                </td>
                <td>
                    <form action="." method="post" onsubmit="return confirm('Are you sure you want to DELETE <?php echo htmlspecialchars($setup->getSetupName()); ?>?')">
                        <input type="hidden" name="action" value="deleteSetup">
                        <input type="hidden" name="setupID" value="<?php echo htmlspecialchars($setup->getSetupID()); ?>">
                        <input type="hidden" name="setupName" value="<?php echo htmlspecialchars($setup->getSetupName()); ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php
                    }
                    }
                    else
                    {
                    ?>
            <tr>
                <td colspan="5">You don't have any setups yet</td>
            </tr>
            <?php
                    }
                    ?>
        </table>
        <p class="confirmMsg">
            <?php if(isset($confirmMsgs['delete'])) echo htmlspecialchars($confirmMsgs['delete']); ?>
        </p>
        <h2>Or Start a New Setup</h2>
        <a href=".?action=viewPreferences"><button>Start a New Setup</button></a>
    </section>
    <section class="part">
        <h2>Change Account Settings</h2>
        <table>
            <form action="." method="post">
                <input type="hidden" name="action" value="changeSettings">
                <tr class="searchEngine">
                    <th>Change Search Engine: </th>
                    <td>
                        <select name="searchEngine">
                            <option value="Google" <?php if(isset($user) && $user->getSearchEngine() === "Google" ) echo htmlspecialchars("selected"); ?>>Google</option>
                            <option value="Bing" <?php if(isset($user) && $user->getSearchEngine() === "Bing" ) echo htmlspecialchars("selected"); ?>>Bing</option>
                            <option value="Duck Duck Go" <?php if(isset($user) && $user->getSearchEngine() === "Duck Duck Go" ) echo htmlspecialchars("selected"); ?>>Duck Duck Go</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="confirmMsg">
                        <?php if(isset($confirmMsgs['searchengine'])) echo htmlspecialchars($confirmMsgs['searchengine']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Always Show More Specs: </th>
                    <td><input type="checkbox" name="showMoreSpecs" value="1" <?php if(isset($user) && $user->getShowMoreSpecs() == 1) echo htmlspecialchars("checked"); ?>></td>
                </tr>
                <tr>
                    <td colspan="2" class="confirmMsg">
                        <?php if(isset($confirmMsgs['showmorespecs'])) echo htmlspecialchars($confirmMsgs['showmorespecs']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Hide all Tooltips <tooltip>(?)<tooltiptext>Gid rid of us!</tooltiptext>
                        </tooltip>: </th>
                    <td><input type="checkbox" name="hideToolTips" value="1" <?php if(isset($user) && $user->getHideToolTips() == 1) echo htmlspecialchars("checked"); ?>></td>
                </tr>
                <tr>
                    <td colspan="2" class="confirmMsg">
                        <?php if(isset($confirmMsgs['hidetooltips'])) echo htmlspecialchars($confirmMsgs['hidetooltips']); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Save Settings"></td>
                </tr>
            </form>
        </table>
    </section>
    <section class="part">
        <h2>Change Account Information</h2>
        <table class="accountInfo">
            <form action="." method="post">
                <input type="hidden" name="action" value="changeEmail">
                <tr>
                    <th>Change Email Address: </th>
                    <td><input type="email" name="newEmail" value="<?php if(isset($user)) echo htmlspecialchars($user->getEmail()); ?>"></td>
                </tr>
                <tr>
                    <td colspan="3" class="errorMsg">
                        <?php if(isset($errorMsgs['email'])) echo htmlspecialchars($errorMsgs['email']); ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update Email"></td>
                </tr>
                <tr>
                    <td colspan="3" class="confirmMsg">
                        <?php if(isset($confirmMsgs['email'])) echo htmlspecialchars($confirmMsgs['email']); ?>
                    </td>
                </tr>
            </form>
            <form action="." method="post">
                <input type="hidden" name="action" value="changePassword">
                <tr>
                    <th>Old Password: </th>
                    <td><input type="password" name="oldPassword"></td>
                </tr>
                <tr>
                    <td colspan="3" class="errorMsg">
                        <?php if(isset($errorMsgs['oldpassword'])) echo htmlspecialchars($errorMsgs['oldpassword']); ?>
                    </td>
                </tr>
                <tr>
                    <th>New Password: </th>
                    <td><input type="password" name="newPassword"></td>
                </tr>
                <tr>
                    <td colspan="3" class="errorMsg">
                        <?php if(isset($errorMsgs['newpassword'])) echo htmlspecialchars($errorMsgs['newpassword']); ?>
                    </td>
                </tr>
                <tr>
                    <th>Confirm New Password: </th>
                    <td><input type="password" name="newPasswordConfirm"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Change Password"></td>
                </tr>
                <tr>
                    <td colspan="3" class="confirmMsg">
                        <?php if(isset($confirmMsgs['password'])) echo htmlspecialchars($confirmMsgs['password']); ?>
                    </td>
                </tr>
            </form>
        </table>
        <h3>Delete Account <span class="toggle">+</span></h3>
        <div class="extraSpecs">
            <form action="." method="post" autocomplete="off" onsubmit="return confirm('Are you sure you want to DELETE your account?')">
                <input type="hidden" name="action" value="deleteAccount">
                <table>
                    <tr>
                        <th>
                            Confirm Password:
                        </th>
                        <td>
                            <input type="password" name="password" autocomplete="new-password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if(isset($errorMsgs['deleteaccount'])) echo htmlspecialchars($errorMsgs['deleteaccount']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="1">
                            <input type="submit" value="Delete Account">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</main>
<?php
    include("views/footer.php");
?>
