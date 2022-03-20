
    <?php echo "<h1 style='color: white;'> Menus in $selected_cat_name </h1>"; ?>
    <div class="admin_menus_list">
        <?php
        $query = mysqli_query($connect, "SELECT * FROM `menu_items` WHERE `menu_cats_id` = '$selected_cat_id'");
        if(mysqli_num_rows($query) > 0){
            foreach ($query as $key) {
                ?>
        <form enctype="multipart/form-data" method="POST" action="/json.php"  class="menu-list-row">
            <div class="menu-name-comment-price">
                <div class="menu-img">
                    <img src="<?php echo $key['pic']; ?>" alt="<?php echo $key['name']; ?>">
                </div>
                <div class="menu-name">
                    <input name="cover" type="file" accept="image/*">
                    <input required name="name" type="text" value="<?php echo $key['name']; ?>">
                    <input required name="price" type="number" step="0.01" value="<?php echo $key['price']; ?>">
                    <input name="comment" type="text" value="<?php echo $key['comment']; ?>">
                    <select name="cat">
                        <option value="0" disabled>Select a categorie</option>
                        <?php
                            foreach ($query_cats as $key_cats) {
                                if($selected_cat_id == $key_cats['id']){
                                    echo "<option selected value=\"$key_cats[id]\">$key_cats[name]</option>";
                                }else{
                                    echo "<option value=\"$key_cats[id]\">$key_cats[name]</option>";
                                }
                            }
                        ?>
                    </select>
                    <div class="menu-action-btn">
                        <button onclick="if(!confirm('Are sure to delete!')){return false;}" name="delete_menu_item" value="<?php echo $key['id']; ?>">Delete</button>
                        <button style="color: white;" name="update_menu_item" value="<?php echo $key['id']; ?>">Update</button>
                    </div>
                </div>
            </div>
        </form>
                <?php
            }
        }else{
            echo "<div style='color: red'>No item in this category</div>";
        }
        ?>
    </div>