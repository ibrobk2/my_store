<?php
session_start();
if(!isset($_SESSION['logged'])){
    header("location: login.php");
}
// echo "<h2><b>Dashboard Page</b></h2>";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
</head>
<body>
    <h2>Welcome Back, <?php echo $_SESSION['logged']; ?></h2>
    <h2><a href="logout.php">Logout</a></h2>

    <script>
        window.onbeforeunload = function (e) {
    var e = e || window.event;

    // For IE and Firefox
    if (e) {
        e.returnValue = 'Leaving the page';
    }

    // For Safari
    return 'Leaving the page';
};
        })
    </script>
</body>
</html>
