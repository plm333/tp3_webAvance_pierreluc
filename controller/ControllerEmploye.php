<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelEmploye');
RequirePage::requireModel('ModelPrivilege');

class ControllerEmploye{

    public function index(){
        //echo 'abc';
        twig::render('membre-login.php');
    }

    public function create(){
        if(CheckSession::sessionAuth()){
            if ($_SESSION['privilege_id'] == 1 || $_SESSION['privilege_id'] == 2){
                $privilege = new ModelPrivilege;
                $selectPrivilege = $privilege->select();
                twig::render('member-create-login.php', ['privileges' => $selectPrivilege]);
            }else{
                requirePage::redirectPage('home/error');
            }

            $validation = new Validation;
            extract($_POST);
            $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(45);
            $validation->name('prenom')->value($prenom)->pattern('alpha')->required()->max(45);
            $validation->name('courriel')->value($courriel)->pattern('email')->required()->max(50);
            $validation->name('username')->value($username)->pattern('email')->required()->max(50);
            $validation->name('password')->value($password)->max(20)->min(6);
            $validation->name('privilege_id')->value($privilege_id)->pattern('int')->required();
    
            if($validation->isSuccess()){
                $employe = new ModelEmploye;
                $options = [
                    'cost' => 10,
                ];
                $_POST['password']= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
                $employeInsert = $employe->insert($_POST);
                requirePage::redirectPage('membre/login');
            }else{
                $errors = $validation->displayErrors();
                $privilege = new ModelPrivilege;
                $selectPrivilege = $privilege->select();
                twig::render('membre-create-login.php', ['errors' => $errors, 'privileges' => $selectPrivilege, 'employe' => $_POST]);
            }
        }          
    }
    public function store(){

        if($_SESSION['privilege_id'] == 2){
            $_POST['privilege_id'] = 3; 
        }
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(45);
        $validation->name('prenom')->value($nom)->pattern('alpha')->required()->max(45);
        $validation->name('courriel')->value($courriel)->pattern('email')->required()->max(50);
        $validation->name('username')->value($username)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->max(20)->min(6);
        $validation->name('privilege_id')->value($privilege_id)->pattern('int')->required();

        if($validation->isSuccess()){
            $employe = new ModelEmploye;
            $options = [
                'cost' => 10,
            ];
            $_POST['password']= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $employeInsert = $employe->insert($_POST);
            requirePage::redirectPage('membre/login');
        }else{
            $errors = $validation->displayErrors();
            $privilege = new ModelPrivilege;
            $selectPrivilege = $privilege->select();
            twig::render('membre-create-login.php', ['errors' => $errors,'privileges' => $selectPrivilege, 'employe' => $_POST]);
        }
    }

}

?>