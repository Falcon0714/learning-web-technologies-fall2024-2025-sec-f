<?php
session_start();
require_once "../config/db.php";

class ProfileController {
    public function viewProfile($conn) {
        $userId = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateProfile($conn, $data) {
        $userId = $_SESSION['user_id'];
        $name = $data['name'];
        $email = $data['email'];

        if (empty($name) || empty($email)) {
            return "All fields are required.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }

        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $userId);
        if ($stmt->execute()) {
            $_SESSION['user_name'] = $name;
            return "Profile updated successfully.";
        } else {
            return "Error updating profile.";
        }
    }
}
?>
