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
<a style="color:blue;" href="<?= BASE_URL_ADM  ?>?act=tag_create"><button>Thêm Tag</button></a>

<div class="table">
    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Danh Mục</th>
            <th>Giá</th>
            <th>Mô Tả</th>
            <th>Số Lượng</th>
            <th>Avatar</th>
            <th>Chức Năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($dataTag as $val) {
        ?>
            <tr>
                <td><?php echo  $stt++ ?></td>
                <td><?php echo $val['name'] ?></td>
                <td><?php echo $val['name_category'] ?></td>
                <td><?php echo $val['price'] ?></td>
                <td><?php echo $val['description'] ?></td>
                <td><?php echo $val['quantity'] ?></td>
                <td>
                    <img style="height : 70px; width:70px" src="<?= $val['avatar'] ?>" alt="">

                </td>
                <td>
                    <a style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=detail_tag&id=<?= $val['id_product'] ?>">Detail</a>
                    <a style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=tag_update&id=<?= $val['id_product'] ?>">Update</a>
                    <a onclick="return confirm('Bạn Có Muốn Xóa ?')" style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=tag_delete&id=<?= $val['id_product'] ?>">Delete</a>

                </td>
            </tr>

        <?php } ?>
    </table>
</div>