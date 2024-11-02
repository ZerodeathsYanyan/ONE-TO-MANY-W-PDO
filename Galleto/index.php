<?php require_once 'core/dbConfig.php'; ?>
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
	
	<div class="content">
	 <h2>Let Him Cook!</h2>
    <h3>Sign up</h3>

    <form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" required>
		</p>
		<p>
			<label for="Last name">Last Name</label> 
			<input type="text" name="lastName" required>
		</p>
		<p>
			<label for="DateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" required>
		</p>
		<p>
			<label for="Specialization">Specialization</label> 
			<input type="text" name="specialization" required>
		</p>
			<input type="submit" name="insertChefBtn" value="Register">
	</form>
	</div>

	<h2 style="border-bottom: 1px solid black;">List of Chefs</h2>
	<div class="ListOfChefs">
		<?php $getAllChefs = getAllChefs($pdo); ?>
		<?php foreach ($getAllChefs as $row) { ?>
			<div class="container">
				<img src = "img/defaultpfp.png">
				<h3><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h3>
				<p>Date Of Birth: <?php echo $row['date_of_birth']; ?></p>
				<p>Specialization: <?php echo $row['specialization']; ?></p>
				<p>Date Registered: <?php echo $row['date_registered']; ?></p>
				<button><a href="viewdishes.php?chef_id=<?php echo $row['chef_ID']; ?>">View Dishes</a></button>
				<button><a href="editchef.php?chef_id=<?php echo $row['chef_ID']; ?>">Edit</a></button>
				<button><a href="deletechef.php?chef_id=<?php echo $row['chef_ID']; ?>">Delete</a></button>
			</div>
	<?php } ?>
	</div>
</body>
</html>