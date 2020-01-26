<?php
class AdminModel
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function findAdminByEmail($email)
  {
    $this->db->query(
      'SELECT * FROM admin
      WHERE email=:email
      LIMIT 1'
    );
    $row = $this->db->single();
    return $row;
  }
}
