<?php
require_once __DIR__ . '/../../config.php';
$page_titles = [
    'index.php' => COMPANY_NAME . ' | Home',
    'auth/register/index.php' => COMPANY_NAME . ' | Register account',
    'auth/login/index.php' => COMPANY_NAME . ' | Login',
    'dashboard/index.php' => COMPANY_NAME . ' | Dashboard',
    'logout.php' => COMPANY_NAME . ' | Logout'
];

function getPageTitle($current_page) {
    global $page_titles;
    if (array_key_exists($current_page, $page_titles)) {
        return $page_titles[$current_page];
    } else {
        return COMPANY_NAME;
    }
}
?>
