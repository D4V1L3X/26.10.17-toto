        <br>
        <form method="post" action="./add.php">
            <fieldset>
                <legend>Add new Student</legend>
                <label>
                    Lastname:<br>
                    <input type='text' name="nStuLastname" placeholder='Doe' required>
                </label><br><br>
                <label>
                    Firstname:<br>
                    <input type='text' name="nStuFirstname" placeholder='John' required>
                </label><br><br>
                <label>
                    Birthdate:<br>
                    <input type='date' name="nStuBirthdate" placeholder='DD/MM/YYYY' required>
                </label><br><br>
                <label>
                    Email:<br>
                    <input type='email' name="nStuEmail" placeholder='john.doe@example.com' required>
                </label><br><br>
                <fieldset id="RadioButtonInput">
                    <legend>Friendliness</legend>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="5" required> 5 "Me Likey :D"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="4" required> 4 "Why not ?"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="3" required checked> 3 "Neutral"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="2" required> 2 "Meeeh .... Not so much !"
                    </label><br>
                    <label>
                        <input type="radio" name="nStuFriendliness" value="1" required> 1 "Non me gusta !"
                    </label>
                </fieldset><br>
                <label>
                    Session:<br>
                    <select name="nStuSession" required>
                        <!-- On a production version of a website I would modify the following indentation so that it is rendered perfectly by the browser -->
                        <option selected disabled hidden>-- Select --</option>
                        <?php foreach ($resListSession as $kSes => $vSes) { ?>
                            <option value="<?= $vSes['ses_id'] ?>"><?= htmlentities("#{$vSes['ses_number']} | {$vSes['ses_start_date']} - {$vSes['ses_end_date']} | {$vSes['tra_name']}")  ?></option>
                        <?php } ?>
                    </select>
                </label><br><br>
                <label>
                    City:<br>
                    <select name="nStuCity" required>
                        <!-- On a production version of a website I would modify the following indentation so that it is rendered perfectly by the browser -->
                        <option selected disabled hidden>-- Select --</option>
                        <?php foreach ($resListCity as $kCit => $vCit) { ?>
                            <option value="<?= $vCit['cit_id'] ?>"><?= htmlentities("{$vCit['cou_name']} | {$vCit['cit_name']}") ?></option>
                        <?php } ?>
                    </select>
                </label><br><br>
                <input type="submit" name="submitNewStudent" value="Submit !">
            </fieldset>
        </form>
