/*jshint esversion: 6 */

mainToggle = document.querySelector('[data-main-menu-toggle]');
mainClose = document.querySelectorAll('[data-main-close]');
mainMenu = document.querySelector('[data-main-menu]');

mainToggle.addEventListener('click', function(e) {
    e.preventDefault();
    mainMenu.classList.remove('hidden');
    mainMenu.classList.add('visible');
});

mainClose.forEach(function(elem) {

    elem.addEventListener('click', function(e) {
        e.preventDefault();
        mainMenu.classList.add('hidden');
        mainMenu.classList.remove('visible');
    });  

});


/******************* GDPR Cookies *************************************/

const cookieMessage = document.querySelector('[data-cookie-message]');
const cookieAcceptBtn = document.querySelector('[data-cookie-accept-btn]');
const cookieSettingsBtn = document.querySelector('[data-cookie-settings-btn]');

const cookieSettingsMessage = document.querySelector('[data-cookie-settings-message]');
const cookieSettingsForm = document.querySelector('[data-cookie-settings-form]');
const cookieSettingsAcceptBtn = document.querySelector('[data-cookie-settings-accept-btn]');

/* --- Cookie Buttons --- */

document.addEventListener('DOMContentLoaded', (event) => {

    // Accept all cookies
    cookieAcceptBtn.onclick = function() { 
        cookieMessage.classList.remove('visible');
        createCookie('gdpr-cookie', 'functional,analytics,marketing', 365);

        // Reload page when cookies are accepted.
        location.reload();
        return false;
 
    };

    // Open cookie settings menu
    cookieSettingsBtn.onclick = function() { 
        cookieSettingsMessage.classList.add('visible');
        cookieMessage.classList.remove('visible');        
    };

    // Save cookie settings
    cookieSettingsAcceptBtn.onclick = function() {     
        
        var array = [];
        var checkboxes = cookieSettingsForm.querySelectorAll('input[type=checkbox]:checked');

        // Buidl array with checkboxes
        for (var i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value);
        }

        // Save cookie with settings
        createCookie('gdpr-cookie', array, 365);

        // Hide cookie settings menu 
        cookieSettingsMessage.classList.remove('visible');
        
        // Reload page when cookie settings are saved.
        location.reload();
       
        // Stop form 
        return false;
    };

    /* --- Get cookie value --- */

    const getGDPRCookie = getCookie('gdpr-cookie');

    // If GDPR cookie is empty or not set -> add class visible to cookie popup
    if ( getGDPRCookie === '') {
        cookieMessage.classList.add('visible');
    }


    // Check if consent has been given before GTM is loaded. Triggers in GTM load content based on cookie value.
    if ( getGDPRCookie.includes('analytics', 'analytics,marketing') ) {
        
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KCPKGSW');

    }      

});

/* --- GDPR Cookie Functions --- */



// Create the cookie
function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Get the cookie
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}


//  Animate all wp-block-group blocks 

const blockgroups = document.querySelectorAll('.wp-block-group, .header_wrap, .kennisbank_category, .wp-block-columns,.content .post, .rank-math-block, .wp-block-cover, .page_header');

observer = new IntersectionObserver((entries) => {

  entries.forEach(entry => {

    if (entry.intersectionRatio > 0) {

      entry.target.classList.add('fade-in-up');

    } 

  });

});

blockgroups.forEach(blockgroup => {
  observer.observe(blockgroup);
});