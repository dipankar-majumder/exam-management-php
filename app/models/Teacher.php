<?php
class Teacher
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  // Find Teacher By Email
  public function findTeacherByEmail($email)
  {
    $this->db->query(
      'SELECT * FROM teachers
      WHERE email=:email 
      LIMIT 1'
    );
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    return $row;
  }

  // Register teacher
  public function register($data)
  {
    $this->db->query(
      'INSERT INTO teachers (
        email,
        password,
        email_verification_code
      ) VALUES (
        :email,
        :password,
        :email_verification_code
      )'
    );
    // Bind values into query
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':email_verification_code', $data['email_verification_code']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function verifyEmail($email)
  {
    $this->db->query(
      'UPDATE teachers 
      SET email_verification_code=\'true\'
      WHERE email=:email'
    );
    $this->db->bind(':email', $email);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function fillDetails($data)
  {
    $this->db->query(
      'UPDATE teachers
      SET has_details                     = 1,
      name                                = :name,
      date_of_birth                       = :date_of_birth,
      highest_educational_qualification   = :highest_educational_qualification,
      additional_qualification            = :additional_qualification,
      designation                         = :designation,
      department                          = :department,
      gender                              = :gender,
      category                            = :category,
      physically_handicapped              = :physically_handicapped,
      ex_service_man                      = :ex_service_man,
      exempted_category                   = :exempted_category,
      date_of_joining_in_service          = :date_of_joining_in_service,
      date_of_joining_in_present_college  = :date_of_joining_in_present_college,
      pay_band                            = :pay_band,
      band_pay                            = :band_pay,
      grade_pay                           = :grade_pay,
      pan_number                          = :pan_number,
      mobile_number                       = :mobile_number,
      date_of_superannuation              = :date_of_superannuation,
      addresses                           = :addresses
      WHERE email                         = :email'
    );

    $this->db->bind(':name', $data['name']);
    $this->db->bind(':date_of_birth', $data['date_of_birth']);
    $this->db->bind(':highest_educational_qualification', $data['highest_educational_qualification']);
    $this->db->bind(':additional_qualification', $data['additional_qualification']);
    $this->db->bind(':designation', $data['designation']);
    $this->db->bind(':department', $data['department']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':physically_handicapped', $data['physically_handicapped']);
    $this->db->bind(':ex_service_man', $data['ex_service_man']);
    $this->db->bind(':exempted_category', $data['exempted_category']);
    $this->db->bind(':date_of_joining_in_service', $data['date_of_joining_in_service']);
    $this->db->bind(':date_of_joining_in_present_college', $data['date_of_joining_in_present_college']);
    $this->db->bind(':pay_band', $data['pay_band']);
    $this->db->bind(':band_pay', $data['band_pay']);
    $this->db->bind(':grade_pay', $data['grade_pay']);
    $this->db->bind(':pan_number', $data['pan_number']);
    $this->db->bind(':mobile_number', $data['mobile_number']);
    $this->db->bind(':date_of_superannuation', $data['date_of_superannuation']);
    $this->db->bind(':addresses', json_encode($data['addresses']));
    $this->db->bind(':email', $data['email']);
    echo $data['email'];
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
