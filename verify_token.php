<?php 


if(isset($_GET['message'])){
    echo $_GET['message'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify Token</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h2 class="text-center text-success">Verify Email</h2>
        <form action="verify.php" method="get">
            <div class="form-group">
                <label for="token">Enter Token</label>
                <input type="text" class="form-control" placeholder="e.g 234556" name="token">
                <button name="btn_verify" class="btn btn-success">Verify Email</button>
            </div>
        </form>
    </div>
</body>
</html>