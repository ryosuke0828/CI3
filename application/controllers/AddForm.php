<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddForm extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('BookmarkModel');
	}
	public function ShowForm()
	{
		$this->load->view('AddForm');
	}

	public function SaveForm()
	{
		$this->form_validation->set_rules('url_field', 'URL', 'required');
		$this->form_validation->set_rules('title_field', 'title', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			echo 'Input data is invalid';
			$this->load->view('AddForm'); //バリデーション失敗時には再度フォームを表示する
		}
		else 
		{
			$data = array(
				'url' => $this->input->post('url_field'),
				'title' => $this->input->post('title_field')
			);

			$result = $this->BookmarkModel->saveData($data);
			if ($result == TRUE)
			{
				redirect('BookmarkList');
			}
			else
			{
				echo 'save failed';
			}
		}
	}
	
}
?>