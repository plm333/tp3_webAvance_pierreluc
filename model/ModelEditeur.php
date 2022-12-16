<?php

class ModelEditeur extends Crud {

    protected $table = 'editeur';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nom', 'prenom', 'adresse', 'code_postal', 'telephone', 'courriel'];

}

?>