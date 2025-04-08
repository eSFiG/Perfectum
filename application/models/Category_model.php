<?php

class Category_model extends CI_Model {

	public function get_categories() {
		return $this->db->get('categories')->result();
	}

	public function add_category($name) {
		$this->db->insert('categories', ['name' => $name]);
	}
}
