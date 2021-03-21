<?php

class Admin_Catalog_Sections extends Controller {

    protected $tree_for_select = '';

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

    public function get_section_list(){
        if ($sections = $this->model->getSectionsList() ){

           $this->get_tree_for_select($sections);

            echo $this->tree_for_select;
        }
    }

    public function get_tree_for_select($data, $level = 0, $pid = ''){
        foreach ($data as $row){
            if ($row['parent_id'] == $pid){
                $this->tree_for_select .=
                    "<option value=".$row["id"].
                    " data-dept-level=".$row["dept_level"].">"
                    .str_pad('', $level, '- ').$row["name"]."</option>";
                $this->get_tree_for_select($data, $level +1, $row['id'] );
            }
        }
    }
}
// <option value="id" data-dept-level="dl"> - - - name </option>