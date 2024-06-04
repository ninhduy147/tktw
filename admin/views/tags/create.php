<style>
    .err ul li {
        color: red;
    }
</style>
<div style="padding: 50px;" class="form">
    <h2>Thêm Tag</h2>



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
            <input type="text" name="name" id="name" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['name'] : null ?>" placeholder="Name Tag">


        </div>

        <div class="form-group">
            <label for="password">Price : </label>
            <input type="number" name="price" id="password" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['price'] : null ?>" placeholder="Price">
        </div>

        <div class="form-group">
            <label for="email">Description :</label>
            <input type="text" name="description" id="email" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['description'] : null ?>" class="form-control" id="exampleInputEmail1" placeholder="Description">
        </div>

        <div class="form-group">
            <label for="phone">Quantity : </label>
            <input type="number" name="quantity" id="phone" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['quantity'] : null ?>" placeholder="Quantity">
        </div>

        <div class="form-group">
            <label for="type">Role : </label>
            <select class="form-control" name="category" id="">
                <option value="">--Chọn--</option>
                <?php
                foreach ($detail_tag as $val) {
                ?>
                    <option value="<?php echo $val['category_id'] ?>"><?php echo $val['name_category'] ?></option>

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

<?php
if (isset($_SESSION['datas'])) {
    unset($_SESSION['datas']);
} ?>