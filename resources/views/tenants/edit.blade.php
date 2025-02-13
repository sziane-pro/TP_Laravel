<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locataire</title>
</head>

    <div class="container">
    <h1 class="mt-5">Modification d'un locataire</h1>
    <hr>
    <form action="{{ route('tenants.update', $tenants->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group col-md-6 p-2">
            <label for="lastname">Nom</label>
            <input type="text" class="form-control mt-3" id="lastname" name="lastname" value="{{ $tenants->lastname }}" required>
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control mt-3" id="firstname" name="firstname" value="{{ $tenants->firstname }}" required>
            <label for="email">Email</label>
            <input type="email" class="form-control mt-3" id="email" name="email" value="{{ $tenants->email }}" required>
            <label for="phone">Téléphone</label>
            <input type="text" class="form-control mt-3" id="phone" name="phone" value="{{ $tenants->phone }}" required>
            <label for="address">Adresse</label>
            <input type="text" class="form-control mt-3" id="address" name="address" value="{{ $tenants->address }}" required>
            <label for="IBAN">IBAN</label>
            <input type="text" class="form-control mt-3" id="IBAN" name="IBAN" value="{{ $tenants->IBAN }}" required>
        </div>

        <div class="form-group p-2 mt-3">
            <button type="submit" class="btn btn-info">Modifier</button>
        </div>

    </form>
</div>

    </body>

</html>