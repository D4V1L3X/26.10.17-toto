<?php
    require_once __DIR__ . '/../inc/config.php';

    // Get all the information of all students in the DB
    $sql = '
        SELECT *
        FROM student
    ';
    $pdoStatement = $pdo->query($sql);
    if ($pdoStatement === false)
    {
        echo '<pre>'.print_r($pdo->errorInfo(), true).'</pre>';
        exit;
    }
    $resListStu = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);


    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/list.php';
    require_once __DIR__ . '/../view/footer.php';
?>
