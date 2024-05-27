<style>
    table {
        text-align: center;
        border: 3px solid gray;
        margin: 50px auto;
        width: 1200px;
    }

    table tr th {
        border: 1px solid red;
        padding: 10px;
    }

    table tr td {
        border: 1px solid red;
        padding: 10px;
    }
</style>
</style>
<a style="color:blue;" href="<?= BASE_URL_ADM  ?>?act=user_create"><button>Thêm User</button></a>

<div class="table">
    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Pass</th>
            <th>Email</th>
            <th>Phone_number</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Chức Năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($dataUser as $val) {
        ?>
            <tr>
                <td><?php echo  $stt++ ?></td>
                <td><?php echo $val['username'] ?></td>
                <td><?php echo $val['password'] ?></td>
                <td><?php echo $val['email'] ?></td>
                <td><?php echo $val['phone_number'] ?></td>
                <td><?php echo $val['name_role'] ?></td>
                <td><?php echo $val['avatar'] ?></td>
                <td>
                    <a style="color:blue;" href="<?= BASE_URL_ADM ?>?act=detail_user&id=<?= $val['id'] ?>">Thông tin chi tiết</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>