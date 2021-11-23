<?php
require_once 'connect.php';

$sql = "SELECT * FROM `medewerker` WHERE `afd`='30'";

  $statement = mysqli_prepare($connection, $sql);
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);


  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $naam = $row["naam"];
    $maandsal = $row["maandsal"];
    print($naam . " " . $maandsal . "<br>");
}

echo "<br><hr><br>";

?>
<form class="" action="insert.php" method="post">
  <input type="text" name="naam" placeholder="naam">
  <input type="text" name="voorl" placeholder="voorl">
  <input type="number" name="chef" placeholder="chef">
  <input type="number" name="afd" placeholder="afd">
  <input type="submit" value="submit">
</form>

<br><hr><br>

<form class="" action="update.php" method="post">
  <input type="submit" value="verhoog salaris 2%">
</form>

<table>
  <tr>
    <th>naam</th>
    <th>voorl</th>
    <th>chef</th>
    <th>afd</th>
  </tr>

<?php
  $sql = "SELECT * FROM `medewerker`";

    $statement = mysqli_prepare($connection, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $naam = $row["naam"];
    $voorl = $row["voorl"];
    $chef = $row["chef"];
    $afd = $row["afd"];
    print(
      "<tr>
        <td>".$naam."<td>
        <td>".$voorl."<td>
        <td>".$chef."<td>
        <td>".$afd."<td>
      <tr>"
  );

} ?>
</table>

<input type="submit" name="" value="">

<?php
// mysqli_free_result($result);
// mysqli_close($connection);
