<style>
    .err ul li {
        color: red;
    }
</style>
<div style="padding: 50px;" class="form">
    <h2>Thêm User</h2>



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
            <input type="text" name="username" id="name" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['username'] : null ?>" placeholder="Name User">
        </div>

        <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['password'] : null ?>" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['email'] : null ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="phone">Phone : </label>
            <input type="number" name="phone_number" id="phone" class="form-control" value="<?= isset($_SESSION['datas']) ? $_SESSION['datas']['phone_number'] : null ?>" placeholder="Phone Number">
        </div>

        <div class="form-group">
            <label for="type">Role : </label>
            <select class="form-control" name="role" id="">
                <option value="">--Chọn--</option>
                <?php
                foreach ($detail_role as $val) {
                ?>
                    <option value="<?php echo $val['id_role'] ?>"><?php echo $val['name_role'] ?></option>

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

<a style="color:blue;" href="<?= BASE_URL_ADM ?>?act=users"><button>Back to List Users</button></a>

<?php
if (isset($_SESSION['datas'])) {
    unset($_SESSION['datas']);
} ?>