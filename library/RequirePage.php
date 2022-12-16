<?php

class RequirePage{
    static public function requireModel($model){
        return require_once "model/$model.php";
    }
    static public function redirectPage($page){
        return header("Location:https://e2194803.webdev.cmaisonneuve.qc.ca/tp3_wa_pierreLucMoisan/".$page);
    }
}

?>