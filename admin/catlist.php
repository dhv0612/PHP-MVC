﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php
$cate = new category();
if(isset($_GET['delid'])|| ($GET['delid']) != null){
	$id = $_GET['delid']; 
	$delete_cate = $cate->delete_category($id);
}


?>

<div class="grid_10">
    <div class="box round first grid">
		<h2>Category List</h2>
		<?php
				if (isset($delete_cate))
				{
                    echo $delete_cate;
                }
            ?>
        <div class="block">
           
            <table class="data display datatable" id="example">
				
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$show_cate = $cate->show_category();
							
						if($show_cate)
						{
							$i=0;
							while($result = $show_cate->fetch_assoc())
							{
								$i++;				
                    			echo "<tr class='odd gradeX'>";
                        		echo "<td>",$i,"</td>";
								echo "<td>", $result['cat_Name'],"</td>";
								?>
                    <td><a href="catedit.php?cat_Id= <?php echo $result['cat_Id']?>">Edit</a> || <a
                            onclick="return confirm('Are you want to delete ?')"
                            href="?delid=<?php echo $result['cat_Id']?>">Delete</a></td>
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