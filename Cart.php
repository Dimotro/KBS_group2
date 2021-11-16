<?php
include "cartfuncties.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
  <?php include "header.php" ?>
<h1>Inhoud Winkelwagen</h1>

<?php
$cart = getCart();
print('<table border="2">') ;
print('<tr><th>Artikelnummer</th><th>Aantal</th><th>Prijs</th><tr>');

$totaal = 0;

foreach($cart as $number => $aantal)
{
    $prijs = $aantal * 2.5;

    $totaal = $totaal += $prijs;
    print("<tr>");
    print("<td>" . $number . "</td>");
    print("<td>" . $aantal . "</td>");
    print("<td>" . $prijs . "</td>");
    print("</tr>");


}
print("<th>Totaal</th>");
print("<td></td>");
print("<td>" . $totaal . "</td>");

//gegevens per artikelen in $cart (naam, prijs, etc.) uit database halen
//totaal prijs berekenen
//mooi weergeven in html
//etc.

?>
<p><a href='view.php?id=0'>Naar artikelpagina van artikel 0</a></p>
</body>
</html>
