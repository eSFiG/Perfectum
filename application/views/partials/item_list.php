<ul>
	<?php foreach ($items as $item): ?>
		<li>
			<?= $item->name ?> | <?= $item->category ?> | <?= $item->is_purchased ? 'Куплено' : 'Не куплено' ?> | <?= $item->created_at ?>
			<button class="delete-item" data-id="<?= $item->id ?>">Видалити</button>
			<button class="toggle-status" data-id="<?= $item->id ?>">Змінити статус</button>
		</li>
	<?php endforeach; ?>
</ul>
