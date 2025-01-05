<?php
session_start();
require_once "../controllers/CourseController.php";

$courseController = new CourseController();
$courses = $courseController->getAllCourses($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $courseController->enrollInCourse($conn, $_POST['course_id'], $_SESSION['user_id']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Enrollment</title>
</head>
<body>
    <h1>Course Enrollment</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <form method="POST" action="">
        <label>Select a Course:</label>
        <select name="course_id" required>
            <?php foreach ($courses as $course) { ?>
                <option value="<?php echo $course['id']; ?>">
                    <?php echo htmlspecialchars($course['title']); ?>
                </option>
            <?php } ?>
        </select><br>
        <button type="submit">Enroll</button>
    </form>
</body>
</html>
