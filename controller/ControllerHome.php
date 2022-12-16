<?php

class ControllerHome
{

  public function index()
  {

    $data = [
      'titre1' => 'La Bibliothèque',
      'titre2' => 'Canva',
      'name' => 'Bonjour Marcos!',
      'welcome' => 'Bienvenue sur le site de la bibliothèque Canva!',
      'cliquer' => 'Accéder à la liste des membres'
    ];
    twig::render("home-index.php", $data);
  }

  public function error()
  {
    twig::render("home-error.php");
  }
}
