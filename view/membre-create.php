{{ include('header.php', {title: 'Nouveau membre'})}}

    <main class="ajouterMembreForm">
        <h1>Ajouter un nouveau membre</h1><br>
        <span class="error">{{ errors|raw }}</span>

        <form action="{{ path }}membre/store" method="post">
            <label>Nom
                <input type="text" name="nom" value="{{ data.nom }}">
            </label>
            <label>Prénom
                <input type="text" name="prenom" value="{{ data.prenom }}">
            </label>
            <label>Adresse
                <input type="text" name="adresse" value="{{ data.adresse }}">
            </label>
            <label>Code Postal
                <input type="text" name="code_postal" value="{{ data.code_postal }}">
            </label>
            <label>Téléphone
                <input type="text" name="telephone" value="{{ data.telephone }}">
            </label>
            <label>Courriel
                <input type="email" name="courriel" value="{{ data.courriel }}">
            </label>
            <label>Date de naissance
                <input type="text" name="date_naissance" value="{{ data.date_naissance }}">
            </label>
            <label>Date d'inscription
                <input type="text" name="date_inscription" value="{{ data.date_inscription }}">
            </label>
            <label>Nom d'utilisateur
                <input type="text" name="username"value="{{ data.username }}">
            </label>
            <label>Mot de passe
                <input type="text" name="password"value="{{ data.password }}">
            </label>
            <label>Privilège
                <select name="privilege_id">
                {% for privilege in privileges %}
                    <option value="{{ privilege.id }}">{{ privilege.privilege }}</option>
                {% endfor %}
                </select>
            </label>
            <input class="activerBtn" type="submit" value="Ajouter"><br>
            <p><a href="{{ path }}membre/index">Retour</a></p>
        </form>
    </main>
</body>
</html>