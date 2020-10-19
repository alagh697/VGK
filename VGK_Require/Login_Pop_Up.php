<!--Login Form -->
<div id="logindiv" class="pop_up_div">
    <div id="overlay_login" class="overlay"></div>

    <form class="pop_up_form" id="login_form" action="Login.php" method="post">

    <div class="pop_up_title">CONNEXION</div>

    <table class="pop_up_tab">
            <tr>
                    <td>
                        <label>Identifiant</label>
                    </td>
                    <td>
                        <input type="text" name="id" maxlength="100" required/>
                    </td>
            </tr>
            <tr>    
                    <td>
                        <label>Mot de passe</label>
                    </td>
                    <td>
                        <input type="password" name="password" required/>
                    </td>

            </tr>
            <tr class="remember_me">
                <td>
                    <label>Se souvenir de moi</label>
                </td>
                <td>

                    <div class="onoffswitch">
                        <input type="checkbox" name="remember_me" class="onoffswitch-checkbox" id="myonoffswitch"/>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_login"/>
                <input type="reset" value="Annuler" id="reset_login"/>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <a class="notif_link" href="Reset_Password.php">Mot de passe oublié?
                    </a>
                </td>
            </tr>
    </table>

    </form>

</div>