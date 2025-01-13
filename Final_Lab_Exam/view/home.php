<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?></h1>
    <a href="empList.php">View Employees List</a><br>
    <a href="addEmp.php">Add Employee</a><br><p></p>
    <form action="../controller/userController.php" method="POST">
        <input type="hidden" name="action" value="logout">
        <button type="submit">Logout</button>
    </form>
    <form action="../controller/userController.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <button type="submit">Delete Account</button>
    </form>
</body>
</html>
