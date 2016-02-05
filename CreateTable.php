<!DOCTYPE html>

<html>
<head>
</head>

<body>
<?php
    include 'DatabaseInfo.php';

    try {
        // login
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully<br>";

        // sql to create table
        $sql = "CREATE TABLE POST1 (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(40),
        comment TEXT NOT NULL,
        reg_date TIMESTAMP,
        gen INT(6) UNSIGNED,
        replies INT(6) UNSIGNED,
        up_votes INT(6) UNSIGNED,
        down_votes INT(6) UNSIGNED
        )";
        $conn->exec($sql);
        echo "Table POST1 created successfully<br>";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>
        
</body>
</html>
