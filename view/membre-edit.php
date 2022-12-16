{{ include('header.php', {title: 'Edit Membre', pageHeader:'Modifier'})}}

    <main>
        <form action="{{ path }}membre/update" method="post">
            <input type="hidden" name="id" value="{{ membre.id }}">
            <label>Nom 
                <input type="text" name="nom" value="{{ membre.nom }}">
            </label>
            <label>Prénom 
                <input type="text" name="prenom" value="{{ membre.prenom }}">
            </label>
            <label>Adresse
                <input type="text" name="adresse" value="{{ membre.adresse }}">
            </label>
            <label>Code Postal
                <input type="text" name="code_postal" value="{{ membre.code_postal }}">
            </label>
            <label>Téléphone
                <input type="text" name="telephone" value="{{ membre.telephone }}">
            </label>
            <label>Courriel
                <input type="email" name="courriel" value="{{ membre.courriel }}">
            </label>
            <label>Date de naissance
                <input type="text" name="date_naissance" value="{{ membre.date_naissance }}">
            </label>
            <label>Date d'inscription
                <input type="text" name="date_inscription" value="{{ membre.date_inscription }}">
            </label>
            <label>Nom d'utilisateur
                <input type="text" name="username" value="{{ membre.username }}">
            </label>
            {% if session.privilege_id == 1 or session.privilege_id == 2 %}
            <input class="activerBtn"  type="submit" value="Modifier">
            {% endif %}
        </form>
        {% if session.privilege_id == 1 or session.privilege_id == 2 %}
        <form action="{{ path }}membre/delete" method="post">
            <input type="hidden" name="id" value="{{ membre.id }}">
            <input class="activerBtn"  type="submit" value="Supprimer">
        </form>
        {% endif %}
        <p><a href="{{ path }}membre/index">Retour</a></p>
    </main>
    
</body>
</html>