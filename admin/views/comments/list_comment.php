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
<a style="color:blue;" href="<?= BASE_URL_ADM  ?>?act=comment_create"><button>Thêm Comment</button></a>

<div class="table">
    <table>
        <tr>
            <th>STT</th>
            <th>ID User</th>
            <th>ID Product</th>
            <th>Content</th>
            <th>Date Up</th>
            <th>Chức Năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($datacomment as $val) {
        ?>
            <tr>
                <td><?php echo  $stt++ ?></td>
                <td><?php echo $val['id'] ?></td>
                <td><?php echo $val['id_product'] ?></td>
                <td><?php echo $val['content'] ?></td>
                <td><?php echo $val['date'] ?></td>

                <td>
                    <a style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=comment_detail&id=<?= $val['id_comment'] ?>">Detail</a>
                    <a style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=comment_update&id=<?= $val['id_comment'] ?>">Update</a>
                    <a onclick="return confirm('Bạn Có Muốn Xóa ?')" style="color:blue; border-right:1px solid gray;" href="<?= BASE_URL_ADM ?>?act=comment_delete&id=<?= $val['id_comment'] ?>">Delete</a>

                </td>
            </tr>

        <?php } ?>
    </table>
</div>