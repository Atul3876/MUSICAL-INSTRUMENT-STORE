<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="success.css">
</head>
<body>
<div id="popupMessage" class="popup">
    <div class="popup-content">
        <span id="popupMessageText"></span>
        <button id="popupCloseBtn" class="btn">Close</button>
    </div>
</div>
echo "<script>document.getElementById('popupMessageText').innerText = '$message'; document.getElementById('popupMessage').style.display = 'block';</script>";
</body>
</html>