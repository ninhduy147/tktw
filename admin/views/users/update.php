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
            <input type="text" name="username" id="name" class="form-control" placeholder="Name User" value="<?= $userr['username']; ?>">
        </div>



        <div class="form-group">
            <label for="password">Password : </label>
            <input type="text" name="password" id="password" class="form-control" placeholder="Password" value="<?= $userr['password']; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $userr['email'] ?>">
        </div>

        <div class="form-group">
            <label for="phone">Phone : </label>
            <input type="number" v name="phone_number" id="phone" class="form-control" placeholder="Phone Number" value="<?= $userr['phone_number'] ?>">
        </div>

        <div class="form-group">
            <label for="type">Role : </label>
            <select class="form-control" name="role" id="">
                <option value="">--Chọn--</option>
                <?php
                foreach ($update_role as $val) {
                ?>
                    <option <?php if ($dataUser['id_role']  = $val['id_role']) echo 'selected' ?> value="<?php echo $val['id_role'] ?>"><?php echo $val['name_role'] ?> </option>

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