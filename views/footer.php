<footer>
    <?php if(isLoggedIn() && isSetupLoaded()) { ?>
    <table>
        <tr class="searchEngine">
            <th>Change Search Engine: </th>
            <td>
                <select name="searchEngine">
                    <option value="Google" <?php if(isset($user) && $user->getSearchEngine() === "Google" ) echo htmlspecialchars("selected") ?>>Google</option>
                    <option value="Bing" <?php if(isset($user) && $user->getSearchEngine() === "Bing" ) echo htmlspecialchars("selected") ?>>Bing</option>
                    <option value="Duck Duck Go" <?php if(isset($user) && $user->getSearchEngine() === "Duck Duck Go" ) echo htmlspecialchars("selected") ?>>Duck Duck Go</option>
                </select>
            </td>
        </tr>
    </table>
    <p>A Kevin Vandy Project <img src="../images/favicon-144.png" width="16" height="16" alt="logo">
        <p>
            To submit bug reports or feature requests, email <a href="mailto:kevinvandy@kevinvandy.com">kevinvandy@kevinvandy.com</a>
        </p>
    <?php } ?>
</footer>
</body>

</html>
