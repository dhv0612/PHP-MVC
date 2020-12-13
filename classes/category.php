<?php

include '../lib/database.php';
include '../helpers/format.php';

?>

<?php

class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_category($catName )
    {
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string( $this->db->link, $catName );

        if ( empty( $catName ) ) {
            $alert = "<span class ='error'>Category name must be not empty</span>";
            return $alert;
        } else {
            $query = "insert into tbl_category (cat_Name) values ('$catName') ";
            $result = $this->db->insert( $query );
            if ( $result ) {
                $alert = "<span class= 'success'>Insert category successfully </span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert category fail </span>";
                return $alert;
            }
        }
    }

    public function show_category()
    {
        $query = 'select * from tbl_category order by cat_Id desc';
        $result = $this->db->select( $query );
        return $result;
    }

    public function getcatbyId( $catId )
    {
        $query = "select * from tbl_category where cat_Id = '$catId'" ;
        $result = $this->db->select( $query );
        return $result;
    }

    public function update_category( $catName, $Id )
    {
        $catName = $this->fm->validation( $catName );

        $catName = mysqli_real_escape_string( $this->db->link, $catName );

        $Id =  mysqli_real_escape_string( $this->db->link, $Id );

        if ( empty( $catName ) ) 
        {
            $alert = "<span class ='error'>Category name must be not empty</span>";
            return $alert;
        } 
        else 
        {
            $query = "update tbl_category set cat_Name = '$catName' where cat_Id = '$Id'";
            $result = $this->db->update( $query );
            if ( $result ) 
            {
                $alert = "<span class= 'success'>Update category successfully </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='error'>Update category fail </span>";
                return $alert;
            }
        }
    }

    public function delete_category( $Id )
    {
        $Id =  mysqli_real_escape_string( $this->db->link, $Id );

        $query = "delete from tbl_category where cat_Id = '$Id'";
        $result = $this->db->delete( $query );
        if ( $result ) {
            $alert = "<span class= 'success'>Delete category successfully </span>";
            return $alert;
        } 
        else 
        {
            $alert = "<span class='error'>Delete category fail </span>";
            return $alert;
        }
    }
}
?>