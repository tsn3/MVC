<?php

class Admin_Catalog_Sections extends Controller {
    public function __construct(){
        parent::__construct();

        $this->view->title = 'Управление категориями каталога';
    }

    public function add(){
        $name = htmlspecialchars($_POST['section_name']);
        $code = htmlspecialchars($_POST['section_code']);
        $perent_id = htmlspecialchars($_POST['parent_section']);
        if ($name !='' && $code !=''){
            $params = array(
                ':name' => $name,
                ':code' => $code,
                ':parent_id' => NULL,
                ':dept_level' => NULL,
            );
            if ($id = $this->model->add($params) ){
                echo json_encode(array("error" => false, 'success' => true, "new_id" => $id));

            }else{
                echo json_encode(array("error" => "true"));
            }
        }
    }

    public function index()
    {
        if ($sections = $this->model->getSectionsList() ){
            $this->view->sections_list = $sections;
        }
        parent::index();
    }
}