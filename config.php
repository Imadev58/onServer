<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'onserver');

define('WEBSITE', 'localhost/onServer');
define('COMPANY_NAME', 'S4 Hosting');
define('COMPANY_ADDRESS', '');
define('COMPANY_EMAIL', '');
define('COMPANY_PHONE', '');
define('COMPANY_LOGO', '');
define('FOOTER', '© 2024 S4hosting. All rights reserved.');
define('CURRENCY', 'CAD'); 

$supported_languages = ['en', 'nl', 'de', 'fr'];
function getCurrentLanguage() {
    if (isset($_GET['lang']) && in_array($_GET['lang'], $GLOBALS['supported_languages'])) {
        return $_GET['lang'];
    }
    return 'en';
}
$current_language = getCurrentLanguage();
?>
