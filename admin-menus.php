<?php 
if (!isset($result)) {
    exit("wrong way!");
}
?>
<div class="settings_main">
    <h1 style="color: white;">Categories</h1>

    <div class="admin_cat_list">
        <div class="admin_cat_item">
            <input type="text" id="AddCategories" />
            <button onclick="add_cat(this, document.querySelector('input#AddCategories'))">Add</button>
        </div>
        <?php
            $query = mysqli_query($connect, "SELECT * FROM `menu_cats` ORDER BY `menu_cats`.`id` DESC");
            if(mysqli_num_rows($query) > 0){
                foreach($query as $cat_item){
        ?>
        <div class="admin_cat_item" id="cat_row_<?php echo($cat_item['id']);?>">
            <input type="text" id="cat_<?php echo($cat_item['id']);?>" data-id="<?php echo($cat_item['id']);?>" value="<?php echo strip_tags($cat_item['name']);?>" onclick='href("?p=1&cat=<?php echo($cat_item['id']);?>")'/>
            <button onclick="edit_cat(this, document.querySelector('input#cat_<?php echo($cat_item['id']);?>'))">Edit</button>
            <button onclick="del_cat(this, document.querySelector('div#cat_row_<?php echo($cat_item['id']);?>'))" data-id="<?php echo($cat_item['id']);?>">Delete</button>
        </div>
        <?php }
            } ?>
    </div>
    <?
        if (isset($_GET['cat'])) {
            require_once "admin-menu-list.php";
        }
    ?>
</div>
<script>

</script>