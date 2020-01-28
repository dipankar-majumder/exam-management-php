<?php
class Admin extends Controller
{
  private $adminModel;
  private $teacherModel;
  private $examModel;
  public function __construct()
  {
    // $this->model() arguments same as filename of APPROOT . '/models/' folders
    $this->adminModel = $this->model('AdminModel');
    $this->teacherModel = $this->model('Teacher');
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      $admin = $this->adminModel->findAdminByEmail($data['email']);

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else if (!$admin) {
        // Check existance of teacher
        $data['email_err'] = 'Email is not registered';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      } elseif (!isset($admin->password)) {
        $data['password_err'] = '';
      } elseif (!password_verify($data['password'], $admin->password)) {
        $data['password_err'] = 'Wrong Password';
      }

      // Make sure errors are empty
      if (
        empty($data['email_err']) &&
        empty($data['password_err']) &&
        empty($data['confirm_password_err'])
      ) {
        // DE🐞
        echo "login";
        exit;
        session_start();
        $_SESSION['admin_id'] = $admin->id;
        $_SESSION['admin_email'] = $admin->email;
        redirect('admin');
      } else {
        // Load view with error
        $this->view('admin/login', $data);
      }
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('admin/login', $data);
    }
  }

  public function logout()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      session_destroy();
      redirect('admin/login');
    }
  }

  public function index()
  {
    // Check Auth
    // if (!isLoggedIn('teacher')) {
    //   redirect('admin/login');
    // }
    $this->view('admin/index');
  }

  public function dashboard()
  {
    $this->view('admin/dashboard');
  }

  public function teachers()
  {
    $teachers = $this->teacherModel->findAllTeachers();
    $data = array(
      'html_title' => 'Teachers',
      'teachers' => $teachers
    );
    $this->view('admin/teachers', $data);
  }

  public function exams()
  {
    $data = array(
      'html_title' => 'Teachers',
    );
    $this->view('admin/exams', $data);
  }

  public function addExam()
  {
  }
}
