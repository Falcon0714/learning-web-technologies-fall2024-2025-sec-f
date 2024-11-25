<html>
<head>
    <title>Blood Group Validation</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>BLOOD GROUP</legend>
            <select name="blood_group">
                <option value="">Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select> <br><br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["blood_group"])) {
            echo "Must be selected.<br>";
        } else {
            echo "Blood Group selected: " . $_POST["blood_group"] . "<br>";
        }
    }
    ?>
</body>
</html>
