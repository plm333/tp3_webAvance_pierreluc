{{ include('header.php', {title: 'Membre'}) }}

    <h5 class="titre1 lienAccueil">La Bibliothèque</a></h5>
    <h1><a class="titre2 lienAccueil" href="{{ path }}home/index">Canva</a></h1>
    <main>
        <section>
            <h1>Journal de bord</h1><br>
            <table border="1">
                <thead>
                    <tr>
                        <th>Adresse Ip</th>
                        <th>Nom d'utilisateur</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    {% for membre in membres %}
                    <tr>
                        <td>{{ log.adresse_id }}</td>
                        <td>{{ log.username }}</td>
                        <td>{{ log.date }}</td>
                    </tr>
                    {% endfor %}
                </tbody>               
            </table><br>
        </section>
    </main>
    <footer>
    © Pierre-Luc Moisan - Tous les droits réservés
    </footer>
</body>
</html>