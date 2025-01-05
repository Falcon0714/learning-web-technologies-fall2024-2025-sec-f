<?php
session_start();
require_once '../config/db.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user']['id'];
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($name, $email);
$stmt->fetch();
?>

<h1>Your Profile</h1>
<form method="POST" action="../controllers/profileController.php">
    <input type="hidden" name="id" value="<?php echo $userId; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" required>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $email; ?>" required>
    <button type="submit" name="action" value="update">Update Profile</button>
</form>
