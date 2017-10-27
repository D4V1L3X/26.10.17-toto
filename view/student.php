<!-- TODO REPAIR those IF's -->


<form>
    <label>
        Student ID:<br>
        <input type='text' value='<?= $resStu['stu_id'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Lastname:<br>
        <input type='text' value='<?= $resStu['stu_lastname'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Firstname:<br>
        <input type='text' value='<?= $resStu['stu_firstname'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Email:<br>
        <input type='text' value='<?= $resStu['stu_email'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Birthdate:<br>
        <input type='text' value='<?= $resStu['stu_birthdate'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Age:<br>
        <input type='text' value='<?= empty($stuCalcAge) ? '' : $stuCalcAge ?>' readonly>
    </label><br><br>
    <label>
        City:<br>
        <input type='text' value='<?= $resStu['cit_name'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Friendliness:<br>
        <input type='text' value='<?= $resStu['stu_friendliness'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Session #:<br>
        <input type='text' value='<?= $resStu['ses_number'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label><br><br>
    <label>
        Session Name:<br>
        <input type='text' value='<?= $resStu['tra_name'] ?>'<?php isset($ceckStuNew) ? '' : 'readonly' ?> >
    </label>
</form>
