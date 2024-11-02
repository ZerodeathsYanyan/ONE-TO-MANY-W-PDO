	<?php 

	require_once 'dbConfig.php'; 
	require_once 'models.php';
	ob_start();

	if (isset($_POST['insertChefBtn'])) {

		$query = insertChef($pdo, $_POST['firstName'], 
			$_POST['lastName'], $_POST['dateOfBirth'], $_POST['specialization']);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Insertion failed";
		}

	}
	if (isset($_POST['addDishBtn'])) {
		$chef_id = $_POST['chef_id'];
		$nameofdish = $_POST['nameofdish'];
		$typeofdish = $_POST['typeofdish'];
		$ingredients = $_POST['ingredients'];
		$info = $_POST['info'];

		$query = addDish($pdo, $chef_id, $nameofdish, $typeofdish, $ingredients, $info);

		if ($query) {
			header("Location: ../viewdishes.php?chef_id=$chef_id");
		} else {
			echo "Failed to add dish";
		}
	}


	if (isset($_POST['editChefBtn'])) {
		$query = updateChef($pdo, $_POST['firstName'], $_POST['lastName'], 
			$_POST['dateOfBirth'], $_POST['specialization'], $_GET['chef_id']);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Edit failed";;
		}

	}

	if (isset($_POST['editDishBtn'])) {
		$query = updateDish($pdo, $_POST['nameofdish'], $_POST['typeofdish'], 
			$_POST['ingredients'], $_POST['info'], $_GET['dishes_id']);
		$chef_id = $_POST['chef_id'];

		if ($query) {
			header("Location: ../viewdishes.php?chef_id=$chef_id");
		}

		else {
			echo "Edit failed";;
		}

	}

	if (isset($_POST['deleteDishBtn'])) {
		$dishes_id = $_GET['dishes_id'];
		$chef_id = $_POST['chef_id'];
		$query = deleteDish($pdo, $dishes_id);
  
		if ($query) {
			 header("Location: ../viewdishes.php?chef_id=$chef_id");
		} else {
			 echo "Deletion failed";
		}
  }
  
  


	if (isset($_POST['deleteChefBtn'])) {
		$query = deleteChef($pdo, $_GET['chef_id']);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Deletion failed";
		}
	}


	?>