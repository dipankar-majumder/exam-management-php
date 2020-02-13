<?php require APPROOT . '/views/teachers/inc/header.php'; ?>
<h2>Teacher's Question Paper Page</h2>
<table border="1">
  <thead>
    <th>Id</th>
    <th>Name</th>
  </thead>
  <tbody>
    <?php if (!count($data['exams'])) : ?>
      <tr>
        <td colspan="2">Empty</td>
      </tr>
    <?php endif; ?>
    <?php foreach ($data['exams'] as $key => $exam) : ?>
      <tr>
        <td><?php echo $exam->id; ?></td>
        <td><?php echo $exam->name; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/teachers/inc/footer.php'; ?>