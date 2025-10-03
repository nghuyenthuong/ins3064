<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <body>
<?php
    // http://ins3064.test/week3/ex1.php?a=10&b=5&c=8
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];

    $min = $a;
    if ($b < $min) {
        $min = $b;
    }
    if ($c < $min) {
        $min = $c;
    }

    echo "Số nhỏ nhất trong $a, $b, $c là: $min";
?>
</body>

</body>
</html>