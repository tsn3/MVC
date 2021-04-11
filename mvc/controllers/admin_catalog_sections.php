<?php
namespace controllers;
use libs\Controller;

class Admin_Catalog_Sections extends Controller
{
    protected $tree_for_select = '';

    public function __construct()
    {
        parent::__construct();

        $this->view->title = 'Управление категориями каталога';
    }

    public function add()
    {
        $name = htmlspecialchars($_POST['section_name']);
        $code = htmlspecialchars($_POST['section_code']);
        $parent_id = htmlspecialchars($_POST['parent_section']);
        $dept_level = htmlspecialchars($_POST['dept_level']);
        if ($name != '' && $code != '') {
            $params = array(
                ':name' => $name,
                ':code' => $code,
                ':parent_id' => $parent_id,
                ':dept_level' => $dept_level >= 0 ? $dept_level + 1 : 0,
            );
            if ($id = $this->model->add($params)) {
                echo json_encode(array("error" => false, 'success' => true, "new_id" => $id));
            } else {
                echo json_encode(array("error" => "true"));
            }
        }
    }

    public function edit()
    {
        $id = htmlspecialchars($_POST['section_id']);
        $name = htmlspecialchars($_POST['section_name']);
        $code = htmlspecialchars($_POST['section_code']);
        $parent_id = htmlspecialchars($_POST['parent_section']);
        $dept_level = htmlspecialchars($_POST['dept_level']);

        if ($name !='' && $code !='') {
            $params = array(
                ':id' => $id,
                ':name' => $name,
                ':code' => $code,
                ':parent_id' => $parent_id,
                ':dept_level' => $dept_level >= 0 ? $dept_level + 1 : 0,
            );
            if ($id = $this->model->edit($params)) {
                echo json_encode(array("error" => false, 'success' => true));

            } else {
                echo json_encode(array("error" => "true"));
            }
        }
    }

    public function index()
    {
        if ($sections = $this->model->getSectionsList()) {
            $sections = $this->get_tree_for_array($sections);
            $this->view ->sections_list = $sections;
        }
        parent::index();
    }

    public function get_section_list()
    {
        if ($sections = $this->model->getSectionsList()) {
           $this->get_tree_for_select($sections);
            echo $this->tree_for_select;
        }
    }

    protected function get_tree_for_select($data, $level = 0, $pid = 0)
    {
        foreach ($data as $row) {
            if ($row['parent_id'] == $pid) {
                $this->tree_for_select .=
                    "<option value=" . $row["id"] .
                    " data-dept-level=" . $row["dept_level"] . ">"
                    . str_repeat('<span class="del_level_section">-</span>', $level) . $row["name"] . "</option>";
                $this->get_tree_for_select($data, $level +1, $row['id']);
            }
        }
    }

    protected function get_tree_for_array($data, $level = 0, $pid = 0 )
    {
        $result = array();
        foreach ($data as $row) {
            if ($row['parent_id'] == $pid) {
                $row['name'] = str_repeat('<span class="del_level_section">-</span>', $level) . $row['name'];
                $_res =  $this->get_tree_for_array($data, $level + 1, $row['id']);
                $row['count_sections'] = count($_res);
                $result[] = $row;
                $result = array_merge($result, $_res);
            }
        }
        return $result;
    }

    public function del($id)
    {
        if ($id > 0) {
            if ($this->model->del_section($id)) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false));
            }
        }
    }

    public function get_sections_table()
    {
        if ($sections = $this->model->getSectionsList()) {
            $sections = $this->get_tree_for_array($sections);
            $this->view->sections_list = $sections;
            $this->view->render(strtolower(get_class($this)), 'table_sections');
        }
    }

    public function get_by_id($id)
    {
        if ($section = $this->model->get_by_id($id)) {
            echo json_encode(array('success' => true, "section" => $section));
        } else {
            echo json_encode(array('success' => false));
        }
    }
}