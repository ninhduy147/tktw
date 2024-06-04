<style>
    .err ul li {
        color: red;
    }
</style>
<div style="padding: 50px;" class="form">
    <h2>Thêm Category</h2>



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
            <label for="name">code : </label>
            <input type="text" name="code" id="name" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['code'] : null ?>" placeholder="Code">
        </div>

        <div class="form-group">
            <label for="email">Tên Danh Mục :</label>
            <input type="text" name="name_category" id="email" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['name_category'] : null ?>" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
        </div>

        <div class="form-group">
            <label for="phone">Description : </label>
            <input type="text" name="description" id="phone" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['description'] : null ?>" placeholder="Description">
        </div>

        <button type="submit" name="" class="btn btn-primary">Submit</button>

    </form>

</div>

<a style="color:blue;" href="<?= BASE_URL_ADM ?>?act=categorys"><button>Back to List Users</button></a>

<?php
if (isset($_SESSION['datas'])) {
    unset($_SESSION['datas']);
} ?>