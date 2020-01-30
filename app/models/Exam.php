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

  // Find Exam By Id
  public function findExamById($id)
  {
    $this->db->query(
      'SELECT * FROM exams
      WHERE id=:id'
    );
    $this->db->bind(':id', $id, PDO::PARAM_INT);
    return $this->db->single();
  }

  // Add Exam
  public function createExam($exam)
  {
    $this->db->query(
      'INSERT INTO exams (
        name
      ) VALUES (
        :name
      )'
    );
    $this->db->bind(':name', $exam['name']);
    return $this->db->execute() ? true : false;
  }
}
