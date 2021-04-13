<?php
namespace models;
//include_once  'views/admin_catalog_sections/functions.php';

use libs\Model;
use PDO;

class Admin_Catalog_Sections_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($params)
    {
        $sth = $this->db->prepare("INSERT sections (name, code, dept_level, parent_id) "." VALUES (:name, :code, :dept_level, :parent_id) ");
        $sth->execute($params);
        if ($sth->rowCount() > 0 ) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function edit($params)
    {
        $sth = $this->db->prepare("UPDATE sections SET name = :name, code = :code, dept_level = :dept_level, parent_id = :parent_id WHERE id =:id");
        $sth->execute($params);
        if ($sth->rowCount() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    public function getSectionsList()
    {
        $sth = $this->db->prepare("SELECT id, name, code, dept_level, parent_id FROM sections");
        $sth->execute(array());
        if ($sth->rowCount() > 0 ) {
            return  $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function del_section($id)
    {
        $sth = $this->db->prepare("DELETE FROM sections WHERE id = :id ");
        $sth->execute(array(':id' => $id));
        if ( $sth->rowCount() > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    public function get_by_id($id)
    {
        $sth = $this->db->prepare("SELECT id, name, code, dept_level, parent_id FROM sections WHERE id = :id");
        $sth->execute(array(':id' => $id));
        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

function get_all_records(){
//    $sth = $this->db->prepare("SELECT id, name, code, dept_level, parent_id FROM sections");
//    $sth->execute(array());

    $con = getdb();
    $Sql = "SELECT * FROM employeeinfo";
    $result = mysqli_query($con, $Sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                 <thead><tr><th>EMP ID</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Registration Date</th>
                            </tr></thead><tbody>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['emp_id']."</td>
                       <td>" . $row['firstname']."</td>
                       <td>" . $row['lastname']."</td>
                       <td>" . $row['email']."</td>
                       <td>" . $row['reg_date']."</td></tr>";
        }

        echo "</tbody></table></div>";

    } else {
        echo "you have no records";
    }
}

//    public function export()
//    {
//        $sth = $this->db->prepare("SELECT * FROM sections");
//        $sth->execute(array());
//        if ($sth->rowCount() > 0 ) {
//            return  $sth->fetchAll(PDO::FETCH_ASSOC);
//        } else {
//            return false;
//        }
//    }

}
