<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create Stagiaire</title>
</head>
<body>
    <h1>Fiche Stagiaire:</h1>
    <form action="{{ route('stagiaires.store') }}" method="POST">
       @csrf
       {{-- <input type= "hidden" name ="_token" value="{{ csrf_token() }}"> --}}
       Nom Stagiaire :<input type="text" value="" name="nom"><br><br>
       Prénom Stagiaire :<input type="text" name="prenom"><br><br>
       Age Stagiaire :<input type="text" name="age"><br><br>
       Email Stagiaire :<input type="text" name="email"><br><br>
       Password Stagiaire :<input type="password" name="password"><br><br>
       <button type="submit">Ajouter</button>
    </form>
</body>
</html>