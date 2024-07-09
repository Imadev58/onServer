<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'resources/pages/config.php';
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getPageTitle('index.php'); ?></title>
    <link rel="stylesheet" href="resources/assets/home.css">
</head>
<body>
    <div class="container">
        <header>
            <h1><?php echo COMPANY_NAME; ?></h1>
        </header>
        <div class="content">

    </div>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
