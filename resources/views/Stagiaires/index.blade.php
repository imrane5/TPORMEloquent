<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
    <h1>Gestion des stagiaires:</h1>
    <div>
        <button><a href="{{ route('stagiaires.index') }}">Liste des stagiaires</a></button>
        <button><a href="{{ route('stagiaires.create') }}">Ajouter un stagiaire</a></button>
        <form action="{{ route('stagiaires.deleteAll') }}" method="post">
            @method('DELETE')
            <button><a href="{{ route('stagiaires.deleteAll') }}">Supprimer tous les stagiaires</a></button>
        </form>
        <form action="{{ route('stagiaires.search') }}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="Rechercher un stagiaire">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <table >
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->age }}</td>
                <td>{{ $stagiaire->email }}</td>
                <td>
                    <button><a href="{{ route('stagiaires.edit', $stagiaire->id) }}">Modifier</a></button>
                    <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <div class="row">{{ $stagiaires->links()}}</div>
</body>
</html>