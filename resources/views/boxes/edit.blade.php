<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box</title>
</head>

    <div class="container">
    <h1 class="mt-5">Modification d'un box</h1>
    <hr>
    <form action="{{ route('boxes.update', $boxes->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group col-md-6 p-2">
            <label for="name">Nom</label>
            <input type="text" class="form-control mt-3" id="name" name="name" value="{{ $boxes->name }}" required>
        </div>

        <div class="form-group p-2 mt-3">
            <button type="submit" class="btn btn-info">Modifier</button>
        </div>

    </form>
</div>

    </body>

</html>