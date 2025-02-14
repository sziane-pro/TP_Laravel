<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locataire</title>
</head>

    <div class="card-body">
        <p>Nom : {{ $tenants->lastname }}</p>
        <p>Prénom : {{ $tenants->firstname }}</p>
        <p>Email : {{ $tenants->email }}</p>
        <p>Téléphone : {{ $tenants->phone }}</p>
        <p>Adresse : {{ $tenants->address }}</p>
        <p>IBAN : {{ $tenants->IBAN }}</p>
        <p>User ID : {{ $tenants->owner_id }}</p>
    </div>


</html>