<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code</title>
</head>
<body>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ urlencode($text) }}" title="Link to Google.com" />
</body>
</html>
