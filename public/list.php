<?php
    require_once __DIR__ . '/../inc/config.php';

    if (!isset($_GET['page']))
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?page=1');
    }
    else
    {
        $offset = ($_GET['page'] - 1) * 5;

        $sql = '
            SELECT COUNT(stu_id) AS a
            FROM student
        ';
        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false)
        {
            echo '<pre>' . print_r($pdoStatement->errorInfo(), true) . '</pre>';
            exit;
        }
        else
        {
            $result = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            $pageMax = intval($result[0]['a'] / 5);
        }
    }

    $sql = '
        SELECT *
        FROM student
        LIMIT :offset, 5
    ';
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement -> bindValue( ':offset', isset($offset) ? $offset : '0', PDO::PARAM_INT);
    $execQuery = $pdoStatement -> execute();
    if ($execQuery === false)
    {
        echo '<pre>' . print_r($pdoStatement->errorInfo(), true) . '</pre>';
        exit;
    }
    else
    {
        $resListStu = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }


    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/list.php';
    require_once __DIR__ . '/../view/footer.php';
?>
