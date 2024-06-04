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
<?php if (isset($_SESSION['suscess'])) : ?>
    <div class="suscess">
        <?= $_SESSION['suscess'] ?>
    </div>
    <?php unset($_SESSION['suscess']) ?>

<?php endif; ?>
<a style="color:blue;" href="<?= BASE_URL_ADM  ?>?act=category_create"><button style="background-color:aqua">Thêm Category</button></a>

<div class="table">
    <table>
        <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Danh Mục</th>
            <th>Mô Tả</th>
            <th>Chức Năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($datacategory as $val) {
        ?>
            <tr>
                <td><?php echo  $stt++ ?></td>
                <td><?php echo $val['code'] ?></td>
                <td><?php echo $val['name_category'] ?></td>
                <td><?php echo $val['description'] ?></td>

                <td>
                    <a style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=category_update&id=<?= $val['category_id'] ?>">Update</a>
                    <a onclick="return confirm('Bạn Có Muốn Xóa ?')" style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=category_delete&id=<?= $val['category_id'] ?>">Delete</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>