

<form>
    <label>
        Student ID:<br>
        <input type='text' value='<?= $resStu['stu_id'] ?>' readonly >
    </label><br><br>
    <label>
        Lastname:<br>
        <input type='text' value='<?= $resStu['stu_lastname'] ?>' readonly >
    </label><br><br>
    <label>
        Firstname:<br>
        <input type='text' value='<?= $resStu['stu_firstname'] ?>' readonly >
    </label><br><br>
    <label>
        Email:<br>
        <input type='text' value='<?= $resStu['stu_email'] ?>' readonly >
    </label><br><br>
    <label>
        Birthdate:<br>
        <input type='text' value='<?= $resStu['stu_birthdate'] ?>' readonly >
    </label><br><br>
    <label>
        Age:<br>
        <input type='text' value='<?= empty($stuCalcAge) ? '' : $stuCalcAge ?>' readonly>
    </label><br><br>
    <label>
        City:<br>
        <input type='text' value='<?= $resStu['cit_name'] ?>' readonly >
    </label><br><br>
    <label>
        Friendliness:<br>
        <input type='text' value='<?= $resStu['stu_friendliness'] ?>' readonly >
    </label><br><br>
    <label>
        Session #:<br>
        <input type='text' value='<?= $resStu['ses_number'] ?>' readonly >
    </label><br><br>
    <label>
        Session Name:<br>
        <input type='text' value='<?= $resStu['tra_name'] ?>' readonly >
    </label>
</form>
