<style>
    .err ul li {
        color: red;
    }
</style>

<div style="padding: 50px;" class="form">
    <h2>Update</h2>

    <?php if (isset($_SESSION['suscess'])) : ?>
        <div class="suscess">
            <?= $_SESSION['suscess'] ?>
        </div>
        <?php unset($_SESSION['suscess']) ?>

    <?php endif; ?>

    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="err">
            <ul>
                <?php foreach ($_SESSION['errors'] as $errors) : ?>
                    <li><?= $errors ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']) ?>

    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name User" value="<?= $tagr['name']; ?>">
        </div>



        <div class="form-group">
            <label for="password">Password : </label>
            <input type="text" name="price" id="password" class="form-control" placeholder="Price" value="<?= $tagr['price']; ?>">
        </div>

        <div class="form-group">
            <label for="email">Description :</label>
            <input type="text" name="description" id="email" class="form-control" id="exampleInputEmail1" placeholder="Description" value="<?= $tagr['description'] ?>">
        </div>

        <div class="form-group">
            <label for="phone">Quantity : </label>
            <input type="number" name="quantity" id="phone" class="form-control" placeholder="Quantity" value="<?= $tagr['quantity'] ?>">
        </div>

        <div class="form-group">
            <label for="type">Category : </label>
            <select class="form-control" name="category" id="">
                <option value="">--Chọn--</option>
                <?php
                foreach ($update_tag as $val) {
                ?>
                    <option <?php if ($dataTag['category_id']  = $val['category_id']) echo 'selected' ?> value="<?php echo $val['category_id'] ?>"><?php echo $val['name_category'] ?> </option>

                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar : </label>
            <input type="file" name="avatar" id="avatar" class="form-control">

        </div>

        <button type="submit" name="" class="btn btn-primary">Submit</button>

    </form>

</div>

<a style="color:blue;" href="<?= BASE_URL_ADM ?>?act=tags"><button>Back to List Users</button></a>