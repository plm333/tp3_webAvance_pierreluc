<!DOCTYPE html>
<html>
<head>
    <title>PDF Example</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ path }}css\style.css">
</head>
<body>
    <h1>Liste des membres</h1>
    
    <form method="post" action="generate-pdf.php">
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity">
        
        <button>Generate PDF</button>
    </form>
</body>
</html>

