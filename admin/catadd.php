﻿<?php include 'inc/header.php';
?>
<?php include 'inc/sidebar.php';
?>
<?php include '../classes/category.php'?>
<?php
$cate = new category();
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $cateName = $_POST['cateName'];

    $insert_cate = $cate->insert_category( $cateName );
}
?>
<div class='grid_10'>
    <div class='box round first grid'>
        <h2>Add New Category</h2>
        <?php
if ( isset( $insert_cate ) ) {
    echo $insert_cate;
}
?>
        <div class='block copyblock'>
            <form action='catadd.php' method='POST'>
                <table class='form'>
                    <tr>
                        <td>
                            <input type='text' name='cateName' placeholder='Enter Category Name...' class='medium' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='submit' name='submit' Value='Save' />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';
?>