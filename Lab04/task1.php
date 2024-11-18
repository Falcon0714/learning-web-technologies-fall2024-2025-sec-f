<html>
<head>
    <title>Name Validation</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>NAME</legend>
            <input type="text" name="name" id="name"><br><br>
            <button type="submit">Submit</button>
        </fieldset>

    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        if (empty($name)) {
            echo "Name cannot be empty.<br>";
        } elseif (str_word_count($name) < 2) {
            echo "Name must contain at least two words.<br>";
        } elseif (!ctype_alpha($name[0])) {
            echo "Name must start with a letter.<br>";
        } else {
            $isValid = true;
            $allowedCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.- ";

            for ($i = 0; $i < strlen($name); $i++) {
                if (strpos($allowedCharacters, $name[$i]) === false) {
                    $isValid = false;
                    break;
                }
            }

            if (!$isValid) {
                echo "Name can only contain letters, periods and dashes.<br>";
            } else {
                echo "Name is valid.<br>";
            }
        }
    }
?>
</body>
</html>
