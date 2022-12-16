<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelLog');


class ControllerLogin{

    public function index(){
        twig::render('membre-login.php');
    }

    public function auth(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('username')->value($username)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->required();

        if($validation->isSuccess()){

            $membre = new ModelMembre;
            $checkMembre = $membre->checkMembre($_POST);
            
            twig::render('membre-login.php', ['errors' => $checkMembre, 'membre' => $_POST]);
        
        }else{
            $errors = $validation->displayErrors();
            twig::render('membre-login.php', ['errors' => $errors, 'membre' => $_POST]);
        }
    }

    public function store(){
        if(CheckSession::sessionAuth()){
            if ($_SESSION['privilege_id'] == 1 || $_SESSION['privilege_id'] == 2){
                $log = new ModelLog;
                $selectLog= $log->select();
                twig::render('membre-log.php', ['logs' => $selectLog]);
            }else{
                requirePage::redirectPage('home/error');
            }
        } 
    }

    public function logout(){
        session_destroy();
        requirePage::redirectPage('login');
    }
}
