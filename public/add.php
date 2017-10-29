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
        echo '<pre>'.print_r($pdo->errorInfo(), true).'</pre>';
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



    if (isset($_POST['submitNewStudent']))
    {
        echo '<pre>' . print_r($_POST, true) . '</pre>';
        // I and semi P
        $nStuLastname = filter_var($_POST['nStuLastname'], FILTER_SANITIZE_STRING);;
        $nStuFirstname = filter_var($_POST['nStuFirstname'], FILTER_SANITIZE_STRING);
        $nStuBirthdate = date("d/m/Y", strtotime($_POST['nStuBirthdate'])) == $_POST['nStuBirthdate'] ? $_POST['nStuBirthdate'] : false ;
        $nStuEmail = filter_var(filter_var($_POST['nStuEmail'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        $nStuFriendliness = $_POST['nStuFriendliness'];
        $nStuSession = $_POST['nStuSession'];
        $nStuCity = $_POST['nStuCity'];

        // P (valid)








        /*
        $sql = "
            SELECT *
            FROM student
            WHERE stu_lastname = :stuLastname AND stu_firstname = :stuFirstname
        ";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement -> bindValue( ':stuLastname', $newStudentLastname, PDO::PARAM_STR);
        $pdoStatement -> bindValue( ':stuFirstname', $newStudentFirstname, PDO::PARAM_STR);
        $execQuery = $pdoStatement -> execute();
        if ($execQuery === false)
        {
            echo '<pre>' . print_r($pdoStatement->errorInfo(), true) . '</pre>';
            exit;
        }
        elseif ($execQuery === true)
        {
            $_POST['newStudent'] = true;
            $result = $pdoStatement -> fetch(PDO::FETCH_ASSOC);
            header("Location: http://onyx.lu/fit4coding/26.10.17-toto/public/student.php?id2stu=" . $result['stu_id']);
            exit;
        }
        */

    }

    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/add.php';
    require_once __DIR__ . '/../view/footer.php';
?>
