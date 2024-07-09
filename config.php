<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'onserver');

define('COMPANY_NAME', 'onServer Hosting');
define('COMPANY_ADDRESS', 'My awesome street 39');
define('COMPANY_EMAIL', 'support@onserver.org');
define('COMPANY_PHONE', '+31 000 000');
define('CURRENCY', 'EUR'); 

$supported_languages = ['en', 'nl', 'de', 'fr'];
function getCurrentLanguage() {
    if (isset($_GET['lang']) && in_array($_GET['lang'], $GLOBALS['supported_languages'])) {
        return $_GET['lang'];
    }
    return 'en';
}
$current_language = getCurrentLanguage();
?>
