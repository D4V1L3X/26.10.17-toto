<?php
    if (isset($_POST) && !empty($_POST['stuId']))
    {
        require_once __DIR__ . '/../../inc/config.php';

        $sql = "
            SELECT *, stu_birthdate as stu_age
            FROM student
            LEFT OUTER JOIN city on student.city_cit_id = city.cit_id
            LEFT OUTER JOIN session on student.session_ses_id = session.ses_id
            LEFT OUTER JOIN training on session.training_tra_id = training.tra_id
            WHERE stu_id = {$_POST['stuId']}
        ";
        $pdoStatement = $pdo -> query($sql);
        if ($pdoStatement === false)
        {
            echo '<pre>'.print_r($pdo -> errorInfo(), true).'</pre>';
        }
        else
        {
            $resStu = $pdoStatement -> fetch(PDO::FETCH_ASSOC);

            $resStu['stu_age'] = (new DateTime(date('Y-m-d', strtotime($resStu['stu_birthdate'])))) -> diff(new DateTime(date('Y-m-d'))) -> format('%Y');

            $json = json_encode($resStu, JSON_PRETTY_PRINT);

            echo $json;
            // return include '../../view/student.php';
        }
    }