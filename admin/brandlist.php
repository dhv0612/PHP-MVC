<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php
$brand = new brand();
if(isset($_GET['delid'])|| ($GET['delid']) != null){
	$id = $_GET['delid']; 
	$delete_brand = $brand->delete_brand($id);
}


?>

<div class="grid_10">
    <div class="box round first grid">
		<h2>Brand List</h2>
		<?php
				if (isset($delete_brand))
				{
                    echo $delete_brand;
                }
            ?>
        <div class="block">
           
            <table class="data display datatable" id="example">
				
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$show_brand = $brand->show_brand();
							
						if($show_brand)
						{
							$i=0;
							while($result = $show_brand->fetch_assoc())
							{
								$i++;				
                    			echo "<tr class='odd gradeX'>";
                        		echo "<td>",$i,"</td>";
								echo "<td>", $result['brand_Name'],"</td>";
								?>
                    <td><a href="brandedit.php?brand_Id= <?php echo $result['brand_Id']?>">Edit</a> || <a
                            onclick="return confirm('Are you want to delete ?')"
                            href="?delid=<?php echo $result['brand_Id']?>">Delete</a></td>
                    <?php
								echo "</tr>";				
							}
						}
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>