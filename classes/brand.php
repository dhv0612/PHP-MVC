<?php

    include '../lib/database.php';
    include '../helpers/format.php';
?>

<?php
class brand{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);
        $brandname = mysqli_real_escape_string($this->db->link, $brandName);
        if(empty($brandName))
        {
            $alter = "<span class = 'error'> Brand name must be not empty </span>";
            return $alter;
        }
        else
        {
            $query = "insert into tbl_brand (brand_Name) values ('$brandName') ";
            $result = $this->db->insert($query);
            if($result)
            {
                $alter = "<span class ='success'>Insert brand successfully </span>";
                return $alter;
            }
            else 
            {
                $alter = "<span class ='error'>Insert brand fail </span>";
                return $alter;
            }
        }
    }

    public function show_brand()
    {
        $query = 'select * from tbl_brand order by brand_Id desc';
        $result = $this->db->select( $query );
        return $result;
    }

    public function delete_brand( $Id )
    {
        $Id =  mysqli_real_escape_string( $this->db->link, $Id );

        $query = "delete from tbl_brand where brand_Id = '$Id'";
        $result = $this->db->delete( $query );
        if ( $result ) {
            $alert = "<span class= 'success'>Delete brand successfully </span>";
            return $alert;
        } 
        else 
        {
            $alert = "<span class='error'>Delete brand fail </span>";
            return $alert;
        }
    }

    public function getbrandbyId( $brandId )
    {
        $query = "select * from tbl_brand where brand_Id = '$brandId'" ;
        $result = $this->db->select( $query );
        return $result;
    }

    public function update_brand( $brandName, $Id )
    {
        $brandName = $this->fm->validation( $brandName );

        $brandName = mysqli_real_escape_string( $this->db->link, $brandName );

        $Id =  mysqli_real_escape_string( $this->db->link, $Id );

        if ( empty( $brandName ) ) 
        {
            $alert = "<span class ='error'>Brand name must be not empty</span>";
            return $alert;
        } 
        else 
        {
            $query = "update tbl_brand set brand_Name = '$brandName' where brand_Id = '$Id'";
            $result = $this->db->update( $query );
            if ( $result ) 
            {
                $alert = "<span class= 'success'>Update brand successfully </span>";
                return $alert;
            }
            else 
            {
                $alert = "<span class='error'>Update brand fail </span>";
                return $alert;
            }
        }
    }

}
?>