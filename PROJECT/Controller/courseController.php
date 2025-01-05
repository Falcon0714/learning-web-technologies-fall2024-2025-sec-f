<?php
require_once "../config/db.php";

class CourseController {
    public function createCourse($conn, $data) {
        $title = trim($data['title']);
        $description = trim($data['description']);

        if (empty($title) || empty($description)) {
            return "Both fields are required.";
        }

        $stmt = $conn->prepare("INSERT INTO courses (title, description) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $title, $description);
            if ($stmt->execute()) {
                return "Course created successfully.";
            } else {
                return "Failed to create course.";
            }
            $stmt->close();
        } else {
            return "Database error.";
        }
    }
    public function getAllCourses($conn) {
        $stmt = $conn->prepare("SELECT id, title, description FROM courses");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function enrollInCourse($conn, $courseId, $studentId) {
        $stmt = $conn->prepare("SELECT * FROM enrollments WHERE course_id = ? AND student_id = ?");
        $stmt->bind_param("ii", $courseId, $studentId);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            return "You are already enrolled in this course.";
        }

        $stmt = $conn->prepare("INSERT INTO enrollments (course_id, student_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $courseId, $studentId);
        if ($stmt->execute()) {
            return "Successfully enrolled in the course.";
        } else {
            return "Failed to enroll in the course.";
        }
    }
}
?>
