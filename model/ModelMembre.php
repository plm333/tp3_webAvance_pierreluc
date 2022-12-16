<?php

class ModelMembre extends Crud {

    protected $table = 'membre';
    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'nom', 'prenom', 'adresse', 'code_postal', 'telephone', 'courriel', 'date_naissance', 'date_inscription', 'username', 'password', 'privilege_id', 'log_id'];


        public function checkMembre($data){
            extract($data);
            $sql = "SELECT * FROM $this->table WHERE username = ?";
            $stmt = $this->prepare($sql);

            $stmt->execute(array($username));
            $count = $stmt->rowCount();
            if($count == 1){
                $membre_info = $stmt->fetch();
                if(password_verify($password, $membre_info['password'])){
                        
                    session_regenerate_id();
                    $_SESSION['membre_id'] = $membre_info['id'];
                    $_SESSION['privilege_id'] = $membre_info['privilege_id'];
                    $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                    
                    requirePage::redirectPage('membre');
                    
                }else{
                    return "<ul><li>Vérifier le mot de passe</li></ul>";  
                }
            }else{
                return "<ul><li>Le nom d'utilisateur n'existe pas</li></ul>";
            }
        } 


}

?>