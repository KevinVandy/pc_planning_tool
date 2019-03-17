<?php
    $title = 'Sign Up';
    include("views/header.php");
?>
        <main>
            <section>
                <form action="." method="post">
                    <input type="hidden" name="action" value="signUp">
                    <table>
                        <tr>
                            <td colspan="2" class="confirmMsg">
                                <?php if(isset($confirmMsgs['deleteaccount'])) echo htmlspecialchars($confirmMsgs['deleteaccount']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Username: </th>
                            <td><input type="text" name="username" value="<?php if(isset($username)) echo htmlspecialchars($username); ?>" required autofocus> <span class="hint">Required</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['username'])) echo htmlspecialchars($errorMsgs['username']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td><input type="email" name="email" value="<?php if(isset($email)) echo htmlspecialchars($email); ?>"> <span class="hint">Optional</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['email'])) echo htmlspecialchars($errorMsgs['email']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Password: </th>
                            <td><input type="password" name="password" minlength="8" maxlength="60" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['password'])) echo htmlspecialchars($errorMsgs['password']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Confirm Password: </th>
                            <td><input type="password" name="passwordConfirm" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="errorMsg">
                                <?php if(isset($errorMsgs['signup'])) echo htmlspecialchars($errorMsgs['signup']); ?>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Create Account">
                </form>
            </section>
            <section>
                <h3>Already have an account yet?</h3>
                <h4><a href=".?action=viewLogin">Log in</a></h4>
            </section>
        </main>
<?php include("views/footer.php"); ?>
