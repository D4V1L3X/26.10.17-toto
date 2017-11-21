<?php

    if (isset($_POST) && !empty($_POST))
    {
        $errCode = 0;

        $nStuLastname = filter_var(strtoupper($_POST['nStuLastname']), FILTER_SANITIZE_STRING);
        $nStuFirstname = filter_var(ucfirst($_POST['nStuFirstname']), FILTER_SANITIZE_STRING);
        $nStuBirthdate = date('Y-m-d', strtotime("{$_POST['nStuBirthdateY']}-{$_POST['nStuBirthdateM']}-{$_POST['nStuBirthdateD']}"));
        $nStuEmail = filter_var($_POST['nStuEmail'], FILTER_SANITIZE_EMAIL);
        $nStuFriendliness = intval($_POST['nStuFriendliness']);
        $nStuSession = intval($_POST['nStuSession']);
        $nStuCity = intval($_POST['nStuCity']);

        if (strlen($nStuLastname) < 3 || strlen($nStuFirstname) < 3 || get_headers('http://' . substr($nStuEmail, strpos($nStuEmail, "@")+1 )) === false) // if invalid
        {
            strlen($nStuLastname) < 3 ? $errCode += 1 : null;
            strlen($nStuFirstname) < 3 ? $errCode += 3 : null;
            get_headers('http://' . substr($nStuEmail, strpos($nStuEmail, "@")+1 )) === false ? $errCode += 5 : null;

            echo $errCode;
        }
        else // if valid
        {
            require_once __DIR__ . '/../../inc/config.php';

            $sql = '
                    INSERT INTO student (stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, session_ses_id, city_cit_id)
                    VALUES (:stuLastname, :stuFirstname, :stuBirthdate, :stuEmail, :stuFriendliness, :stuSession, :stuCity)
                ';
            $pdoStatement = $pdo ->prepare($sql);
            $pdoStatement -> bindValue( ':stuLastname', $nStuLastname, PDO::PARAM_STR);
            $pdoStatement -> bindValue( ':stuFirstname', $nStuFirstname, PDO::PARAM_STR);
            $pdoStatement -> bindValue( ':stuBirthdate', $nStuBirthdate, PDO::PARAM_STR);
            $pdoStatement -> bindValue( ':stuEmail', $nStuEmail, PDO::PARAM_STR);
            $pdoStatement -> bindValue( ':stuFriendliness', $nStuFriendliness, PDO::PARAM_INT);
            $pdoStatement -> bindValue( ':stuSession', $nStuSession, PDO::PARAM_INT);
            $pdoStatement -> bindValue( ':stuCity', $nStuCity, PDO::PARAM_INT);
            $execQuery = $pdoStatement -> execute();
            if ($execQuery === false)
            {
                echo '<pre>' . print_r($pdoStatement->errorInfo(), true) . '</pre>';
            }
            elseif ($execQuery === true)
            {
                $sql = "
                        SELECT *
                        FROM student
                        WHERE stu_email = :stuEmail
                    ";
                $pdoStatement = $pdo->prepare($sql);
                $pdoStatement -> bindValue( ':stuEmail', $nStuEmail, PDO::PARAM_STR);
                $execQuery = $pdoStatement -> execute();
                if ($execQuery === false)
                {
                    echo '<pre>' . print_r($pdoStatement->errorInfo(), true) . '</pre>';
                }
                elseif ($execQuery === true)
                {
                    $result = $pdoStatement -> fetch(PDO::FETCH_ASSOC);
                    echo $errCode . '-' . $result['stu_id'];
                }
            }
        }
    }