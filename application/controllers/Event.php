<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model');
	}

	public function index()
	{
		$data['eventDetails'] = $this->Event_model->getData();
		$this->load->view('event', $data);
	}

	public function manage($id = '')
	{
		$data = array();
		if (!empty($id)) {
			$data['eventDetails'] = $this->Event_model->getData(array('id' => $id), true);
		}

		$this->load->view('event_manage', $data);
	}

	public function save($id = '')
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Event Title', 'required|min_length[4]');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('event_manage');
		} else {

			$insertArr['title'] = $this->input->post('title');
			$insertArr['start_date'] = $this->input->post('start_date');
			$insertArr['end_date'] = $this->input->post('end_date');
			$insertArr['recurrence_type'] = $this->input->post('recurrence_type');

			if ($insertArr['recurrence_type'] == 1) {
				$insertArr['type1_recurrence_at'] = $this->input->post('type1_recurrence_at');
				$insertArr['type1_duration'] = $this->input->post('type1_duration');
			} else {
				$insertArr['type2_recurrence_at'] = $this->input->post('type2_recurrence_at');
				$insertArr['type2_day'] = $this->input->post('type2_day');
				$insertArr['type2_duration'] = $this->input->post('type2_duration');
			}

			if (isset($id) && !empty($id)) {
				$value = $this->Event_model->updateData($insertArr, $id);
			} else {
				$value = $this->Event_model->insertData($insertArr);
			}

			if ($value) {
				redirect(base_url('event'));
			}
		}
	}

	public function delete($id)
	{
		if (!empty($id)) {
			$returnData = 	$this->Event_model->deleteData($id);
			redirect(base_url('event'));
		}
	}

	public function view($id)
	{
		if (!empty($id)) {
			$data['eventDetails'] = $this->Event_model->getData(array('id' => $id), true);
		}
		$this->load->view('event_detail', $data);
	}
}
