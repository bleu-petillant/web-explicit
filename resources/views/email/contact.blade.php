<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mail</title>
</head>
<body>
    <h4>bonjour, vous avez reçu un message de {{$contact->email}}</h4>
    <div>
    <h2>je vous contact au sujet de: {{ $contact->sujet }}</h2>
    <p style="color:black; font-size: 2em;">mon message: {{ $contact->message }}</p>
    <p style="color:black; font-size: 2em;">répondez à cette adresse email <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
    </div>
</body>
</html>