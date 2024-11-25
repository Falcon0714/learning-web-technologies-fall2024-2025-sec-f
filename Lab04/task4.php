<html>
<head>
    <title>Gender Validation</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>GENDER</legend>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other <br><br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["gender"])) {
            echo "At least one of them must be selected.<br>";
        } else {
            echo "Gender selected: " . $_POST["gender"] . "<br>";
        }
    }
    ?>
</body>
</html>
