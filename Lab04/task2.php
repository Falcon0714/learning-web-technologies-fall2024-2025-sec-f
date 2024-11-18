<html>
<head>
    <title>Email Validation</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>EMAIL</legend>
            <input type="email" name="email" id="email"><br><br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        
        if (empty($email)) {
            echo "Email cannot be empty.<br>";
        } elseif (strpos($email, '@') === false || strpos($email, '.') === false) {
            echo "Invalid email format. Must contain '@' and a period '.'<br>";
        } else {
            $atPos = strpos($email, '@');
            $dotPos = strpos($email, '.', $atPos);
            if ($atPos === false || $dotPos === false || $dotPos < $atPos + 1) {
                echo "Invalid email format. The '@' should come before the '.' and there should be text after both.<br>";
            } else {
                echo "Email is valid.<br>";
            }
        }
    }
    ?>
</body>
</html>
