<?php session_start(); ?>
<h1>Dashboard</h1>
<p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
<ul>
    <li><a href="profile.php">View Profile</a></li>
    <li><a href="adminCourses.php">Manage Courses</a></li>
    <li><a href="home.php">Go to Home</a></li>
</ul>
