<?php
class Teachers extends Controller
{
  private $teacherModel;
  public function __construct()
  {
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

        // Register User
        if ($this->teacherModel->register($data)) {
          flash(
            'register_success',
            'You are successfully registered. 
            A verification link was sent to your email. 
            Please open that link to verify your email.'
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
      $teacher = $this->teacherModel->getTeacherByEmail();
      if ($teacher->email_verification_code == $_GET['email_verification_code']) {
        if ($this->teacherModel->verifyEmail()) {
          flash(
            'register_success',
            'Email Verified. Now you can log in.'
          );
          redirect('teachers/login');
        } else {
          die('Something went wrong.');
        }
      }
    }
  }
}
