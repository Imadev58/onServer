<?php
require_once __DIR__ . '/../../resources/pages/config.php';
require_once __DIR__ . '/../../config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars(trim($_POST['name']));
    $lastName = htmlspecialchars(trim($_POST['lname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Something went wrong, please contact the developer with the following error: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: " . "http://" . WEBSITE . "/dashboard");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title><?php echo getPageTitle('auth/register/index.php'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo COMPANY_LOGO; ?>">
</head>
<body>
    <div class="container">
        <div class="header"> <br><br><br><br>
            <h4 class="poppins-semibold">Register account</h4>
        </div>
        <?php include('../../resources/view/navbar.php'); ?>
        <form method="POST" action="index.php">
            <div class="form-grid">
                <div class="form-group">
                    <label>First Name</label>
                    <input name="name" type="text" placeholder="First name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input name="lname" type="text" placeholder="Last name" required>
                </div>
                <div class="form-group full-width">
                    <label>Email address</label>
                    <input name="email" type="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="**********" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input name="cpassword" type="password" placeholder="**********" required>
                </div>
            </div>

            <div class="submit-button">
                <button type="submit" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Register
                </button>
            </div>
        </form>
    </div>
    <?php include('../../resources/view/footer.php'); ?>
</body>
</html>
