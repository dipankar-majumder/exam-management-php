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
      WHERE exams.id = :id'
    );
    $this->db->bind(':id', $id, PDO::PARAM_INT);
    return $this->db->single();
  }

  // Find Exams By Teacher Id
  public function findExamsByTeacherId($id)
  {
    $this->db->query(
      'select *, json_search(duty, \'one\', :id) as duty_path from exams'
    );
    $this->db->bind(':id', $id);
    if (!$this->db->execute()) {
      die('Something Went Wrong');
      return;
    }
    $exams = $this->db->resultSet();
    $exams = array_filter($exams, function ($value, $key) {
      return $value->duty_path != null;
    }, ARRAY_FILTER_USE_BOTH);
    return $exams;
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
        type,
        duty
      ) VALUES (
        :name,
        :semester,
        :date,
        :subject,
        :type,
        :duty
      )'
    );
    $this->db->bind(':name', $exam['name']);
    $this->db->bind(':semester', $exam['semester']);
    $this->db->bind(':date', $exam['date']);
    $this->db->bind(':subject', $exam['subject']);
    $this->db->bind(':type', $exam['type']);
    $this->db->bind(':duty', json_encode($exam['duty']), JSON_FORCE_OBJECT);
    // $this->db->bind(':question_paper_setter', $exam['question_paper_setter']);
    // $this->db->bind(':hall_guard', $exam['hall_guard']);
    // $this->db->bind(':answer_paper_checker', $exam['answer_paper_checker']);
    return $this->db->execute();
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
    return $this->db->execute();
  }

  public function deleteExam($id)
  {
    $this->db->query(
      'DELETE FROM exams
      WHERE id = :id'
    );
    $this->db->bind(':id', $id);
    return $this->db->execute();
  }

  // DEV
  public function allocateCollege($data)
  {
    // print('<pre>' . var_dump($data) . '</pre>');
    // return false;
    $this->db->query(
      "UPDATE exams SET duty = JSON_SET(duty, '$.externals[{$data['external']['id']}].college', '{$data['external']['college']}') WHERE id = {$data['exam']->id}"
    );
    return $this->db->execute();
  }

  public function updateDuty($exam)
  {
    if (!is_array($exam)) {
      die('[Exam.updateDuty($exam)]: $exam is not an array');
    }
    $this->db->query(
      'UPDATE exams
      SET
      duty = :duty
      WHERE id = :id'
    );
    $this->db->bind(':duty', json_encode($exam['duty']), JSON_FORCE_OBJECT);
    $this->db->bind(':id', $exam['id']);
    return $this->db->execute();
  }

  public function approve($data)
  {
    // DEV
    // print('<pre>' . print_r($data['question_paper_setter'], true) . '</pre>');
    // exit;
    foreach (['question_paper_setter', 'answer_paper_checker', 'external'] as $key => $value) {
      if (empty($data[$value])) {
        continue;
      }
      // print("UPDATE exams SET duty = JSON_SET(duty, '$.{$value}s[{$data[$value]['id']}].approved', {$data[$value]['approved']}) WHERE id = {$data['exam']->id}");
      // exit;
      if ($data[$value]['approved']) {
        $this->db->query(
          "UPDATE exams SET duty = JSON_SET(duty, '$.{$value}s[{$data[$value]['id']}].approved', true) WHERE id = {$data['exam']->id}"
        );
      } else {
        $this->db->query(
          "UPDATE exams SET duty = JSON_SET(duty, '$.{$value}s[{$data[$value]['id']}].approved', false) WHERE id = {$data['exam']->id}"
        );

      }
      return $this->db->execute();
    }
  }

  public function pay($data) {
    foreach (['question_paper_setter', 'answer_paper_checker', 'external'] as $key => $value) {
      if (empty($data[$value])) {
        continue;
      }
      // print("UPDATE exams SET duty = JSON_SET(duty, '$.{$value}s[{$data[$value]['id']}].paymentStatus', '{$data[$value]['paymentStatus']}') WHERE id = {$data['exam']->id}");
      // exit;
      $this->db->query(
        "UPDATE exams SET duty = JSON_SET(duty, '$.{$value}s[{$data[$value]['id']}].paymentStatus', '{$data[$value]['paymentStatus']}') WHERE id = {$data['exam']->id}"
      );
      return $this->db->execute();
    }
  }
}
