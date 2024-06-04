<style>
    .err ul li {
        color: red;
    }
</style>
<div style="padding: 50px;" class="form">
    <h2>Thêm Comment</h2>



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
            <label for="type">ID User : </label>
            <select class="form-control" name="id" id="">
                <option value="">--Chọn--</option>
                <?php
                foreach ($data_comment_user as $val) {
                ?>
                    <option value="<?php echo $val['id'] ?>"><?php echo $val['username'] ?></option>

                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="type">ID Product : </label>
            <select class="form-control" name="id_product" id="">
                <option value="">--Chọn--</option>
                <?php
                foreach ($data_comment_prd as $val) {
                ?>
                    <option value="<?php echo $val['id_product'] ?>"><?php echo $val['name'] ?></option>

                <?php } ?>
            </select>
        </div>


        <div class="form-group">
            <label for="email">Content :</label>
            <input type="text" name="content" id="email" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['content'] : null ?>" class="form-control" id="exampleInputEmail1" placeholder="content">
        </div>



        <button type="submit" name="" class="btn btn-primary">Submit</button>

    </form>

</div>

<a style="color:blue;" href="<?= BASE_URL_ADM ?>?act=comments"><button>Back to List Users</button></a>

<?php
if (isset($_SESSION['datas'])) {
    unset($_SESSION['datas']);
} ?>