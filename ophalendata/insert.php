<?php
require_once 'connect.php';

$naam = $_POST["naam"];
$voorl = $_POST["voorl"];
$chef = $_POST["chef"];
$afd = $_POST["afd"];


$sql = "INSERT INTO `medewerker`(`naam`, `voorl`, `chef`,`afd`)
        VALUES ('$naam','$voorl','$chef','$afd')";

  $statement = mysqli_prepare($connection, $sql);
  // mysqli_stmt_bind_param($statement, 'i', $gebruikersinput);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);

  header('Location: ophalendata.php');
