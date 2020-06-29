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
              'type' => $_POST['type'],
              'duty' => array(),
            );

            // Choose teacher for exam duty
            $randomTeachers = $teachers;
            shuffle($randomTeachers);
            print(json_encode(array_map(function ($randomTeacher) {
              return $randomTeacher->id;
            }, $randomTeachers)));
            $exam['duty']['question_paper_setters'] = array();
            for ($i = 0; $i < 2; $i++) {
              $exam['duty']['question_paper_setters'][$i] = array();
              $exam['duty']['question_paper_setters'][$i]['teacher'] = (int) array_pop($randomTeachers)->id;
            }
            // print('<pre>' . print_r($exam, true) . '</pre>');
            if ($exam['type'] == 'Practical') {
              $exam['duty']['externals'] = array();
              // $exam['duty']['externals']['teacher'] = array();
              // $exam['duty']['externals']['college'] = array();
              // Number of Colleges
              for ($i = 0; $i < 2; $i++) {
                $exam['duty']['externals'][$i] = array();
                // $exam['duty']['externals'][$i]['teacher'] = array();
                // $exam['duty']['externals'][$i]['college'] = array();
                // array_push($exam['duty']['externals'][$i]['teacher'], array_pop($randomTeachers)->id);
                $exam['duty']['externals'][$i]['teacher'] = (int) array_pop($randomTeachers)->id;
                $exam['duty']['externals'][$i]['college'] = null;
              }
            } elseif ($exam['type'] == 'Theory') {
              $exam['duty']['answer_paper_checkers'] = array();
              // array_push($exam['duty']['answer_paper_checkers'], array_pop($randomTeachers)->id);
              // array_push($exam['duty']['answer_paper_checkers'], array_pop($randomTeachers)->id);
              for ($i = 0; $i < 2; $i++) {
                $exam['duty']['answer_paper_checkers'][$i] = array();
                $exam['duty']['answer_paper_checkers'][$i]['teacher'] = (int) array_pop($randomTeachers)->id;
              }
            }

            // Debug
            // $exam = (object) $exam;
            // print('<pre>' . json_encode($exam, JSON_PRETTY_PRINT) . '</pre>');
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
        $data['exam']->duty = json_decode($data['exam']->duty);
        if (empty($params[1])) {
          // var_dump($data);
          // return;
          $this->view('admin/exam', $data);
        } else {
          if ($params[1] == 'questionPaperSetters') {
            $data['questionPaperSetters'] = array();
            foreach ($data['exam']->duty->question_paper_setters as $key => $value) {
              $data['questionPaperSetters'][$key] = array();
              $data['questionPaperSetters'][$key]['teacher'] = $this->teacherModel->findTeacherById($value->teacher);
              // if (isset($value->questionPaper)) {
              //   $data['questionPaperSetters'][$key]['questionPaper'] = $value->questionPaper;
              // }
              $data['questionPaperSetters'][$key]['questionPaper'] = isset($value->questionPaper) ? $value->questionPaper : null;
              $data['questionPaperSetters'][$key] = (object) $data['questionPaperSetters'][$key];
            }
            $this->view('admin/questionPaperSetters', $data);
          } elseif ($params[1] == 'answerPaperCheckers') {
            // In DEV mode
            // print('<pre>' . print_r($data, true) . '</pre>');
            // exit;
            $data['answerPaperCheckers'] = array();
            foreach($data['exam']->duty->answer_paper_checkers as $key => $value) {
              $data['answerPaperCheckers'][$key] = array();
              $data['answerPaperCheckers'][$key]['teacher'] = $this->teacherModel->findTeacherById($value->teacher);
              $data['answerPaperCheckers'][$key]['answerPaperSubmissionSlip'] = isset($value->answerPaperSubmissionSlip) ? $value->answerPaperSubmissionSlip : null;
              $data['answerPaperCheckers'][$key] = (object) $data['answerPaperCheckers'][$key];
            }
            $this->view('admin/answerPaperCheckers', $data);
          } elseif ($params[1] == 'externals') {
            $data['externals'] = array();
            foreach ($data['exam']->duty->externals as $key => $value) {
              $data['externals'][$key] = array();
              $data['externals'][$key]['teacher'] = $this->teacherModel->findTeacherById($value->teacher);
              $data['externals'][$key]['college'] = $value->college;
              if (isset($value->upload)) {
                $data['externals'][$key]['upload'] = $value->upload;
              }
              $data['externals'][$key] = (object) $data['externals'][$key];
            }
            $this->view('admin/externals', $data);
          } elseif ($params[1] == 'external') {
            if (!isset($params[2])) {
            } else {
              if (is_numeric($params[2])) {
                if (empty($params[3])) {
                  echo 'external/numeric';
                } else {
                  if ($params[3] == 'allocateCollege') {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                      $data['external'] = array();
                      $data['external']['id'] = (int) $params[2];
                      $data['external']['college'] = $_POST['college'];
                      if ($this->examModel->allocateCollege($data)) {
                        redirect('admin/exam/' . $data['exam']->id . '/externals');
                      } else {
                        die('Something went wrong⚠');
                      }
                    } else {
                      // $_SERVER['REQUEST_METHOD'] == 'GET';
                      $data['external'] = array();
                      $data['external']['id'] = $params[2];
                      $data['external']['teacher'] = $this->teacherModel->findTeacherById($data['exam']->duty->externals[$params[2]]->teacher);
                      $data['external']['college'] = $data['exam']->duty->externals[$params[2]]->college;
                      $data['external'] = (object) $data['external'];
                      $this->view('admin/allocateCollegeToExternals', $data);
                    }
                  }
                }
              }
            }
          }
        }
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
