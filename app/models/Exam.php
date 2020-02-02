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
      'SELECT
      exams.id,
      exams.name,
      exams.semester,
      exams.date,
      exams.subject,
      teacher1.name AS `Question Paper Setter`,
      teacher2.name AS `Hall Guard`,
      teacher3.name AS `Answer Paper Checker`
      FROM
        exams
      INNER JOIN teachers AS teacher1
      ON
        exams.question_paper_setter = teacher1.id
      INNER JOIN teachers AS teacher2
      ON
        exams.hall_guard = teacher2.id
      INNER JOIN teachers AS teacher3
      ON
        exams.answer_paper_checker = teacher3.id
      WHERE
        exams.id = :id'
    );
    $this->db->bind(':id', $id, PDO::PARAM_INT);
    return $this->db->single();
  }

  // Add Exam
  public function createExam($exam)
  {
    $this->db->query(
      'INSERT INTO exams (
        name,
        semester,
        date,
        subject,
        question_paper_setter,
        hall_guard,
        answer_paper_checker
      ) VALUES (
        :name,
        :semester,
        :date,
        :subject,
        :question_paper_setter,
        :hall_guard,
        :answer_paper_checker
      )'
    );
    $this->db->bind(':name', $exam['name']);
    $this->db->bind(':semester', $exam['semester']);
    $this->db->bind(':date', $exam['date']);
    $this->db->bind(':subject', $exam['subject']);
    $this->db->bind(':question_paper_setter', $exam['question_paper_setter']);
    $this->db->bind(':hall_guard', $exam['hall_guard']);
    $this->db->bind(':answer_paper_checker', $exam['answer_paper_checker']);
    return $this->db->execute() ? true : false;
  }

  public function updateExam($exam)
  {
    $this->db->query(
      'UPDATE exams SET
      name = :name,
      semester = :semester,
      date = :date,
      subject = :subject
      WHERE id = :id'
    );
    $this->db->bind(':name', $exam['name']);
    $this->db->bind(':semester', $exam['semester']);
    $this->db->bind(':date', $exam['date']);
    $this->db->bind(':subject', $exam['subject']);
    $this->db->bind(':id', $exam['id']);
    return $this->db->execute() ? true : false;
  }

  public function deleteExam($id)
  {
    $this->db->query(
      'DELETE FROM exams
      WHERE id = :id'
    );
    $this->db->bind(':id', $id);
    return $this->db->execute() ? true : false;
  }
}
