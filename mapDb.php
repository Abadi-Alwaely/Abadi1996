<?php
$dbPass = "awsmawsm14056789";
$dbUser = "abadi_alwaely";
$dbServer = "localhost";
$dbName = "mapdb";

$connection = new mysqli($dbServer, $dbUser, $dbPass, $dbName);
if ($connection->connect_errno) {
    exit("Database connection failed. reason: " . $connection->connect_error);
}

$forward = $_POST['forward'];
$left = $_POST['left'];
$right = $_POST['right'];


    $query = "INSERT INTO `directionmab`(`Forward`, `Left`, `Right`) VALUES ($forward,$left,$right)";

    echo $_POST['forward'] . " forward" . '<br />';
    echo $_POST['left'] . " left" . '<br />';
    echo $_POST['right'] . " right" . '<br />';


$connection->query($query);
$connection->close();



?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body style="background: #f2f2f2">
<br>
<br>
<canvas id="myCanvas" width="301px" height="301px" style="border:2px solid red"></canvas>
<script>
    var canvas = document.getElementById('myCanvas');
    var c = canvas.getContext("2d");
    var forward = parseInt(<?php echo $forward?>);
    var left = parseInt(<?php echo $left?>);
    var right = parseInt(<?php echo $right?>);
    var startX = 150;
    var startY = 300;

    c.moveTo(startX, startY);

    if (typeof forward != 'undefined') {
        startY = startY - forward;
        c.lineTo(startX, startY);
        c.stroke();
    }
    if (typeof left != 'undefined') {
        startX = startX - left;
        c.lineTo(startX, startY);
        c.stroke();
    }
    if (typeof right != 'undefined') {
        startX = startX + right;
        c.lineTo(startX, startY);
        c.stroke();
    }


</script>
</body>
</html>