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

  public function exams()
  {
    // $params = func_get_args();
    // Check Auth
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }

    $exams = $this->examModel->findAllExams();
    $data = array(
      'html_title' => 'Exams',
      'exams' => $exams
    );
    $this->view('admin/exams', $data);
  }

  public function exam(...$params)
  {
    // Check Auth
    if (!isLoggedIn('admin')) {
      redirect('admin/login');
    }
    // print('<pre>' . print_r($params, true) . '</pre>');
    if (isset($params[0])) {
      if ($params[0] == 'create') {
        // Create
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          if (empty($params[1])) {
            $teachers = $this->teacherModel->findAllTeachers();
            $exam = array(
              'name' => $_POST['name'],
              'semester' => $_POST['semester'],
              'date' => $_POST['date'],
              'subject' => $_POST['subject'],
              'question_paper_setter' => null,
              'hall_guard' => null,
              'answer_paper_checker' => null,
            );

            // Choose teacher for exam duty
            $exam['question_paper_setter'] = $teachers[array_rand($teachers)]->id;
            $exam['hall_guard'] = $teachers[array_rand($teachers)]->id;
            $exam['answer_paper_checker'] = $teachers[array_rand($teachers)]->id;

            // print('<pre>' . print_r($exam, true) . '</pre>');
            // exit;

            if ($this->examModel->createExam($exam)) {
              flash(
                'exam_action_status',
                'Exam Created Successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>',
                'alert alert-success alert-dismissible fade show'
              );
              redirect('admin/exams');
            } else {
              die('Something went wrong');
            }
          }
        } else {
          // $_SERVER['REQUEST_METHOD'] == 'GET'
          $this->view('admin/createExam');
        }
      } elseif (is_numeric($params[0])) {
        // Read
        // Check exam/$params[0] is set to id
        $data = array(
          'exam' => array(
            'id' => (int) $params[0]
          )
        );
        $exam = $this->examModel->findExamById($data['exam']['id']);
        $data['exam'] = $exam;
        $this->view('admin/exam', $data);
      } elseif (
        $params[0] == 'update' &&
        isset($params[1]) &&
        is_numeric($params[1])
      ) {
        // Update
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          print('<pre>' . print_r($params, true) . '</pre>');
          print('<pre>' . print_r($_POST, true) . '</pre>');
          $exam = array(
            'id' => $params[1],
            'name' => $_POST['name'],
            'semester' => $_POST['semester'],
            'date' => $_POST['date'],
            'subject' => $_POST['subject'],
          );
          print('<pre>' . print_r($exam, true) . '</pre>');
          if ($this->examModel->updateExam($exam)) {
            flash(
              'exam_action_status',
              'Exam Updated Successfully
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>',
              'alert alert-success alert-dismissible fade show'
            );
            redirect('admin/exam/' . $params[1]);
          }
        } else {
          // print('GET<pre>' . print_r($_GET, true) . '</pre>');
          $data = array(
            'html_title' => 'Update Exam',
            'exam' => array(
              'id' => (int) $params[1]
            )
          );
          $data['exam'] = $this->examModel->findExamById($data['exam']['id']);
          $this->view('admin/updateExam', $data);
        }
      } elseif (
        $params[0] == 'delete' &&
        isset($params[1]) &&
        is_numeric($params[1]) &&
        $_SERVER['REQUEST_METHOD'] == 'POST'
      ) {
        // print('<pre>' . print_r($params, true) . '</pre>');
        $data = array(
          'exam' => array(
            'id' => (int) $params[1]
          )
        );
        if ($this->examModel->deleteExam($data['exam']['id'])) {
          flash(
            'exam_action_status',
            'Exam Deleted Successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>',
            'alert alert-success alert-dismissible fade show'
          );
          redirect('admin/exams');
        } else {
          die('Something Went Wrong');
        }
      }
    }
  }
}
