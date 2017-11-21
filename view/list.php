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
            <td><button type="button" class="btn btn-primary stuDetails" value="<?= $v['stu_id'] ?>">Details</button></td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Birth Date</th>
                                <th>Age</th>
                                <th>City</th>
                                <th>Friendliness</th>
                                <th>Session #</th>
                                <th>Training Name</th>
                            </tr>
                        <tr id="stuDetailsRow"></tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>