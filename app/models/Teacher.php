<?php
class Teacher
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  // Register teacher
  public function register($data)
  {
    $this->db->query(
      'INSERT INTO teachers (
        email, password
      ) VALUES (
        :email,
        :password
      )'
    );
    // Bind values into query
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

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

  public function findTeacherByEmail($email)
  {
    $this->db->query('SELECT * FROM teachers
                      WHERE email=:email 
                      LIMIT 1');
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function getTeacherByEmail($email)
  {
    $this->db->query('SELECT * FROM teachers
                      WHERE email=:email 
                      LIMIT 1');
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    return $row;
  }
}
