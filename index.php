<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your first app</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<a id="special" class="link" href="http://yourpage.com">Your page</a>
<a class="link" href="http://theirpage.com">Their page</a>
<a class="link" href="payment/index.php">Payment</a>
<a class="link" href="database/index.php">Show database</a>
<p>
    <?php echo "Hello from PHP!"; ?>
<p>
    <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
    <form action="myaction.php" method="post">
<p>Ваше имя: <input type="text" name="name" /></p>
<p>Ваш возраст: <input type="text" name="age" /></p>
<p><input type="submit" /></p>
</form>
<script src="myactions.js"></script>


<button type="button" onclick="loadDoc()">Request data</button>

<p id="demo"></p>

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "demo_get.php", true);
        xhttp.send();
    }
</script>

</body>
</html>
