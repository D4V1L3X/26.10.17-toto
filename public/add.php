<?php
    require_once __DIR__ . '/../inc/config.php';

    /*
        I need to fetch Data from the DB to display a correct and complete 'add new student form'
    */
        // Request for session and chosen related data
    $sqlSession = "
        SELECT *
        FROM session
        LEFT OUTER JOIN training ON session.training_tra_id = training.tra_id
        ORDER BY ses_start_date ASC
     ";
    $pdoStatementSession = $pdo -> query($sqlSession);
    if ($pdoStatementSession === false)
    {
        echo '<pre>'.print_r($pdo -> errorInfo(), true).'</pre>';
        exit;
    }
    else
    {
        $resListSession = $pdoStatementSession -> fetchAll(PDO::FETCH_ASSOC);
    }

        // Request for city and chosen related data
    $sqlCity = "
        SELECT *
        FROM city
        LEFT OUTER JOIN country ON city.country_cou_id = country.cou_id
        ORDER BY cou_name ASC, cit_name ASC
    ";
    $pdoStatementCity = $pdo -> query($sqlCity);
    if ($pdoStatementCity === false)
    {
        echo '<pre>'.print_r($pdo->errorInfo(), true).'</pre>';
        exit;
    }
    else
    {
        $resListCity = $pdoStatementCity -> fetchAll(PDO::FETCH_ASSOC);
    }



    // The following line does not really need commenting
    if (isset($_POST['submitNewStudent']))
    {

        // INPUT and some Processing

        $nStuLastname = filter_var(strtoupper($_POST['nStuLastname']), FILTER_SANITIZE_STRING);
        $nStuFirstname = filter_var(ucfirst($_POST['nStuFirstname']), FILTER_SANITIZE_STRING);
        $nStuBirthdate = date('Y-m-d', strtotime("{$_POST['nStuBirthdateY']}-{$_POST['nStuBirthdateM']}-{$_POST['nStuBirthdateD']}"));
        $nStuEmail = filter_var($_POST['nStuEmail'], FILTER_SANITIZE_EMAIL);
        $nStuFriendliness = intval($_POST['nStuFriendliness']);
        $nStuSession = intval($_POST['nStuSession']);
        $nStuCity = intval($_POST['nStuCity']);

        // PROCESSING and validation
            // https://stackoverflow.com/questions/11405493/how-to-get-everything-after-a-certain-character
            // substr('233718_This_is_a_string', (strpos('233718_This_is_a_string', '_') ?: -1) + 1); // Returns This_is_a_string
            // explode('_', '233718_This_is_a_string', 2)[1]; // Returns This_is_a_string

        if (strlen($nStuLastname) < 3 || strlen($nStuFirstname) < 3 || get_headers('http://' . substr($nStuEmail, strpos($nStuEmail, "@")+1 )) === false) // if invalid
        {
            $formInvalid = [];
            $formInvalid['state'] = true;
            $formInvalid['lastnameError'] = (strlen($nStuLastname) < 3) ? true : false ;
            $formInvalid['firstnameError'] = (strlen($nStuFirstname) < 3) ? true : false;
            $formInvalid['emailError'] = (get_headers('http://' . substr($nStuEmail, strpos($nStuEmail, "@")+1 )) === false) ? true : false;

            $_POST['nStuLastname'] = $nStuLastname;
            $_POST['nStuFirstname'] = $nStuFirstname;
            $_POST['nStuBirthdateY'] = $_POST['nStuBirthdateY'];
            $_POST['nStuBirthdateM'] = $_POST['nStuBirthdateM'];
            $_POST['nStuBirthdateD'] = $_POST['nStuBirthdateD'];
            $_POST['nStuEmail'] = $nStuEmail;
            $_POST['nStuFriendliness'] = $nStuFriendliness;
            $_POST['nStuSession'] = $nStuSession;
            $_POST['nStuCity'] = $nStuCity;
        }
        else // if valid
        {
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
                exit;
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
                    exit;
                }
                elseif ($execQuery === true)
                {
                    $result = $pdoStatement -> fetch(PDO::FETCH_ASSOC);
                    header("Location: http://onyx.lu/fit4coding/26.10.17-toto/public/student.php?id2stu=" . $result['stu_id']);
                    exit;
                }
            }
        }
    }

    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/add.php';
    require_once __DIR__ . '/../view/footer.php';
?>
