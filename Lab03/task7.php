<?php 
print("<html><table border='1' width='250' cellspacing ='0'><tr>");
print("<td>");
for ($i = 1; $i <= 3; $i++){
    for ($j = 1; $j <= $i; $j++){
        echo "* ";
    }
    echo "\n<br>";
}
print("</td>");
echo "\n<br>";

print("<td>");
for ($i = 3; $i >= 1; $i--){
    for ($j = 1; $j <=$i; $j++){
        echo "$j ";
    }
    echo "\n<br>";

}
print("</td>");
echo "\n<br>";


print("<td>");
$char='A';
for ($i = 1; $i <= 3; $i++){
    for ($j = 1; $j <= $i; $j++){
        echo "$char ";
        $char++;
    }
        
        echo "\n<br>";
    }
    print("</td>");
    echo "\n<br>";

    print("</tr></table></html>")
?>