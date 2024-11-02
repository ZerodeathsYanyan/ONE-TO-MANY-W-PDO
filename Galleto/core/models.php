<?php  

function insertChef($pdo, $first_name, $last_name, 
	$date_of_birth, $specialization) {

	$sql = "INSERT INTO chefs (first_name, last_name, 
		date_of_birth, specialization) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $specialization]);

	if ($executeQuery) {
		return true;
	}
}

function deleteChef($pdo, $chef_id) {
    try {
        $deleteChefDish = "DELETE FROM dishes WHERE chef_id = ?";
        $deleteStmt = $pdo->prepare($deleteChefDish);
        $deleteStmt->execute([$chef_id]);

        $sql = "DELETE FROM chefs WHERE chef_id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$chef_id]);
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function deleteDish($pdo, $dishes_id) {
	try {
		  $deleteDish = "DELETE FROM dishes WHERE dishes_id = ?";
		  $deleteStmt = $pdo->prepare($deleteDish);
		  $deleteStmt->execute([$dishes_id]);
		  return true;

	} catch (PDOException $e) {
		  echo "Error: " . $e->getMessage();
		  return false;
	}
}


function updateChef($pdo, $first_name, $last_name, 
	$date_of_birth, $specialization, $chef_id) {

	$sql = "UPDATE chefs
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					specialization = ?
				WHERE chef_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $specialization, $chef_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function updateDish($pdo, $nameofdish, $typeofdish, 
	$ingredients, $info, $dishes_id) {

	$sql = "UPDATE dishes
				SET nameofdish = ?,
					typeofdish = ?,
					ingredients = ?, 
					info = ?
				WHERE dishes_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$nameofdish, $typeofdish, 
	$ingredients, $info, $dishes_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function getAllChefs($pdo) {
	$sql = "SELECT * FROM chefs";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getChefByID($pdo, $chef_id) {
	$sql = "SELECT * FROM chefs WHERE chef_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chef_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function getDishesByChef($pdo, $chef_id) {
	$sql = "SELECT * FROM dishes WHERE chef_id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$chef_id]);
	return $stmt->fetchAll();
}

function getAllDishes($pdo) {
	$sql = "SELECT * FROM dishes";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function getDishByID($pdo, $dishes_id) {
	$sql = "SELECT * FROM dishes WHERE dishes_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$dishes_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function addDish($pdo, $chef_id, $nameofdish, $typeofdish, $ingredients, $info) {
	$sql = "INSERT INTO dishes (chef_ID, nameofdish, typeofdish, ingredients, info) VALUES (?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	return $stmt->execute([$chef_id, $nameofdish, $typeofdish, $ingredients, $info]);
}
?>