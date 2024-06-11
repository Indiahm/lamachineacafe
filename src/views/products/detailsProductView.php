<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche produit</title>
</head>
<body>
    <h1>Machine à café</h1>
    <div>
        <h2><?php echo $product['nomProduit']; ?></h2>
        <p><?php echo $product['descriptionProduit']; ?></p>
        <p><?php echo $product['imageProduit']; ?></p>
    </div>
</body>
</html>
