<?php
session_start();
//require_once "../config/db.php";

$conn = new mysqli("127.0.0.1", "root", "", "agri_edu");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action === 'login') {
    loginUser($conn);
} else {
    header("Location: ../view/login.php");
    exit();
}

function loginUser($conn) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        header("Location: ../view/login.php?error=Email and password are required");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/login.php?error=Invalid email format");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");

    if ($stmt === false) {
        echo "Error preparing the statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $email);

    $stmt->execute();

    if ($stmt->errno) {
        echo "Error executing query: " . $stmt->error;
        exit();
    }

    $stmt->store_result();

    if ($stmt->num_rows === 1) {

        $id = 0;
        $name = '';
        $stored_password = '';
        $role = '';

        $stmt->bind_result($id, $name, $stored_password, $role);

        if ($stmt->fetch()) {
            if ($password === $stored_password) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_role'] = $role;

                header("Location: ../view/home.php");
                exit();
            } else {
                header("Location: ../view/login.php?error=Invalid password");
                exit();
            }
        } else {
            header("Location: ../view/login.php?error=Failed to fetch user data");
            exit();
        }
    } else {
        header("Location: ../view/login.php?error=No user found with this email");
        exit();
    }

    $stmt->close();
}
?>