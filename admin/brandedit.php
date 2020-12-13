
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php
$brand = new brand();
    if(isset($_GET['brand_Id'])|| ($GET['brand_Id']) != null){
        $id = $_GET['brand_Id']; 
    }else{
        echo "<script> window.location='brandlist.php' </script>";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$brandName = $_POST['brandName'];
		$update_brand = $brand->update_brand($brandName, $id);
	}

?>
<?php
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit New Brand</h2>
                <?php
  
                    if (isset($update_brand)){
                        echo $update_brand;
                    }

                    $get_brand_name = $brand->getbrandbyId($id);  
                    if (isset($get_brand_name)){
                        while( $result = $get_brand_name->fetch_assoc()){
                    
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Edit Brand Name..." class="medium" value="<?php echo $result['brand_Name']?>"/>
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