<?php if (isset($resListStu) && !empty($resListStu)) { ?>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Lastname</th>
            <th>Student Firstname</th>
            <th>Student Email</th>
            <th>Student Birthdate</th>
            <th>About Student</th>
        </tr>
        <?php foreach ($resListStu as $k => $v) { ?>
        <tr>
            <td><?= $v['stu_id'] ?></td>
            <td><?= htmlentities($v['stu_lastname']) ?></td>
            <td><?= htmlentities($v['stu_firstname']) ?></td>
            <td><?= $v['stu_email'] ?></td>
            <td><?= $v['stu_birthdate'] ?></td>
            <td><button class="stuDetails" value="<?= $v['stu_id'] ?>">Details</button></td>
        </tr>
        <?php } ?>
    </table>
    <div id="list-btns-container">
        <form method="get">
            <input type="submit" value="Previous" id="left-btn-prev">
            <input type="text" name="page" value="<?= $_GET['page'] > 1 ? $_GET['page'] - 1 : 1 ?>" hidden>
        </form>
        <form method="get">
            <input type="submit" value="Next" id="right-btn-next">
            <input type="text" name="page" value="<?= $_GET['page'] <= $pageMax ? $_GET['page'] + 1 : $_GET['page'] ?>" hidden>
        </form>
    </div>
<?php } else { echo 'Variable empty.<br>'; } ?>

<div id="popupStudent"></div>