<html>
<head>
    <title>Add Employee</title>
    <script>
        function validateAddAuth() {
            const username = document.getElementById('user_name').value.trim();
            const authName = document.getElementById('auth_name').value.trim();
            const contactNo = document.getElementById('contact_no').value.trim();
            const password = document.getElementById('password').value.trim();
            let valid = true;

            if (!username) {
                document.getElementById('usernameError').innerText = 'Username is required.';
                valid = false;
            } else {
                document.getElementById('usernameError').innerText = '';
            }

            if (!authName) {
                document.getElementById('authNameError').innerText = 'Author name is required.';
                valid = false;
            } else {
                document.getElementById('authNameError').innerText = '';
            }

            if (!contactNo) {
                document.getElementById('contactNoError').innerText = 'Contact number is required.';
                valid = false;
            } else {
                document.getElementById('contactNoError').innerText = '';
            }

            if (!password) {
                document.getElementById('passwordError').innerText = 'Password is required.';
                valid = false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            return valid;
        }
    </script>
</head>
<body>
    <h1>Add Employee</h1>
    <form action="../controller/userController.php" method="POST" onsubmit="return validateAddAuth();">
        <input type="hidden" name="action" value="add">
        
        <label>User Name:</label>
        <input type="text" name="user_name" id="user_name">
        <span id="usernameError" style="color: red;"></span><br><br>
        
        <label>Employee Name:</label>
        <input type="text" name="auth_name" id="auth_name">
        <span id="authNameError" style="color: red;"></span><br><br>
        
        <label>Contact Number:</label>
        <input type="text" name="contact_no" id="contact_no">
        <span id="contactNoError" style="color: red;"></span><br><br>
        
        <label>Password:</label>
        <input type="password" name="password" id="password">
        <span id="passwordError" style="color: red;"></span><br><br>
        
        <button type="submit">Add</button>
    </form>
</body>
</html>