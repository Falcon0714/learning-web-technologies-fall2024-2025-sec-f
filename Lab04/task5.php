<html>
<head>
    <title>Degree Validation</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>DEGREE</legend>
            <input type="checkbox" name="degree[]" value="SSC"> SSC
            <input type="checkbox" name="degree[]" value="HSC"> HSC
            <input type="checkbox" name="degree[]" value="BSc"> BSc
            <input type="checkbox" name="degree[]" value="MSc"> MSc <br><br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["degree"]) || count($_POST["degree"]) < 2) {
            echo "At least two of them must be selected.<br>";
        } else {
            echo "Degrees selected: " . implode(", ", $_POST["degree"]) . "<br>";
        }
    }
    ?>
</body>
</html>
