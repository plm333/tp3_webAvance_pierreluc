<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ path }}css\style.css">
</head>
<body>
    <header>
        <!-- <h1>{{ pageHeader}}</h1> -->
        <nav>
            <a href="{{path}}membre">Membre</a>
            <a href="{{path}}employe">Employe</a>
            {% if guest %}
            <a href="{{path}}login">Login</a>
            {% else %}
            <a href="{{path}}login/logout">Logout</a>
            <a href="{{path}}login/store">Journal de bord</a>
            <a href="{{path}}generate-pdf.php">Envoyer un PDF</a>
            {% endif %}
        </nav>
        <!-- <nav>
            <ul class="nav__menu">
                <li><a href="{{path}}membre">Membre</a></li>
                <li><a href="{{path}}employe">Employe</a></li>
                {% if guest %}
                <li><a href="{{path}}login">Login</a></li>
                {% else %}
                <li><a href="{{path}}login/logout">Logout</a></li>
                {% endif %}
            </ul>
        </nav> -->
    </header>
    <aside>
    {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
    </aside>