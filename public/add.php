<?php
    require_once __DIR__ . '/../inc/config.php';

    if (isset($_POST['submitNewStudent']) && !empty($_POST['stuLastname']) && !empty($_POST['stuFirstname']))
    {
        $newStudentLastname = strtoupper($_POST['stuLastname']);
        $newStudentFirstname = $_POST['stuFirstname'];

        // validation

        $sql = "
        	INSERT INTO student (`stu_lastname`, `stu_firstname`)
        	VALUES (:stuLastname, :stuFirstname)
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
        }

    }

    // At the End I display stuff
    require_once __DIR__ . '/../view/header.php';
    require_once __DIR__ . '/../view/add.php';
    require_once __DIR__ . '/../view/footer.php';
?>
