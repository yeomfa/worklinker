<?php
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Worklinker</title>

	<!-- BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
		crossorigin="anonymous"></script>

	<!-- BOXICONS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<script type="module" defer src="./js/main.js"></script>
</head>

<body>
	<!-- NAV -->
	<nav class="navbar" style="background-color: #2979ff;">
		<div class="container-fluid">
			<span class="navbar-brand fs-3" style="color: white;">
				Worklinker
			</span>
		</div>
	</nav>

	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col text-center fs-4">
				Usuarios
			</div>
			<div class="col text-center">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user-modal">
					Agregar usuario
				</button>
			</div>
		</div>
	</div>

	<!-- TABLE USERS -->
	<div class="container mt-3" style="max-width: 70vw;">
		<table class="table text-center">
			<thead class="table-dark">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Centro de trabajo</th>
					<th scope="col">Fecha de ingreso</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM `users`";
				$result = mysqli_query($conn, $sql);

				while ($user = mysqli_fetch_assoc($result)) {
					?>

					<tr>
						<th scope="row"><?= $user['id'] ?></th>
						<td><?= $user['name'] ?></td>
						<td><?= $user['work_center_id'] ?></td>
						<td><?= $user['entry_date'] ?></td>
						<td>
							<a href="" class="link-dark"><i class='bx bx-pencil fs-5'></i></a>
							<a href="" class="link-dark"><i class='bx bx-trash fs-5'></i></a>
						</td>
					</tr>
					<tr>

						<?php
				}

				?>
			</tbody>
		</table>

	</div>

	<!-- MODAL FORM ADD USER -->
	<div class="modal" id="add-user-modal" tabindex="-1" aria-labelledby="add-user-modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="add-user-modal">Agregar usuario</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body mx-3">
					<div class="container">

						<!-- FORM -->
						<form action="actions/actAddUser.php" method="post">
							<div class="row d-flex flex-column row-gap-3">
								<div class="col">
									<label class="form-label">Nombre:</label>
									<input type="text" class="form-control" name="name" placeholder="Ingrese nombre de usuario">
								</div>

								<div class="col">
									<label class="form-label">Centro de trabajo:</label>
									<select name="work_center" class="form-select">
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>

								<div class="col">
									<label class="form-label">Fecha de ingreso:</label>
									<input type="date" name="date" id="date" class="form-control">
								</div>

								<div class="col text-end">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary" name="submit">Agregar</button>
								</div>

							</div>

						</form>
					</div>

				</div>


			</div>
		</div>
	</div>
</body>

</html>