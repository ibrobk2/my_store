<?php
//Initialize cURL session
$curl = curl_init();

//turn off SSL Checker
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//set the configuration
curl_setopt($curl, CURLOPT_URL, "https://official-joke-api.appspot.com/random_joke");

//Run the cURL

$response = json_decode(curl_exec($curl));
echo $response['setup'];



//Close cURL
curl_close($curl);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes</title>
</head>
<body>
    <h2><?php echo $response['setup']; ?></h2>
</body>
</html>
