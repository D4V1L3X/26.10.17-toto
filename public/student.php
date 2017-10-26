<?php
    require_once __DIR__ . '/../inc/config.php';

    if (isset($_GET) && !empty($_GET['link2Stu']))
    {
        $sql = "
            SELECT *
            FROM student
            WHERE stu_id = $_GET['link2Stu']
        ";
        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false)
        {
            echo '<pre>'.print_r($pdo->errorInfo(), true).'</pre>';
            exit;
        }
        $resStu = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    }

    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/student.php';
    require_once __DIR__ . '/../view/footer.php';
?>
