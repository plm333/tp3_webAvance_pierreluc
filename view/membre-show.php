{{ include('header.php', {title: 'Membre Details'})}}

    <main>
        <p><strong>Nom : </strong>{{ membre.nom }}</p>
        <p><strong>Prénom : </strong>{{ membre.prenom }}</p>
        <p><strong>Adresse : </strong>{{membre.adresse}}</p>
        <p><strong>Code Postal : </strong>{{membre.code_postal}}</p>
        <p><strong>Téléphone : </strong>{{ membre.telephone }}</p>
        <p><strong>Courriel : </strong>{{ membre.courriel }}</p>
        <p><strong>Date de naissance: </strong>{{ membre.date_naissance }}</p>
        <p><strong>Date d'inscription: </strong>{{ membre.date_inscription }}</p>
        <p><strong>Nom d'utilisateur: </strong>{{ membre.username }}</p><br>
        {% if session.privilege_id == 1 or session.privilege_id == 2 %}
        <p><a href="{{ path }}membre/edit/{{ membre.id }}">Modifier</a></p><br>
        {% endif %}
        <p><a href="{{ path }}membre/index">Retour</a></p><br>
    </main>
</body>
</html>

