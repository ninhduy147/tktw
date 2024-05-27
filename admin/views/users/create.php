<div style="padding: 50px;" class="form">
    <h2>Thêm User</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name User">
        </div>

        <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="phone">Phone : </label>
            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone Number">
        </div>

        <div class="form-group">
            <label for="type">Role : </label>
            <select class="form-control" name="type" id="">
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