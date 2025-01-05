<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome, <?php echo $_SESSION['user']['name']; ?>!</h1>
<ul>
    <li><a href="profile.php">View Profile</a></li>
    <li><a href="adminCourses.php">Manage Courses</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
