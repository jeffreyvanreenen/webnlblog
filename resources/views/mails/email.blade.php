<!DOCTYPE html>
<html>
<head>
    <title>Contact form WebNL Blog</title>
</head>
<body>
<p>Bericht via het contactformulier:</p>
<p>Naam: {{ $details['name'] }}</p>
<p>Email: {{ $details['email'] }}</p>
<p>Bericht: {{ $details['message'] }}</p>
</body>
</html>
