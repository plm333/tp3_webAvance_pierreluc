<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelMembre');
RequirePage::requireModel('ModelPrivilege');

class ControllerMembre{

    public function index(){
        //CheckSession::sessionAuth();
        $membre = new ModelMembre;
        $select = $membre->select();
        twig::render("membre-index.php", ['membres' => $select, 
                                        'membre_list' => "Liste des Membres"]);
    }

    public function create(){
        //CheckSession::sessionAuth();
        $privilege = new ModelPrivilege;
        $select = $privilege->select();
        // print_r($select);
        // die();
        twig::render('membre-create.php', ['privileges'=> $select]);  
    }

    public function store(){
    // //  // print_r($_POST);
    // // $options = [
    // // 'cost' => 10,
    // // ];
    // // $_POST['password']= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    //     $membre = new ModelMembre;
    //     $insert = $membre->insert($_POST);

    //     requirePage::redirectPage('membre');


        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(45);
        $validation->name('prenom')->value($prenom)->pattern('alpha')->required()->max(45);
        $validation->name('courriel')->value($courriel)->pattern('email')->required()->max(50);
        $validation->name('username')->value($username)->pattern('email')->required()->max(50);
        $validation->name('password')->value($password)->max(20)->min(6);
        $validation->name('privilege_id')->value($privilege_id)->pattern('int')->required();

        if($validation->isSuccess()){
            $membre = new ModelMembre;
            $options = [
                'cost' => 10,
            ];
            $_POST['password']= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $membreInsert = $membre->insert($_POST);
            requirePage::redirectPage('membre');
        }else{
            $errors = $validation->displayErrors();
            $privilege = new ModelPrivilege;
            $selectPrivilege = $privilege->select();
            twig::render('membre-create.php', ['errors' => $errors,'privileges' => $selectPrivilege, 'employe' => $_POST]);
        }
    }

    public function show($id){
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);
        twig::render('membre-show.php', ['membre' => $selectMembre]);
    }

    public function edit($id){
        $membre = new ModelMembre;
        $selectMembre = $membre->selectId($id);
        twig::render('membre-edit.php', ['membre' => $selectMembre]);
    }

    public function update(){
        $membre = new ModelMembre;
        $update = $membre->update($_POST);
        RequirePage::redirectPage('membre/show/'.$_POST['id']);
    }

    public function delete(){
        $membre = new ModelMembre;
        $delete = $membre->delete($_POST['id']);
        RequirePage::redirectPage('membre');
    }

}
?>
