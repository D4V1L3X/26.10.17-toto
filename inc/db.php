<?php
    $dsn = "mysql:dbname={$config['DB_NAME']};host={$config['DB_HOST']};charset=UTF8";

    try
    {
    	$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASS']);
    	$pdo -> exec("set names utf8");
    }
    catch (Exception $e)
    {
    	echo 'Connection failed : ' . $e -> getMessage();
    }
?>
