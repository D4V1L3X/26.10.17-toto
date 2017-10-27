<?php
    require_once __DIR__ . '/../inc/config.php';

    if (isset($_GET) && !empty($_GET['id2stu']))
    {
        $sql = "
            SELECT *
            FROM student
            LEFT OUTER JOIN city on student.city_cit_id = city.cit_id
            LEFT OUTER JOIN session on student.session_ses_id = session.ses_id
            LEFT OUTER JOIN training on session.training_tra_id = training.tra_id
            WHERE stu_id = {$_GET['id2stu']}
        ";
        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false)
        {
            echo '<pre>'.print_r($pdo->errorInfo(), true).'</pre>';
            exit;
        }
        $resStu = $pdoStatement->fetch(PDO::FETCH_ASSOC);

        $stuCalcAge = (new DateTime(date('Y-m-d', strtotime($resStu['stu_birthdate'])))) -> diff(new DateTime(date('Y-m-d'))) -> format('%Y');

        if (isset($_POST['newStudent']) && !empty($_POST['newStudent']))
        {
            $checkStuNew = $_POST['newStudent'];
            unset($_POST['newStudent']);
        }
    }

    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/student.php';
    require_once __DIR__ . '/../view/footer.php';
?>
