<?php
include "cartfuncties.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
<h1>Inhoud Winkelwagen</h1>

<?php
$cart = getCart();
print('<table border="2">') ;
print('<tr><th>Artikelnaam</th><th>Aantal</th><th>Prijs</th><tr>');

$totaal = 0;

foreach($cart as $number => $aantal)
{
    $stockitem = getStockItem($number, $databaseConnection);

    if (isset($stockitem)){
        $prijs = $aantal * 2.5;
        $totaal = $totaal += $prijs;
        print("<tr>");
        print("<td>" . ($stockitem["StockItemName"]) . "</td>");
        print("<td>" . $aantal . "</td>");
        print("<td>" . $prijs . "</td>");
        print("</tr>");
    }


}
print("<th>Totaal</th>");
print("<td></td>");
print("<td>" . $totaal . "</td>");

//gegevens per artikelen in $cart (naam, prijs, etc.) uit database halen
//totaal prijs berekenen
//mooi weergeven in html
//etc.

?>
<p><a href='view.php?id=122'>Naar artikelpagina van artikel 122</a></p>
</body>
</html>