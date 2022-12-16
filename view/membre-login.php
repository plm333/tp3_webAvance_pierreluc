<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="{{ path }}css/style.css">
</head>
<body>
    <main>
        <h1>Se connecter</h1><br>
        <span class="error">{{ errors|raw }}</span>
        <form action="{{ path }}login/auth" method="post">
            <label>Nom d'utilisateur 
                <input type="email" name="username" value="{{ membre.username }}">
            </label>
            <label>Mot de passe 
                <input type="password" name="password">
            </label>
            <input type="submit" value="Se connecter">
        </form><br>
        <p><a href="{{ path }}home/index">Retour</a></p>
    </main>
</body>
</html>