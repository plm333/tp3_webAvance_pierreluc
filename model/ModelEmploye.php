<?php

class ModelEmploye extends Crud {

    protected $table = 'employe';
    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'num_employe', 'job_titre'];

    public function checkEmploye($data){
        extract($data);
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();
        if($count == 1){
            $employe_info = $stmt->fetch();
            if(password_verify($password, $employe_info['password'])){
                    
                session_regenerate_id();
                $_SESSION['employe_id'] = $employe_info['id'];
                $_SESSION['privilege_id'] = $employe_info['privilege_id'];
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