<?php
session_start();
?>

<h1>Login</h1>

<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>

<form method="POST" action="../Controller/authController.php">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="action" value="login">Login</button>
</form>

<h1>Register</h1>
<?php if (isset($_GET['message'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
<?php endif; ?>
<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>

<form method="POST" action="../Controller/authController.php">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : ''; ?>" required>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="action" value="register">Register</button>
</form>

<?php
unset($_SESSION['form_data']);
?>
