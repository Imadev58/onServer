<?php
    require_once 'resources/pages/config.php';
    require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getPageTitle('index.php'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo COMPANY_LOGO; ?>">
    <link rel="stylesheet" href="resources/assets/css/home.css">
    <link rel="stylesheet" href="resources/assets/css/navbar.css">
</head>
<body>
    
<?php require_once 'resources/view/navbar.php'; ?>

<div class="container">
        <header>
            <h1><?php echo COMPANY_NAME; ?></h1>
        </header>
        <div class="content">

    </div>
        <footer>
            <p><?php echo FOOTER; ?></p>
        </footer>
    </div>
</body>
</html>
