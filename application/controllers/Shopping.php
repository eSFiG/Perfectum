<?php

class Shopping extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Item_model');
		$this->load->model('Category_model');
	}

	public function index() {
		$data['items'] = $this->Item_model->get_items();
		$data['categories'] = $this->Category_model->get_categories();
		$this->load->view('shopping_list', $data);
	}

	public function add_item() {
		$name = $this->input->post('name');
		$category_id = $this->input->post('category_id');
		$this->Item_model->add_item($name, $category_id);
	}

	public function delete_item($id) {
		$this->Item_model->delete_item($id);
	}

	public function toggle_status($id) {
		$this->Item_model->toggle_status($id);
	}

	public function add_category() {
		$name = $this->input->post('name');
		$this->Category_model->add_category($name);

		$categories = $this->Category_model->get_categories();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['categories' => $categories]));
	}

	public function filter_items() {
		$category_id = $this->input->post('category_id');
		$status = $this->input->post('status');
		$data['items'] = $this->Item_model->get_items($category_id, $status);
		$this->load->view('partials/item_list', $data);
	}
}
