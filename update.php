<?php
require_once 'connect.php';

$sql = "UPDATE medewerker SET maandsal= maandsal*1.02";

$statement = mysqli_prepare($connection, $sql);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

header('Location: connect.php');