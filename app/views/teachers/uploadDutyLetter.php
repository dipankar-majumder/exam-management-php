<?php require APPROOT . '/views/teachers/inc/header.php'; ?>
<h2>External Duty: Upload Duty Letter</h2>
<form action="<?php echo URLROOT; ?>/teachers/external/<?php echo $data['exam']->id ?>/upload" method="post" enctype="multipart/form-data">
  <label for="dutyLetter">Upload File: </label>
  <input type="file" name="dutyLetter" id="dutyLetter">
  <input type="submit" value="⬆ Upload">
</form>
<?php require APPROOT . '/views/teachers/inc/footer.php'; ?>