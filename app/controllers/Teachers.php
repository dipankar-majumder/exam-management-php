<?php
class Teachers extends Controller
{
  private $teacherModel, $examModel;
  public function __construct()
  {
    $this->examModel = $this->model('Exam');
    $this->teacherModel = $this->model('Teacher');
  }
  public function register()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST Data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'email_verification_code' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check email
        if ($this->teacherModel->findTeacherByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken';
        }
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // Make sure errors are empty
      if (
        empty($data['email_err']) &&
        empty($data['password_err']) &&
        empty($data['confirm_password_err'])
      ) {
        // Validated

        // Hash Password
        $data['password'] = password_hash(
          $data['password'],
          PASSWORD_BCRYPT,
          ['cost' => 10]
        );

        // Generate Random String for Email verification
        $data['email_verification_code'] = hash('sha256', sprintf(
          '%s%s%s%s',
          hash('sha512', bin2hex(openssl_random_pseudo_bytes(32))),
          time(),
          hash('sha512', bin2hex(openssl_random_pseudo_bytes(32))),
          time()
        ));

        // Register User
        if ($this->teacherModel->register($data)) {
          flash(
            'register_success',
            'You are successfully registered. 
            A verification link was sent to your email. 
            Please open that link to verify your email.<br>
            <a href="' .
              URLROOT .
              '/teachers/verifyEmail?email=' .
              $data['email'] .
              '&email_verification_code=' .
              $data['email_verification_code'] .
              '">
              <div style="display: flex; justify-content: center;">
              <img src="' .
              URLROOT .
              '/public/images/verifyEmail.jpg">
              </div>
            </a>'
          );
          redirect('teachers/verifyEmail');
        } else {
          die('Something Went Wrong');
        }
      } else {
        // Load view with errors
        $this->view('teachers/register', $data);
      }
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('teachers/register', $data);
    }
  }
  public function verifyEmail()
  {
    // Check for verification code
    if (
      empty($_GET['email']) &&
      empty($_GET['email_verification_code'])
    ) {
      $this->view('teachers/verifyEmail');
    } else {
      $data = [
        'email' => trim($_GET['email']),
        'email_verification_code' => trim($_GET['email_verification_code'])
      ];

      $teacher = $this->teacherModel->findTeacherByEmail($data['email']);

      if ($teacher->email_verification_code == $data['email_verification_code']) {
        if ($this->teacherModel->verifyEmail($data['email'])) {
          flash('register_success', 'Email Verified. Fill your personal details');
          session_start();
          $_SESSION['email'] = $data['email'];
          redirect('teachers/fillDetails');
        } else {
          die('Something went wrong.');
        }
      } else {
        flash('register_failed', 'Email Not Verified.', 'alert alert-denger');
        redirect('teachers/verifyEmail');
      }
    }
  }
  public function fillDetails()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST Data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      print('<pre>' . print_r($_POST, true) . '</pre>');
      // Init data
      $data = array(
        'name'                                => trim($_POST['name']),
        'date_of_birth'                       => trim($_POST['date_of_birth']),
        'highest_educational_qualification'   => trim($_POST['highest_educational_qualification']),
        'additional_qualification'            => trim($_POST['additional_qualification']),
        'designation'                         => trim($_POST['designation']),
        'department'                          => trim($_POST['department']),
        'gender'                              => trim($_POST['gender']),
        'category'                            => trim($_POST['category']),
        'physically_handicapped'              => trim($_POST['physically_handicapped']),
        'ex_service_man'                      => trim($_POST['ex_service_man']),
        'exempted_category'                   => trim($_POST['exempted_category']),
        'date_of_joining_in_service'          => trim($_POST['date_of_joining_in_service']),
        'date_of_joining_in_present_college'  => trim($_POST['date_of_joining_in_present_college']),
        'pay_band'                            => trim($_POST['pay_band']),
        'band_pay'                            => trim($_POST['band_pay']),
        'grade_pay'                           => trim($_POST['grade_pay']),
        'pan_number'                          => trim($_POST['pan_number']),
        'mobile_number'                       => trim($_POST['mobile_number']),
        'email'                               => trim($_POST['email']),
        'date_of_superannuation'              => trim($_POST['date_of_superannuation']),
        'addresses'                           => array(
          'present_address' => array(
            'house_number'      => trim($_POST['present_address_house_number']),
            'location'          => trim($_POST['present_address_location']),
            'village'           => trim($_POST['present_address_village']),
            'post_office'       => trim($_POST['present_address_post_office']),
            'police_station'    => trim($_POST['present_address_police_station']),
            'pin_code'          => trim($_POST['present_address_pin_code']),
            'district'          => trim($_POST['present_address_district']),
            'state'             => trim($_POST['present_address_state'])
          ),
          'permanent_address' => array(
            'house_number'      => trim($_POST['permanent_address_house_number']),
            'location'          => trim($_POST['permanent_address_location']),
            'village'           => trim($_POST['permanent_address_village']),
            'post_office'       => trim($_POST['permanent_address_post_office']),
            'police_station'    => trim($_POST['permanent_address_police_station']),
            'pin_code'          => trim($_POST['permanent_address_pin_code']),
            'district'          => trim($_POST['permanent_address_district']),
            'state'             => trim($_POST['permanent_address_state'])
          ),
        ),
      );

      if (
        $this->teacherModel->fillDetails($data) &&
        session_destroy() &&
        session_start()
      ) {
        flash(
          'register_success',
          'Now you can log in'
        );
        redirect('teachers/login');
      } else {
        die('Something Went Wrong');
      }


      // Validate
      // if (
      //   empty($data['name']) &&
      //   empty($data['date_of_birth']) &&
      //   empty($data['highest_education_qualification']) &&
      //   empty($data['additional_qualification']) &&
      //   empty($data['designation']) &&
      //   empty($data['department']) &&
      //   empty($data['gender']) &&
      //   empty($data['category']) &&
      //   empty($data['physically_handicapped']) &&
      //   empty($data['ex_service_man']) &&
      //   empty($data['exempted_category']) &&
      //   empty($data['date_of_joining_in_present_college']) &&
      //   empty($data['pay_band']) &&
      //   empty($data['band_pay']) &&
      //   empty($data['grade_pay']) &&
      //   empty($data['pan_number']) &&
      //   empty($data['mobile_number']) &&
      //   empty($data['date_of_superannuation'])
      // ) {
      //   flash('fillDetails_failed', 'Please fill up all fields');
      //   redirect('teachers/fillDetails');
      // }

      // 
    } else {
      // Init data
      // $data = [
      //   'name'                                => '',
      //   'date_of_birth'                       => '',
      //   'highest_educational_qualification'   => '',
      //   'additional_qualification'            => '',
      //   'designation'                         => '',
      //   'department'                          => '',
      //   'gender'                              => '',
      //   'category'                            => '',
      //   'physically_handicapped'              => '',
      //   'ex_service_man'                      => '',
      //   'exempted_category'                   => '',
      //   'date_of_joining_in_service'          => '',
      //   'date_of_joining_in_present_college'  => '',
      //   'pay_band'                            => '',
      //   'band_pay'                            => '',
      //   'grade_pay'                           => '',
      //   'pan_number'                          => '',
      //   'mobile_number'                       => '',
      //   'email'                               => '',
      //   'date_of_superannuation'              => '',
      //   'present_address'                     => '',
      //   'permanent_address'                   => '',

      //   // Error tracker

      //   'name_err'                                => '',
      //   'date_of_birth_err'                       => '',
      //   'highest_educational_qualification_err'   => '',
      //   'additional_qualification_err'            => '',
      //   'designation_err'                         => '',
      //   'department_err'                          => '',
      //   'gender_err'                              => '',
      //   'category_err'                            => '',
      //   'physically_handicapped_err'              => '',
      //   'ex_service_man_err'                      => '',
      //   'exempted_category_err'                   => '',
      //   'date_of_joining_in_present_college_err'  => '',
      //   'pay_band_err'                            => '',
      //   'band_pay_err'                            => '',
      //   'grade_pay_err'                           => '',
      //   'pan_number_err'                          => '',
      //   'mobile_number_err'                       => '',
      //   'email_err'                               => '',
      //   'date_of_superannuation_err'              => '',
      //   'present_address_err'                     => '',
      //   'permanent_address_err'                   => '',
      // ];

      $this->view('teachers/fillDetails');
    }
  }
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST Data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      $teacher = $this->teacherModel->findTeacherByEmail($data['email']);

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else if (!$teacher) {
        // Check existance of teacher
        $data['email_err'] = 'Email is not registered';
      } else if ($teacher->email_verification_code != 'true') {
        $data['email_err'] = 'Email not verified';
        flash(
          'login_failed',
          '<h6>Email Not Verified⚠</h6><hr class="mt-0 mb-1"><div style="clear: both;"></div>
          Please open verification link from your registered email',
          'alert alert-danger'
        );
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must be at least 6 characters';
      } elseif (!isset($teacher->password)) {
        $data['password_err'] = '';
      } elseif (!password_verify($data['password'], $teacher->password)) {
        $data['password_err'] = 'Wrong Password';
      }

      // Make sure errors are empty
      if (
        empty($data['email_err']) &&
        empty($data['password_err']) &&
        empty($data['confirm_password_err'])
      ) {
        //
        session_start();
        $_SESSION['email'] = $teacher->email;
        if ($teacher->has_details) {
          unset($_SESSION['email']);
          $_SESSION['teacher_email'] = $teacher->email;
          $_SESSION['teacher_id'] = $teacher->id;
          redirect('teachers');
        } else {
          redirect('teachers/fillDetails');
        }
      } else if ($teacher && !$teacher->has_details) {
        flash(
          'login_failed',
          '<h6>Please fill up your details.</h6><hr class="mt-0 mb-1"><div style="clear: both;"></div>
            Go To <a href="' .
            URLROOT .
            '/teachers/fillDetails">Fill Details Form</a>',
          'alert alert-danger'
        );
        // Load view with errors
        $this->view('teachers/login', $data);
      } else {
        $this->view('teachers/login', $data);
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
      $this->view('teachers/login', $data);
    }
  }
  public function index()
  {
    if (empty($_SESSION['teacher_id'])) {
      redirect('teachers/login');
    }
    $this->view('teachers/index');
  }
  public function logout()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      session_destroy();
      redirect('');
    }
  }

  public function questionPaper()
  {
    if (!isLoggedIn('teacher')) {
      redirect('teachers/login');
    }
    $data = array();
    $data['exams'] = $this->examModel->findExamsByTeacherId($_SESSION['teacher_id']);
    $data['exams'] = array_filter($data['exams'], function ($value, $key) {
      return strpos($value->duty_path, 'question_paper_setters') != false;
    }, ARRAY_FILTER_USE_BOTH);
    $this->view('teachers/questionPaper', $data);
  }

  public function external(...$params)
  {
    if (!isLoggedIn('teacher')) {
      redirect('teachers/login');
    }
    if (!isset($params[0])) {
      $data = array();
      $data['exams'] = $this->examModel->findExamsByTeacherId($_SESSION['teacher_id']);
      foreach ($data['exams'] as $key => $value) {
        $data['exams'][$key]->duty = json_decode($data['exams'][$key]->duty);
      }
      $data['exams'] = array_filter($data['exams'], function ($value, $key) {
        return strpos($value->duty_path, 'externals') != false;
      }, ARRAY_FILTER_USE_BOTH);
      $this->view('teachers/external', $data);
    } else {
      if (is_numeric($params[0])) {
        if (!isset($params[1])) {
        } else {
          if ($params[1] == 'print') {
            $data = array();
            $data['teacher'] = $this->teacherModel->findTeacherById($_SESSION['teacher_id']);
            $data['exam'] = $this->examModel->findExamById($params[0]);
            $data['exam']->duty = json_decode($data['exam']->duty);
            foreach ($data['exam']->duty->externals as $value) {
              if ($value->teacher == $data['teacher']->id) {
                $data['college'] = $value->college;
                break;
              }
            }
            $this->view('teachers/printDutyLetter', $data);
          }
        }
      }
    }
  }

  public function answerPaper()
  {
    if (!isLoggedIn('teacher')) {
      redirect('teachers/login');
    }
    $data = array();
    $data['exams'] = $this->examModel->findExamsByTeacherId($_SESSION['teacher_id']);
    $data['exams'] = array_filter($data['exams'], function ($value, $key) {
      // DEVMODE
      return strpos($value->duty_path, 'answer_paper_checker') != false;
    }, ARRAY_FILTER_USE_BOTH);
    $this->view('teachers/external', $data);
  }
}
