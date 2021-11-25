<?php
include "cartfuncties.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <style link rel="public/css/mijn.css" type="text/css"></style>
    <title>Winkelwagen</title>
</head>
<body>
<h1>Inhoud Winkelwagen</h1>

<?php
$cart = getCart();
print('<table border="2">');
print('<tr><th>Artikelplaatje</th><th>Artikelnaam</th><th>Aantal</th><th>Prijs</th><tr>');

$totaal = 0;

foreach($cart as $number => $aantal)
{
    $stockitem = getStockItem($number, $databaseConnection);
        // print_r($stockitem);
    $StockItemImage = getStockItemImage($number, $databaseConnection);


    if (isset($stockitem)){
        $prijs = $aantal * ($stockitem["SellPrice"]);
        $totaal = $totaal += $prijs;
        print("<tr>");
        print("<td><img style='width:120px;' src='Public/StockItemIMG/".$StockItemImage[0]['ImagePath']."'></td>");
        print("<td><a class='cart_product_link' href='view.php?id=". ($stockitem["StockItemID"]) ."'>" . ($stockitem["StockItemName"]) . "</a></td>");
        print("<td>" . $aantal . "</td>");
        print("<td>" . $prijs . "</td>");
        print("<td><a class='cart_button' href='cart.php?min=true&id=". ($stockitem["StockItemID"]) ."'> - </a></td>");
        print("<td><a class='cart_button' href='cart.php?plus=true&id=". ($stockitem["StockItemID"]) ."'> + </a></td>");
        print("<td><a class='cart_button' href='cart.php?delete=true&id=". ($stockitem["StockItemID"]) ."'> Delete </a></td>");
        print("</tr>");
    }


}

if (isset($_GET["delete"])) {              // zelfafhandelend formulier
    $stockItemID = $_GET["id"];
    removeProductToCart($stockItemID);         // maak gebruik van geïmporteerde functie uit cartfuncties.php
    header("Refresh:0; url=cart.php");
}

if (isset($_GET["min"])) {              // zelfafhandelend formulier
    $stockItemID = $_GET["id"];
    minProductToCart($stockItemID);         // maak gebruik van geïmporteerde functie uit cartfuncties.php
    header("Refresh:0; url=cart.php");
}

if (isset($_GET["plus"])) {              // zelfafhandelend formulier
    $stockItemID = $_GET["id"];
    plusProductToCart($stockItemID);         // maak gebruik van geïmporteerde functie uit cartfuncties.php
    header("Refresh:0; url=cart.php");
}

print("<th>Totaal</th>");
print("<td></td>");
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
