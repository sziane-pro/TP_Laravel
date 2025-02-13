<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locataires</title>
    <h1>Ajout d'un locataire</h1>
</head>
    <hr>

    <form action="{{ route('tenants.store') }}" method="POST">
        @csrf
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="phone">Téléphone</label>
        <input type="text" name="phone" id="phone">
        <label for="address">Adresse</label>
        <input type="text" name="address" id="address">
        <label for="IBAN">IBAN</label>
        <input type="text" name="IBAN" id="IBAN">
        <br>
        <button type="submit">Ajouter</button>
    </form>

</body>
</html>