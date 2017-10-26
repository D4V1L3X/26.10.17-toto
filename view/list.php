<?php
    if (isset($resListStu) && !empty($resListStu))
    {
        ?>
            <table>
            <tr>
                <th>Student ID</th>
                <th>Student Lastname</th>
                <th>Student Firstname</th>
                <th>Student Email</th>
                <th>Student Birthdate</th>
                <th>About Student</th>
            </tr>
        <?php
        foreach ($resListStu as $k => $v)
        {
            ?>
                <tr>
                    <td><?= $v['stu_id'] ?></td>
                    <td><?= $v['stu_lastname'] ?></td>
                    <td><?= $v['stu_firstname'] ?></td>
                    <td><?= $v['stu_email'] ?></td>
                    <td><?= $v['stu_birthdate'] ?></td>
                    <td><a href='./student.php?link2Stu=<?= $v['stu_id'] ?>'>Details</a></td>
                </tr>
            <?php
        }
        echo '</table>';
    }
    else
    {
        echo 'Variable empty.<br>';
    }
?>
