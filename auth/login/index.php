<?php
session_start();
require_once __DIR__ . '/../../resources/pages/config.php';
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../app/webhooks/loginSuccessWebhook.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['Password'])) {
            $_SESSION['user_id'] = $user['UserID']; 
            $_SESSION['email'] = $user['Email'];

            sendLoginSuccessWebhook($user['FirstName'], $user['LastName'], 'dashboard');

            header("Location: http://" . WEBSITE . "/dashboard");
            exit();
        } else {
            $error = "The entered data does not match the records in the database.";
        }

    } else {
        $error = "The entered data does not match the records in the database.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/assets/css/footer.css">
    <link rel="stylesheet" href="../../resources/assets/css/register.form.css">
    <link rel="stylesheet" href="../../resources/assets/css/flowbite.min.css">
    <title><?php echo getPageTitle('auth/login/index.php'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo COMPANY_LOGO; ?>">
</head>
<body>
    <div class="container">
        <div class="header"> <br><br><br><br>
            <h4 class="poppins-semibold">Log in to your account</h4>
        </div>
        <?php include(__DIR__ . '/../../resources/view/navbar.php'); ?>
        <form method="POST" action="index.php">
            <div class="form-grid">
                <div class="form-group full-width">
                    <label>Email address</label>
                    <input name="email" type="email" placeholder="Email" required>
                </div>
                <div class="form-group full-width">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="**********" required>
                </div>
            </div>
            <?php if (!empty($error)): ?>
                <p style="color: red; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="submit-button">
                <button type="submit" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Login
                </button>
            </div>
        </form>
    </div>
    <?php include(__DIR__ . '/../../resources/view/footer.php'); ?>
</body>
</html>
