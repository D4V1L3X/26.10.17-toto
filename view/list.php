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
                    <td><a href='./student.php?id2stu=<?= $v['stu_id'] ?>'>Details</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { echo 'Variable empty.<br>'; } ?>
