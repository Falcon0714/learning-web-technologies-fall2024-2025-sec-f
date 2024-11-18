<html>
<head>
    <title>Date of Birth Validation</title>
</head>
<body>
    <form method="POST" action="">
        <fieldset>
            <legend>DATE OF BIRTH</legend>
            <table>
                <tr>
                    <th>dd</th>
                    <th></th>
                    <th>mm</th>
                    <th></th>
                    <th>yyyy</th>
                </tr>
                <tr>
                    <td><input type="number" name="dd" id="dd" min="1" max="31"></td>
                    <td>/</td>
                    <td><input type="number" name="mm" id="mm" min="1" max="12"></td>
                    <td>/</td>
                    <td><input type="number" name="yyyy" id="yyyy" min="1953" max="1998"></td>
                </tr>
            </table>
            <br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dd = $_POST["dd"];
        $mm = $_POST["mm"];
        $yyyy = $_POST["yyyy"];
        
        if (empty($dd) || empty($mm) || empty($yyyy)) {
            echo "Date of Birth cannot be empty.<br>";
        } elseif (!checkdate($mm, $dd, $yyyy)) {
            echo "Invalid date.<br>";
        } elseif ($yyyy < 1953 || $yyyy > 1998) {
            echo "Year must be between 1953 and 1998.<br>";
        } else {
            echo "Date of Birth is valid.<br>";
        }
    }
    ?>
</body>
</html>
