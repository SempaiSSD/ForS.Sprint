<?php
require_once 'php/db.php';
require_once 'php/user_list.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<div class="container">
		<div class="option-button">
			<button class="btn btn-sm btn-outline-secondary add-btn" type="button" data-toggle="modal" data-target="#user-form-modal">Add</button>
			<select name="active" id="active">
				<option>Please Select</option>
				<option value="1">Set active</option>
				<option value="2">Set not active</option>
				<option value="del">Delete</option>
			</select>
			<button class="btn btn-sm btn-outline-secondary" id="set-option-btn">Ok</button>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="align-top">
						<div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
							<input type="checkbox" class="custom-control-input checker" id="all-items">
							<label class="custom-control-label" for="all-items"></label>
						</div>
					</th>
					<th class="max-width">Name</th>
					<th class="sortable">Role</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($get_users as $user) {
				?>
					<tr>
						<td class="align-middle">
							<div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
								<input type="checkbox" class="custom-control-input check-elem" id="<?= $user[0] ?>">
								<label class="custom-control-label" for="<?= $user[0] ?>"></label>
							</div>
						</td>
						<td class="text-nowrap align-middle"><?= $user[1] . ' ' . $user[2] ?></td>
						<td class="text-nowrap align-middle"><?= $user[3] ?></td>
						<td class="text-center align-middle">
							<div id="check_status" class="not-active-circle"></div>
						</td>
						<td class="text-center align-middle">
							<div class="btn-group align-top">
								<a href="/php/edit.php?id=<?= $user[0] ?>" class="btn btn-sm btn-outline-secondary badge edit-btn" data-toggle="modal" data-target="#user-form-modal"><i class="bi bi-gear-fill"></i></a>
								<a href="/php/remove.php?id=<?= $user[0] ?>" class="btn btn-sm btn-outline-secondary badge remove-btn"><i class="bi bi-trash-fill"></i></a>
							</div>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>


	<div class="modal fade" id="user-form-modal" tabindex="-1" aria-labelledby="user-form-modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="UserModalLabel">Add user</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php
					$id = $_GET["id"];
					$get_user = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
					$get_user = mysqli_fetch_assoc($get_user);
					?>
					<form>
						<div>
							<input type="hidden" name="id" value="<?= $get_user["id"] ?>">
							<div class="form-group">
								<label for="first-name" class="col-form-label">First Name:</label>
								<input type="text" class="form-control" id="first-name" name="first_name" value="<?= $get_user["first_name"] ?>">
							</div>
							<div class="form-group">
								<label for="last-name" class="col-form-label">Last Name:</label>
								<input type="text" class="form-control" id="last-name" name="last_name">
							</div>
							<div class="form-group">
								<p>Status</p>
								<input type="checkbox" class="checkbox" id="check" name="check_status">
								<label for="check"></label>
							</div>
							<div class="form-group select">
								<p>Role</p>
								<select class="form-control role-for-ajax" name="role" id="role">
									<option value="admin">admin</option>
									<option value="user">user</option>
								</select>
							</div>
							<div class="alert alert-danger mt-2" id="errorBlock"></div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary closer" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary save"></button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

</body>
<script src="js/main.js"></script>

</html>