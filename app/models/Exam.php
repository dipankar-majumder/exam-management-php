<?php
class Exam
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  // Find All Exams
  public function findAllExams()
  {
    $this->db->query(
      'SELECT * FROM exams'
    );
    return $this->db->resultSet();
  }
}
