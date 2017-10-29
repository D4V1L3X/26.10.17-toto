        <br>
        <form method="post" action="./add.php">
            <fieldset>
                <legend>Add new Student</legend>
                <label>
                    Lastname:<br>
                    <input type='text' name="nStuLastname" placeholder='Doe' <?= isset($formInvalid) ? "value='{$_POST['nStuLastname']}'" : ''; ?> required>
                    <?= isset($formInvalid) && $formInvalid['lastnameError'] === true ? '<br><span class="error">Lastname must be at least 3 characters long</span>' : ''; ?>
                </label><br><br>
                <label>
                    Firstname:<br>
                    <input type='text' name="nStuFirstname" placeholder='John' <?= isset($formInvalid) ? "value='{$_POST['nStuFirstname']}'" : ''; ?> required>
                    <?= isset($formInvalid) && $formInvalid['firstnameError'] === true ? '<br><span class="error">Firstname must be at least 3 characters long</span>' : ''; ?>
                </label><br><br>
                <label>
                    Birthdate:<br>
                    <select id="years" name="nStuBirthdateY" onchange="howManyDays()" required></select>
                    <select id="months" name="nStuBirthdateM" onchange="howManyDays()" required></select>
                    <select id="days" name="nStuBirthdateD" required></select>
                </label><br><br>
                <label>
                    Email:<br>
                    <input type='text' name="nStuEmail" placeholder='john.doe@example.com' <?= isset($formInvalid) ? "value='{$_POST['nStuEmail']}'" : ''; ?> required>
                    <?= isset($formInvalid) && $formInvalid['emailError'] === true ? '<br><span class="error">You entered an invalid email</span>' : ''; ?>
                </label><br><br>
                <fieldset id="RadioButtonInput">
                    <legend>Friendliness</legend>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="5" <?= isset($formInvalid) ? ($_POST['nStuFriendliness'] == 5 ? 'checked' : '' ) : ''; ?> required> 5 "Me Likey :D"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="4" <?= isset($formInvalid) ? ($_POST['nStuFriendliness'] == 4 ? 'checked' : '' ) : ''; ?> required> 4 "Why not ?"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="3" <?= isset($formInvalid) ? ($_POST['nStuFriendliness'] == 3 ? 'checked' : '' ) : 'checked'; ?> required> 3 "Neutral"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="2" <?= isset($formInvalid) ? ($_POST['nStuFriendliness'] == 2 ? 'checked' : '' ) : ''; ?> required> 2 "Meeeh .... Not so much !"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="1" <?= isset($formInvalid) ? ($_POST['nStuFriendliness'] == 1 ? 'checked' : '' ) : ''; ?> required> 1 "Non me gusta !"
                    </label>
                </fieldset><br>
                <label>
                    Session:<br>
                    <select name="nStuSession" required>
                        <!-- On a production version of a website I would modify the following indentation so that it is rendered perfectly by the browser -->
                        <option <?= isset($formInvalid) && !empty($_POST['nStuSession']) ? '' : 'selected' ; ?> disabled hidden>-- Select --</option>
                        <?php foreach ($resListSession as $kSes => $vSes) { ?>
                            <option value="<?= $vSes['ses_id'] ?>" <?= isset($formInvalid) && !empty($_POST['nStuSession']) && ($_POST['nStuSession'] == $vSes['ses_id']) ? 'selected' : '' ; ?>><?= htmlentities("#{$vSes['ses_number']} | {$vSes['ses_start_date']} - {$vSes['ses_end_date']} | {$vSes['tra_name']}")  ?></option>
                        <?php } ?>
                    </select>
                </label><br><br>
                <label>
                    City:<br>
                    <select name="nStuCity" required>
                        <!-- On a production version of a website I would modify the following indentation so that it is rendered perfectly by the browser -->
                        <option <?= isset($formInvalid) && !empty($_POST['nStuCity']) ? '' : 'selected' ; ?> disabled hidden>-- Select --</option>
                        <?php foreach ($resListCity as $kCit => $vCit) { ?>
                            <option value="<?= $vCit['cit_id'] ?>"<?= isset($formInvalid) && !empty($_POST['nStuCity']) && ($_POST['nStuCity'] == $vCit['cit_id']) ? 'selected' : '' ; ?>><?= htmlentities("{$vCit['cou_name']} | {$vCit['cit_name']}") ?></option>
                        <?php } ?>
                    </select>
                </label><br><br>
                <input type="submit" name="submitNewStudent" value="Submit !">
            </fieldset>
        </form>
