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
    $this->examModel = $this->model('Exam');
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
        $data['email_err'] = 'Wrong Email';
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
        // echo "login";
        // exit;
        session_start();
        $_SESSION['admin_id'] = $admin->id;
        $_SESSION['admin_email'] = $admin->email;
        redirect('admin/dashboard');
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
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }
    // $this->view('admin/index');
    redirect('admin/dashboard');
  }

  public function dashboard()
  {
    // Check Auth
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }
    $this->view('admin/dashboard');
  }

  public function teachers()
  {
    // Check Auth
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }
    $teachers = $this->teacherModel->findAllTeachers();
    $data = array(
      'html_title' => 'Teachers',
      'teachers' => $teachers
    );
    $this->view('admin/teachers', $data);
  }

  public function exams(...$params)
  {
    // $params = func_get_args();
    // Check Auth
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }

    if (empty($params)) {
      $exams = $this->examModel->findAllExams();
      $data = array(
        'html_title' => 'Exams',
        'exams' => $exams
      );
      $this->view('admin/exams', $data);
    } else {
      if ($params[0] == 'addExam') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          if (empty($params[1])) {
            $exam = array(
              'name' => $_POST['name']
            );
            if ($this->examModel->addExam($exam)) {
              redirect('admin/exams');
            }
          }
        } else {
          // $_SERVER['REQUEST_METHOD'] == 'GET'
          $this->view('admin/addExam');
        }
      } elseif ($params[0] == 'exam') {
        if (empty($params[1])) {
          print('<pre>' . print_r($params, true) . '</pre>');
        }
      } elseif (is_numeric($params[0])) {
        $data = array(
          'exam' => array(
            'id' => (int) $params[0]
          )
        );
        $exam = $this->examModel->findExamById($data['exam']['id']);
        $data['exam'] = $exam;
        $this->view('admin/exam', $data);
      }
    }
  }

  public function exam(...$params)
  {
    // Check Auth
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }
    // print('<pre>' . print_r($params, true) . '</pre>');
    if (isset($params[0])) {
      // Check exam/$params[0] is set to id
      if (is_numeric($params[0])) {
      } elseif ($params[0] == 'create') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          if (empty($params[1])) {
            $exam = array(
              'name' => $_POST['name']
            );
            if ($this->examModel->addExam($exam)) {
              redirect('admin/exams');
            }
          }
        } else {
          // $_SERVER['REQUEST_METHOD'] == 'GET'
          $this->view('admin/createExam');
        }
      } elseif (
        $params[0] == 'update' &&
        isset($params[1])
      ) {
        print('<pre>' . print_r($params, true) . '</pre>');
      } elseif (
        $params[0] == 'delete' &&
        isset($params[1]) &&
        is_numeric($params[1]) &&
        $_SERVER['REQUEST_METHOD'] == 'POST'
      ) {
        print('<pre>' . print_r($params, true) . '</pre>');
      } else {
      }
    }
  }
}
