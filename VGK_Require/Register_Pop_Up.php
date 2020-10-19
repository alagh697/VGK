<?php
$theCountries=array();
$theLanguages=array();
$theCountries= Country::loadAllCountries($database);
$theLanguages= Language::loadAllLanguages($database);
?>
<!--Register Form -->
<div id="registerdiv" class="pop_up_div">
    <div id="overlay_register" class="overlay"></div>
    <form class="pop_up_form" id="register_form" action="Register.php" method="post">

    <div class="pop_up_title">INSCRIPTION</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label for="id">Identifiant</label>
                    <!--<p class="nothing_left">De 3 à 100 caractères.<br/> (Seulement des lettres, des chiffres et '_' )</p>-->
                </td>
                <td>
                    <input type="text" name="id" id="id" maxlength="50" required/>
                </td>
            </tr>
                    
            <tr>    
                <td>
                    <label for="email">Email</label>      
                </td>
                <td>
                    <input type="email" name="email" id="email" maxlength="255" required/>
                </td>

            </tr>

            <tr>    
                <td>
                    <label for="password">Mot de passe</label>
                   <!-- <p class="nothing_left">De 8 à 50 caractères.<br/> (Seulement des lettres, des chiffres et '!@#$%' ) <br/> (Au moins une lettre et un chiffre)</p>-->
                </td>
                <td>
                    <input type="password" name="password" id="password" maxlength="50" required/>
                </td>

            </tr>
            <tr>    
                <td>
                    <label for="password_confirm">Confirmez mot de passe</label>
                </td>
                <td>
                    <input type="password" name="password_confirm" id="password_confirm" maxlength="50" required/>
                </td>

            </tr>
            
            <tr>    
                <td>
                    <label for="country">Pays</label>
                </td>
                <td>
                    <select name="country">
                        <?php
                        foreach($theCountries as $country)
                        {
                        ?>
                        <option value="<?php echo $country->getCountry_id(); ?>" <?php if($country->getCountry_id()=="75"){ echo "selected"; }?>><?php echo utf8_encode($country->getCountry_name_fr()); ?></option>
                        <?php             
                        }
                        ?>
                    </select>
                </td>

            </tr>
            
            <tr>    
                <td>
                    <label for="main_language">Langue principale</label>
                </td>
                <td>
                    <select name="main_language">
                        <?php
                        foreach($theLanguages as $language)
                        {
                        ?>
                        <option value="<?php echo $language->getLanguage_code(); ?>" <?php if($language->getLanguage_code()=="FRA"){ echo "selected"; }?>><?php echo utf8_encode($language->getLanguage_name_fr()); ?></option>
                        <?php             
                        }
                        ?>
                    </select>
                </td>

            </tr>

            <tr>    
                <td>
                    <label>Date de naissance</label>
                </td>
                <td>
                    <select name="birthday_day">
                    <?php 
                    for ($jour = 1 ; $jour <= 31 ; $jour++)
                    {
                    ?>
                        <option value="<?php echo $jour ?>"><?php echo $jour; ?></option>
                    <?php              
                    }
                    ?>  
                    </select>

                    <select name="birthday_month">
                    <?php 
                    for ($mois = 1 ; $mois <= 12 ; $mois++)
                    {
                    ?>
                        <option value="<?php echo $mois ?>"><?php echo $mois; ?></option>
                    <?php              
                    }
                    ?>  
                    </select>
                    </select>
                    <select name="birthday_year">
                    <?php 
                    for ($annee = date("Y") ; $annee >= 1900 ; $annee--)
                    {
                    ?>
                        <option value="<?php echo $annee ?>"><?php echo $annee; ?></option>
                    <?php              
                    }
                    ?>  
                    </select>
                </td>

            </tr>

            <tr>
                <td>
                    <label>Sexe</label>
                </td>

                <td>
                    <div class="MFswitch">
                        <input type="checkbox" name="gender" class="MFswitch-checkbox" id="myMFswitch" checked="true"/>
                        <label class="MFswitch-label" for="myMFswitch">
                                <span class="MFswitch-inner"></span>
                                <span class="MFswitch-switch"></span>
                        </label>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <p class="nothing_left">
                        En cliquant sur Inscription, vous indiquez que vous avez lu nos <a class="notif_link" href="VGK_Infos.php?page=terms" target="_blank">Conditions d’utilisation</a> <br/>
                        et que vous les acceptez.
                    </p>
                    
                </td>
            </tr>
            
            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Inscription" id="submit_register"/>
                <input type="reset" value="Annuler" id="reset_register"/>
                </td>
            </tr>
        </table>

    </form>

</div>

