<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box</title>
</head>

    <div class="card-body">
        <p>Nom : {{ $boxes->name }}</p>
        <p>Adresse : {{ $boxes->address }}</p>
        <p>Prix : {{ $boxes->price }}</p>
        <p>Superficie : {{ $boxes->size }}</p>
    </div>


</html>