<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Лабораторна 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="first.php" method="get">
        <label for="group">Choose group</label>
        <select name="group" id="group">
            <?php
                include('connect.php');
                try {
                    $stmt = $dbh->query("SELECT ID_Groups, title FROM groups");
                    $res = $stmt->fetchAll();
                    foreach($res as $row)
                    {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                }
                catch(PDOException $ex) {
                    echo $ex->GetMessage();
                }
    
                $dbh = null;
            ?>
        </select>
        <input type="submit" value="Get!">
    </form>
    <form action="second.php" method="get">
        <label for="teacher">Choose teacher:</label>
        <select name="teacher" id="teacher">
            <?php
                include('connect.php');
                try {
                    $stmt = $dbh->query("SELECT ID_Teacher, name FROM teacher");
                    $res = $stmt->fetchAll();
    
                    foreach($res as $row)
                    {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                }
                catch(PDOException $ex) {
                    echo $ex->GetMessage();
                }
    
                $dbh = null;
            ?>
        </select>
        <input type="submit" value="Get!">
    </form>
    <form action="third.php" method="get">
        <label for="auditorium">Choose classroom:</label>
        <select name="auditorium" id="auditorium">
            <?php
                include('connect.php');
                try {
                    $stmt = $dbh->query("SELECT DISTINCT auditorium FROM lesson");
                    $res = $stmt->fetchAll();
    
                    foreach($res as $row)
                    {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                }
                catch(PDOException $ex) {
                    echo $ex->GetMessage();
                }
    
                $dbh = null;
            ?>
        </select>
        <input type="submit" value="Get!">
    </form>
</body>
</html>    