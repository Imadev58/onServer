<?php
session_start();
require_once __DIR__ . '/../resources/pages/config.php';
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: http://" . WEBSITE . "/auth/login");
    exit();
}

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Something went wrong, please contact the developer with the following error: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['email'] = $user['Email']; 
    $_SESSION['firstname'] = $user['FirstName'];

?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/assets/css/footer.css">
    <link rel="stylesheet" href="../resources/assets/css/dashboard.css">
    <link rel="stylesheet" href="../resources/assets/css/flowbite.min.css">
    <title><?php echo getPageTitle('dashboard/index.php'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo COMPANY_LOGO; ?>">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="poppins-semibold">Welcome to the Dashboard</h1>
        </div>
        <?php include(__DIR__ . '/../resources/view/dashboard-navbar.php'); ?>
        <div class="content"> <br><br><br>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['firstname']); ?></p>
        </div>
    </div> <br><br><br><br>
    <?php include(__DIR__ . '/../resources/view/footer.php'); ?>
</body>
</html>

<?php
} else {
    header("Location: http://" . WEBSITE . "/auth/login");
    exit();
}

$stmt->close();
$conn->close();
?>
