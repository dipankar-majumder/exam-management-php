<?php require APPROOT . '/views/teachers/inc/header.php'; ?>
<h1>Enter Payment Details</h1>
<?php print('<pre>' . print_r($_SESSION, true) . '</pre>'); ?>
<form action="<?php echo URLROOT ?>/teachers/questionPaper/<?php echo $data['exam']->id; ?>/fillPaymentDetails" method="post">
  <label for="name">Name: </label>
  <input type="text" name="name" id="name" value="<?php echo $_SESSION['teacher_name']; ?>">
  <br>
  <label for="IFSCCode">IFSC Code: </label>
  <input type="text" name="IFSCCode" id="IFSCCode">
  <br>
  <label for="accountNumber">Account Number: </label>
  <input type="number" name="accountNumber" id="accountNumber">
  <br>
  <input type="submit" value="Request for Payment">
</form>
<?php require APPROOT . '/views/teachers/inc/footer.php'; ?>