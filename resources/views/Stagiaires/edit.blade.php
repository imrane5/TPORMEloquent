<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    
    <h1>Modifier un stagiaire:</h1>
    <form action="{{ route('stagiaires.update', $stagiaire->id) }}" method="POST">
        @method('put')
        {{-- @method('patch') --}}
       
        @csrf
       {{-- <input type= "hidden" name ="_token" value="{{ csrf_token() }}"> --}}


       Nom Stagiaire :<input type="text" value="{{ $stagiaire->nom }}" name="nom"><br><br>
       Prénom Stagiaire :<input type="text" value="{{ $stagiaire->prenom }}" name="prenom"><br><br>
       Age Stagiaire :<input type="text" value="{{ $stagiaire->age }}" name="age"><br><br>
       Email Stagiaire :<input type="text" value="{{ $stagiaire->email }}" name="email"><br><br>
       Password Stagiaire :<input type="password" value="{{ $stagiaire->password }}" name="password"><br><br>
       <button type="submit">Modifier</button>
       
    </form>


</body>
</html>