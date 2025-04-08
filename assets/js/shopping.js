$(document).ready(function() {
	$('#add_item').click(function() {
		$.post('shopping/add_item', {
			name: $('#item_name').val(),
			category_id: $('#item_category').val()
		}, function() {
			loadItems();
		});
	});

	$('#add_category').click(function () {
		const categoryName = $('#new_category_name').val().trim();

		if (categoryName === '') {
			alert('Введите название категории!');
			return;
		}

		$.post('shopping/add_category', {
			name: categoryName
		}, function (response) {
			$('#new_category_name').val('');
			updateCategorySelects(response.categories);
		});
	});

	function updateCategorySelects(categories) {
		let options = '';
		categories.forEach(cat => {
			options += `<option value="${cat.id}">${cat.name}</option>`;
		});

		$('#item_category').html(options);
		$('#filter_category').html('<option value="">Всі категорії</option>' + options);
	}

	$(document).on('click', '.delete-item', function() {
		$.post('shopping/delete_item/' + $(this).data('id'), function() {
			loadItems();
		});
	});

	$(document).on('click', '.toggle-status', function() {
		$.post('shopping/toggle_status/' + $(this).data('id'), function() {
			loadItems();
		});
	});

	$('#filter_category, #filter_status').change(function() {
		loadItems();
	});

	function loadItems() {
		$.post('shopping/filter_items', {
			category_id: $('#filter_category').val(),
			status: $('#filter_status').val()
		}, function(data) {
			$('#items_list').html(data);
		});
	}
});
