<?php
session_start();
require_once "../config/db.php";

require_once "../Controller/courseController.php";

$courseController = new CourseController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $courseController->createCourse($conn, $_POST);
}
?>

<html>
<head>
    <title>Create Course</title>
</head>
<body>
    <h1>Create a New Course</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <form method="POST" action="">
        <label>Course Title:</label>
        <input type="text" name="title" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <button type="submit">Create Course</button>
    </form>
</body>
</html>
