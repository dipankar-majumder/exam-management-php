<?php require APPROOT . '/views/teachers/inc/header.php'; ?>
<h2>Teacher's Question Paper Page</h2>
<table border="1">
  <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Upload Question Paper</th>
    <th>Approve Status</th>
    <th>Request for Payment</th>
  </thead>
  <tbody>
    <?php if (!count($data['exams'])) : ?>
      <tr>
        <td colspan="2">Empty</td>
      </tr>
    <?php endif; ?>
    <?php print('<pre>' . print_r($data, true) . '</pre>') ?>
    <?php foreach ($data['exams'] as $key => $exam) : ?>
      <tr>
        <td><?php echo $exam->id; ?></td>
        <td><?php echo $exam->name; ?></td>
        <td>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) : ?>
            <?php if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && !isset($questionPaperSetter->questionPaper)) : ?>
              <form action="<?php echo URLROOT; ?>/teachers/questionPaper/<?php echo $exam->id; ?>/upload" method="post" enctype="multipart/form-data">
                <input type="file" name="questionPaper" id="questionPaper">
                <input type="submit" value="Upload">
              </form>
          <?php continue; endif; ?>
          <?php endforeach; ?>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) : ?>
            <?php if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && isset($questionPaperSetter->questionPaper)) : ?>
              Question Paper Uploaded
            <?php endif; ?>
          <?php endforeach; ?>
        </td>
        <td>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) : ?>
            <?php if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && isset($questionPaperSetter->approved) && $questionPaperSetter->approved) : ?>
              Approved
            <?php endif; ?>
          <?php endforeach; ?>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) : ?>
            <?php if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && isset($questionPaperSetter->questionPaper) && (empty($questionPaperSetter->approved) || !$questionPaperSetter->approved)) : ?>
              Pending
            <?php endif; ?>
          <?php endforeach; ?>
        </td>
        <td>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) : ?>
            <?php if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && empty($questionPaperSetter->bankDetails) && isset($questionPaperSetter->approved) && $questionPaperSetter->approved) : ?>
              <a href="<?php echo URLROOT ?>/teachers/questionPaper/<?php echo $exam->id; ?>/fillPaymentDetails" style="text-decoration: none;">
                Fill Payment Details
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) : ?>
            <?php if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && isset($questionPaperSetter->paymentStatus) && $questionPaperSetter->paymentStatus == 'done') : ?>
              Paid
            <?php elseif ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && isset($questionPaperSetter->bankDetails) && !(empty($questionPaperSetter->approved) || !$questionPaperSetter->approved)) : ?>
              Payment Request Sent
            <?php endif; ?>
          <?php endforeach; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/teachers/inc/footer.php'; ?>