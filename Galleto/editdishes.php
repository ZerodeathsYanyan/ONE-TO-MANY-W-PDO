<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="header">
	<a href="index.php">
		<h1>Juan's Restaurant</h1>
	</a>
	</div>
	<?php $getDishByID = getDishByID($pdo, $_GET['dishes_ID']); ?>
	<h2>Edit Dish</h2>
   <form action="core/handleForms.php?dishes_id=<?php echo $_GET['dishes_ID']; ?>" method="POST">

		<p>
			<label for="nameofdish">Dish Name</label> 
			<input type="text" name="nameofdish" value="<?php echo $getDishByID['nameofdish']; ?>">
		</p>
		<p>
			<label for="typeofdish">Type of Dish</label> 
			<input type="text" name="typeofdish" value="<?php echo $getDishByID['typeofdish']; ?>">
		</p>
		<p>
			<label for="ingredients">Ingredients</label> 
			<input type="textarea" name="ingredients" value="<?php echo $getDishByID['ingredients']; ?>">
		</p>
		<p>
			<label for="info">Description</label> 
			<input type="textarea" name="info" value="<?php echo $getDishByID['info']; ?>">
		</p>
		<div class="ebtn">
      <input type="hidden" name="chef_id" value="<?php echo htmlspecialchars($getDishByID['chef_ID']); ?>">
		<input type="submit" name="editDishBtn">
		</div>
      </form>
</body>
</html>