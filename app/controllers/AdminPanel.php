<?php
class AdminPanel extends Controller
{
  private $adminModel;
  public function __construct()
  {
    $this->adminModel = $this->model('Admin');
  }

  // public function login()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // Process form
  //     // Sanitize POST data
  //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  //     // Init data
  //     $data = [
  //       'email' => trim($_POST['email']),
  //       'password' => trim($_POST['password']),
  //       'email_err' => '',
  //       'password_err' => '',
  //     ];
  //   } else {
  //     // Init data
  //     $data = [
  //       'email' => '',
  //       'password' => '',
  //       'email_err' => '',
  //       'password_err' => '',
  //     ];

  //     // Load view
  //     $this->view('admins/login', $data);
  //   }
  // }

  public function index()
  {
    $this->view('admins/index');
  }
}
