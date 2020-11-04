<?php ?>

<article class="cookie_message" data-cookie-message>

    <div class="box">
       
        <div class="text">

            <h2>
                <?php _e('Deze website gebruikt Cookies', 'roxtar'); ?>
            </h2>
            <p>
                <?php _e( 'Wij gebruiken functionele, analytische en  marketing cookies voor website optimalisatie, geanonimiseerde statistieken en om de samenwerking met onze partners mogelijk te maken. ', 'roxtar' ) ?>
            </p>

            <button class="button small" data-cookie-accept-btn>
                <?php _e('Prima', 'roxtar'); ?>
            </button>

            <button class="button secondary small" data-cookie-settings-btn>
                <?php _e('Voorkeuren', 'roxtar'); ?>
            </button>

        </div>

    </div>    

</article>

<article class="cookie_message settings" data-cookie-settings-message>

    <div class="box">
            
        <form class="text" data-cookie-settings-form>

            <h2>
                <?php _e('Cookie instellingen', 'roxtar'); ?>
            </h2>

            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="functional" name="functional_cookies" value="functional" data-cookie-checkbox checked disabled="disabled">
                <label class="checkbox_label functional" for="functional">
                    <?php _e('Functioneel', 'roxtar'); ?>
                </label>
                <p class="functional">
                    <?php _e('Deze cookies zijn nodig voor het goed functioneren van de website.', 'roxtar'); ?>
                </p>
            </div>
            
            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="analytics" name="analytics_cookies" value="analytics" data-cookie-checkbox >
                <label class="checkbox_label" for="analytics">
                    <?php _e('Analytics', 'roxtar'); ?>
                </label>
                <p>
                    <?php _e('We anonimiseren onze statistieken en we gebruiken deze data alleen om onze website en aanbod te verbeteren.', 'roxtar'); ?>
                </p>
            </div>         

            <div class="checkbox_wrap">
                <input class="checkbox" type="checkbox" id="marketing" name="marketing_cookies" value="marketing" data-cookie-checkbox >
                <label class="checkbox_label" for="marketing">
                    <?php _e('Marketing', 'roxtar'); ?>
                </label>
                <p>
                    <?php _e('Deze cookies gebruiken wij om ons aanbod te verbeteren. Gegevens kunnen worden gedeeld met onze partners.', 'roxtar'); ?>
                </p>
            </div> 
          

            <button type="submit small" class="button" data-cookie-settings-accept-btn>
                <?php _e('Opslaan', 'roxtar'); ?>
            </button>
            
        </form>

        

    </div>    

</article>
