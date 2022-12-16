<?php

class ModelEmprunt extends Crud {

    protected $table = 'emprunt';
    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'date_emprunt'];

}

?>