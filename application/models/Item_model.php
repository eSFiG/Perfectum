<?php

class Item_model extends CI_Model {

	public function get_items($category_id = null, $status = null) {
		$this->db->select('items.*, categories.name AS category');
		$this->db->from('items');
		$this->db->join('categories', 'categories.id = items.category_id', 'left');
		if ($category_id) $this->db->where('category_id', $category_id);
		if ($status !== null) $this->db->where('is_purchased', $status);
		return $this->db->get()->result();
	}

	public function add_item($name, $category_id) {
		$this->db->insert('items', [
			'name' => $name,
			'category_id' => $category_id
		]);
	}

	public function delete_item($id) {
		$this->db->delete('items', ['id' => $id]);
	}

	public function toggle_status($id) {
		$this->db->set('is_purchased', '1 - is_purchased', false);
		$this->db->where('id', $id);
		$this->db->update('items');
	}
}
