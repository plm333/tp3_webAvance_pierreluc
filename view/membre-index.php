{{ include('header.php', {title: 'Membre'}) }}

    <h5 class="titre1 lienAccueil">La Bibliothèque</a></h5>
    <h1><a class="titre2 lienAccueil" href="{{ path }}home/index">Canva</a></h1>
    <main>
        <section>
            <h1>{{ membre_list }}</h1><br>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Téléphone</th>
                        <th>Courriel</th>
                        <th>Date de naissance</th>
                        <th>Date d'inscription</th>
                        <th>Nom d'utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    {% for membre in membres %}
                    <tr>
                        <td>{% if session.privilege_id == 1 or session.privilege_id == 2 %}<a href="{{ path }}membre/show/{{ membre.id }}">{% endif %}{{ membre.nom }}</a></td>
                        <td>{{ membre.prenom }}</td>
                        <td>{{ membre.adresse }}</td>
                        <td>{{ membre.code_postal }}</td>
                        <td>{{ membre.telephone }}</td>
                        <td>{{ membre.courriel }}</td>
                        <td>{{ membre.date_naissance }}</td>
                        <td>{{ membre.date_inscription }}</td>
                        <td>{{ membre.username }}</td>
                    </tr>
                    {% endfor %}
                </tbody>               
            </table><br>
            {% if session.privilege_id == 1 or session.privilege_id == 2 %}
            <p><a class="ajouterMembre" href="{{ path }}membre/create">Ajouter un membre</a></p>
            {% endif %}
        </section>
    </main>
    <footer>
    © Pierre-Luc Moisan - Tous les droits réservés
    </footer>
</body>
</html>