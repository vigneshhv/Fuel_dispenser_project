<?php

// API endpoint
$apiEndpoint = 'http://192.168.1.38/handle_post';

// Data to be sent in the POST request
$postData = array(
    'param1' => 'value1',
    'param2' => 'value2'
);

// Create HTTP headers
$options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: text/plain',
        'content' => http_build_query($postData)
    )
);

// Create stream context with HTTP headers
$context = stream_context_create($options);

// Make the POST request and store the result
file_get_contents($apiEndpoint, false, $context);

// Process $result as needed
// echo $result;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<button onClick= "checkFile()">post request</button>
<body>
    <script>
     function checkFile(){
        // alert("good");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://192.168.1.38/handle_post", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define the data to be sent
    var data = "bakdbwf";
    var strparams = data.toString();

    console.log(data);
    xhr.send(strparams);}

    </script>
</body>
</html>
