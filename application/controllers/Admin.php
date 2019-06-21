<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function index() {
    if($this->session->userdata('id')) {
      $cihead['Menu1'] = 'Dashboard';
      $cihead['category'] = $this->records_model->get_categories();
      $this->load->view('admin/includes/cihead', $cihead);
      $this->load->view('admin/table');
      $this->load->view('admin/includes/cifoot');
    }
    else {
      redirect(base_url().'Access/login/', 'refresh');
    }

  }

  public function settings() {
    $cihead['Menu1'] = 'settings';
    $cihead['category'] = $this->records_model->get_categories();

    $this->load->view('admin/includes/cihead', $cihead);
    $this->load->view('admin/settings');
    $this->load->view('admin/includes/cifoot');
  }

  public function orders() {
    $cihead['Menu1'] = 'orders';
    $cihead['category'] = $this->records_model->get_categories();

    $this->load->view('admin/includes/cihead', $cihead);
    $this->load->view('admin/orders');
    $this->load->view('admin/includes/cifoot');
  }
  function get_products() {
    $this->output->set_content_type("application/json")
    ->set_output(json_encode($this->records_model->get_catalog()));
  }
  function get_product() {
    $this->output->set_content_type("application/json")
    ->set_output(json_encode($this->records_model->get_product($this->input->post('id'))));
  }
  function get_categories() {
    $this->output->set_content_type("application/json")
    ->set_output(json_encode($this->records_model->get_categories()));
  }
  function save() {
      $this->records_model->save($this->input->post());
  }
  function get_orders() {
    if($this->session->userdata('id')){
      $this->output->set_content_type("application/json")
      ->set_output(json_encode($this->records_model->get_orders()));
    }
    else return 'Unauthorized Access';
  }
  function save_slider() {
    $this->records_model->save_slider($this->input->post());
  }
  function get_sliders() {
    $this->output->set_content_type("application/json")
    ->set_output(json_encode($this->records_model->get_sliders($this->input->post('id'), 0)));
  }

  // Change Password
  function password_change() {
    /*$user_credentials = array(
      $this->input->post('oldPassword'),
      $this->input->post('newPassword'),
      $this->input->post('retypePassword'),
      $this->input->post('userEmail'),
      $this->input->post('userEmailPassword')
    );*/

    // NOTE Saan galing yung $data? buguk
    $data = $this->records_model->password_change();
    echo json_encode($data);
  }

}
