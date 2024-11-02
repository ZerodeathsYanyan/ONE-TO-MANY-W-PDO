<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';


$chef_id = $_GET['chef_id'];


$chef = getChefByID($pdo, $chef_id);
$dishes = getDishesByChef($pdo, $chef_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chef's Dishes</title>
	 <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="header">
	<a href="index.php">
		<h1>Juan's Restaurant</h1>
	</a>
	</div>

<h2>Dishes by <?php echo htmlspecialchars($chef['first_name'] . ' ' . $chef['last_name']); ?></h2>

<button onclick="document.getElementById('addDishForm').style.display='block'">Add New Dish</button>

<div id="addDishForm" class="dishes">
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="chef_id" value="<?php echo $chef_id; ?>">
        
        <p>
            <label for="nameofdish">Dish Name:</label>
            <input type="text" name="nameofdish">
        </p>
        
        <p>
            <label for="typeofdish">Type of Dish:</label>
            <input type="text" name="typeofdish" >
        </p>
        
        <p>
            <label for="ingredients">Ingredients:</label>
            <textarea name="ingredients" ></textarea>
        </p>
        
        <p>
            <label for="info">Description:</label>
            <textarea name="info" placeholder="Describe your dish/Share your recipe! "></textarea>
        </p>
        
        <button type="submit" name="addDishBtn">Confirm</button>
    </form>
</div>

<h3>List of Dishes:</h3>
<?php if (count($dishes) === 0) {
   echo("<p style=color:gray;>List is empty. Try adding a new dish!</p>");
}
?>
<ul>
    <?php foreach ($dishes as $dish): ?>
        <li>
            <h1><?php echo htmlspecialchars($dish['nameofdish']); ?></h1>
            <h3>Type: <?php echo htmlspecialchars($dish['typeofdish']); ?></h3>
				<p>Ingredients: <?php echo htmlspecialchars($dish['ingredients']); ?></p>
            <p>Description: <?php echo htmlspecialchars($dish['info']); ?></p>
				<button><a href="editdishes.php?dishes_ID=<?php echo $dish['dishes_ID']; ?>">Edit</a></button>
				<button><a href="deletedishes.php?dishes_ID=<?php echo $dish['dishes_ID']; ?>">Delete</a></button>
        </li>
        <hr>
    <?php endforeach; ?>
</ul>


</body>
</html>
