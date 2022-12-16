<?php

class ModelLog extends Crud {

    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'username', 'password'];

}


?>