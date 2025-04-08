<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
	<meta charset="utf-8">
    <title>Список покупок</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="bg-light">

	<div class="container py-4">
		<h1 class="text-center mb-4">Список покупок</h1>

		<div class="card mb-4">
			<div class="card-body">
				<h5 class="card-title mb-3">Додати покупку</h5>
				<div class="row g-2">
					<div class="col-md-5">
						<input type="text" id="item_name" class="form-control" placeholder="Назва товару">
					</div>
					<div class="col-md-4">
						<select id="item_category" class="form-select">
							<?php foreach ($categories as $cat): ?>
								<option value="<?= $cat->id ?>"><?= $cat->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-3">
						<button id="add_item" class="btn btn-primary w-100">Додати</button>
					</div>
				</div>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-body">
				<h5 class="card-title mb-3">Додати категорію</h5>
				<div class="row g-2">
					<div class="col-md-9">
						<input type="text" id="new_category_name" class="form-control" placeholder="Назва категорії">
					</div>
					<div class="col-md-3">
						<button id="add_category" class="btn btn-primary w-100">Додати</button>
					</div>
				</div>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-body">
				<h5 class="card-title mb-3">Фільтрація</h5>
				<div class="row g-2">
					<div class="col-md-6">
						<select id="filter_category" class="form-select">
							<option value="">Всі категорії</option>
							<?php foreach ($categories as $cat): ?>
								<option value="<?= $cat->id ?>"><?= $cat->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6">
						<select id="filter_status" class="form-select">
							<option value="">Все</option>
							<option value="0">Не куплено</option>
							<option value="1">Куплено</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<h5 class="card-title mb-3">Товари</h5>
				<div id="items_list">
					<?php $this->load->view('partials/item_list', ['items' => $items]); ?>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/js/shopping.js') ?>"></script>
</body>
</html>
