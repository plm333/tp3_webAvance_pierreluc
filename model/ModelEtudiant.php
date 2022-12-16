<?php

class ModelEtudiant extends Crud {

    protected $table = 'etudiant';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'code_permanent'];

    
    public function checkEtudiant($data){
        extract($data);
        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();
        if($count == 1){
            $etudiant_info = $stmt->fetch();
            if(password_verify($password, $etudiant_info['password'])){
                    
                session_regenerate_id();
                $_SESSION['etudiant_id'] = $etudiant_info['id'];
                $_SESSION['privilege_id'] = $etudiant_info['privilege_id'];
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