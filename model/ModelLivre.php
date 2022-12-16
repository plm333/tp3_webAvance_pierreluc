<?php

class ModelLivre extends Crud {

    protected $table = 'livre';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'isbn', 'titre', 'auteur', 'prix'];

}

?>