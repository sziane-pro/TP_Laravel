<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Box</title>
    <h1>Ajout d'un box</h1>
</head>
    <hr>

    <form action="{{ route('boxes.store') }}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
        <label for="address">Adresse</label>
        <input type="text" name="address" id="address">
        <label for="price">Prix</label>
        <input type="text" name="price" id="price">
        <label for="size">Superficie</label>
        <input type="text" name="size" id="size">
        <br>
        <button type="submit">Ajouter</button>
    </form>

</body>
</html>