<?php 
if (!isset($result)) {
    exit("wrong way!");
}
$selected_cat_name = "";
$selected_cat_id = "";
?>
<div class="settings_main">
    <h1 style="color: white;">Categories</h1>

    <div class="admin_cat_list">
        <div class="admin_cat_item">
            <input type="text" id="AddCategories" placeholder="Enter categories name" style="flex: 90%;"/>
            <button onclick="add_cat(this, document.querySelector('input#AddCategories'))" style="flex: 10%;">Add</button>
        </div>
        <?php
            $query_cats = mysqli_query($connect, "SELECT * FROM `menu_cats` ORDER BY `menu_cats`.`id` DESC");
            if(mysqli_num_rows($query_cats) > 0){
                foreach($query_cats as $cat_item){
                if(isset($_GET['cat']) && $_GET['cat'] == $cat_item['id']){
                    $selected_cat_id = $cat_item['id'];
                    $selected_cat_name = $cat_item['name'];
                }
        ?>
        <div class="admin_cat_item" id="cat_row_<?php echo($cat_item['id']);?>">
            <input  style="flex: 80%;" type="text" id="cat_<?php echo($cat_item['id']);?>" data-id="<?php echo($cat_item['id']);?>" value="<?php echo strip_tags($cat_item['name']);?>" onclick='return true;'/>
            <button type="button" onclick='href("?p=1&cat=<?php echo($cat_item['id']);?>")'>Open</button>
            <button style="flex: 10%;" onclick="edit_cat(this, document.querySelector('input#cat_<?php echo($cat_item['id']);?>'))">Edit</button>
            <button style="flex: 10%;" onclick="del_cat(this, document.querySelector('div#cat_row_<?php echo($cat_item['id']);?>'))" data-id="<?php echo($cat_item['id']);?>">Delete</button>
        </div>
        <?php }
            } ?>
    </div>
    <form action="/json.php" method="POST" enctype="multipart/form-data" class="add-menu-item">
        <h3 style="color: white;">Add menu item</h3>
        <input required name="cover" type="file" accept="image/*">
        <input required placeholder="Name" name="name" type="text" >
        <input required placeholder="Price" name="price" type="number" step="0.01" >
        <input name="comment" placeholder="Comment (Optional)" type="text" value="">
        <select required name="cat">
            <option value="1" selected disabled>Select a categorie</option>
            <?php
                foreach ($query_cats as $key) {
                    echo "<option value=\"$key[id]\">$key[name]</option>";;
                }
            ?>
        </select>
        <div style="display: flex;">
            <button type="reset">Reset</button>
            <button type="submit" name="add_menu_item">Add</button>
        </div>
    </form>
    <?php
        if ($selected_cat_id != '') {
            require_once "admin-menu-list.php";
        }
    ?>
</div>
<script>

</script>