<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php
$cate = new category();
    if(isset($_GET['cat_Id'])|| ($GET['cat_Id']) != null){
        $id = $_GET['cat_Id']; 
    }else{
        echo "<script> window.location='catlist.php' </script>";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cateName = $_POST['cateName'];
		$update_cate = $cate->update_category($cateName, $id);
	}


?>
<?php
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit New Category</h2>
                <?php
  
                    if (isset($update_cate)){
                        echo $update_cate;
                    }

                    $get_cate_name = $cate->getcatbyId($id);  
                    if (isset($get_cate_name)){
                        while( $result = $get_cate_name->fetch_assoc()){
                    
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cateName" placeholder="Edit Category Name..." class="medium" value="<?php echo $result['cat_Name']?>"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }}          
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>