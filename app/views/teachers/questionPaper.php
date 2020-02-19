<?php require APPROOT . '/views/teachers/inc/header.php'; ?>
<h2>Teacher's Question Paper Page</h2>
<table border="1">
  <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Upload Question Paper</th>
  </thead>
  <tbody>
    <?php if (!count($data['exams'])) : ?>
      <tr>
        <td colspan="2">Empty</td>
      </tr>
    <?php endif; ?>
    <!-- <?php print('<pre>' . print_r($data, true) . '</pre>') ?> -->
    <?php foreach ($data['exams'] as $key => $exam) : ?>
      <tr>
        <td><?php echo $exam->id; ?></td>
        <td><?php echo $exam->name; ?></td>
        <td>
          <?php foreach ($exam->duty->question_paper_setters as $questionPaperSetter) :
            if ($questionPaperSetter->teacher == $_SESSION['teacher_id'] && !isset($questionPaperSetter->questionPaper)) :
          ?>
              <form action="<?php echo URLROOT; ?>/teachers/questionPaper/<?php echo $exam->id; ?>/upload" method="post" enctype="multipart/form-data">
                <input type="file" name="questionPaper" id="questionPaper">
                <input type="submit" value="Upload">
              </form>
          <?php endif;
          endforeach; ?>
        </td>
        <!-- <?php if (!empty($exam->duty->question_paper_setters)) : ?>
          <td>
            <form action="<?php echo URLROOT; ?>/teachers/questionPaper/<?php echo $exam->id; ?>/upload" method="post" enctype="multipart/form-data">
              <input type="file" name="questionPaper" id="questionPaper">
              <input type="submit" value="Upload">
            </form>
          </td>
        <?php endif; ?> -->
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/teachers/inc/footer.php'; ?>