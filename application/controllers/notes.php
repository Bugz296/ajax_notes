<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	public function index(){
		$this->load->view('index');
	}
	public function edit(){
		$edited_note = $this->input->post();
		$this->note->edit_note($edited_note);
		$notes['notes'] = $this->note->show_all_notes();
		$this->load->view("/partials/notes_html", $notes);
	}
	public function add(){
		$title = $this->input->post();
		$this->note->add_note($title);
		$notes['notes'] = $this->note->show_all_notes();
		$this->load->view("/partials/notes_html", $notes);
	}
	public function delete(){
		$note = $this->input->post();
		$this->note->delete_note($note);
		$notes['notes'] = $this->note->show_all_notes();
		$this->load->view("/partials/notes_html", $notes);
	}
	public function notes_html(){
		$notes['notes'] = $this->note->show_all_notes();
		$this->load->view("/partials/notes_html", $notes);
	}
	public function notes_json(){
		$notes['notes'] = $this->note->show_all_notes();
		echo json_encode($notes);
	}
}