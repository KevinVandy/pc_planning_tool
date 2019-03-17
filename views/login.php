<?php
    $title = 'Log In';
    include("views/header.php");
?>
        <main>
            <section>
                <form action="." method="post" autocomplete="on">
                    <input type="hidden" name="action" value="login">
                    <table>
                        <tr>
                            <th>Username or Email: </th>
                            <td><input type="text" name="usernameOrEmail" value="<?php if(isset($usernameOrEmail)) echo htmlspecialchars($usernameOrEmail) ?>" required autofocus></td>
                        </tr>
                        <tr>
                            <th>Password: </th>
                            <td><input type="password" name="password" minlength="8" maxlength="60" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['login'])) echo htmlspecialchars($errorMsgs['login']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="confirmMsg">
                                <?php if(isset($confirmMsgs['login'])) echo htmlspecialchars($confirmMsgs['login']) ?>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Login">
                </form>
            </section>
            <section>
                <h3>Don't have an account yet?</h3>
                <h4><a href=".?action=viewSignUp">Sign up!</a></h4>
            </section>
            <section class="info" style="max-width: 60%">
                <h2>Welcome to the PC Planning Tool</h2>
                <p>This tool started out as a school project, but it has grown into something more. This tool was inspired by my need to collect and organize information in a better way while building my first PC. I like to think of this tool as a more helpful spreadsheet, as that is what this tool somewhat started out as. This tool will help you keep track of all the parts you need to buy, and give you helpful suggestions to make your build better.</p>
                <p><span class="warningMsg">Warning: This tool is not a replacement for <a href="https://pcpartpicker.com/" target="_blank">PC Part Picker</a>. You are responsible to make sure that all of your parts are compatible.</span> This tool will provide <strong>some</strong> warnings if it detects incompatible parts, but certainly not all. The primary purpose of this tool is to help you organize your information, and make some general recommendations</p>
            </section>
        </main>
<?php include("views/footer.php"); ?>
