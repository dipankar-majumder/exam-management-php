<?php require APPROOT . '/views/admin/inc/header.php'; ?>
<div class="wrapper d-flex">
  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>
  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 my-3">
            <div class="shadow p-3">
              <div class="p-2">
                <h4 class="mb-2">Add Exam</h4>
                <div class="col-md-8 col-lg-6 col-xl-4 mx-auto my-2">
                  <form action="<?php echo URLROOT; ?>/admin/exam/update/<?php echo $data['exam']->id; ?>" method="post" autocomplete="off">
                    <div class="form-label-group mb-3">
                      <input type="text" name="name" id="name" class="form-control" value="<?php echo $data['exam']->name; ?>" placeholder="Exam Name" required="" autofocus="">
                      <label for="name">Exam Name</label>
                    </div>
                    <div class="form-group pr-3 mb-3 row">
                      <label class="col" for="semester">Semester</label>
                      <select name="semester" class="col" id="semester">
                        <option value="" <?php echo $data['exam']->semester == null ? 'selected' : '' ?> disabled>Select an option</option>
                        <option value="1" <?php echo $data['exam']->semester == 1 ? 'selected' : '' ?>>1st Semester</option>
                        <option value="2" <?php echo $data['exam']->semester == 2 ? 'selected' : '' ?>>2nd Semester</option>
                        <option value="3" <?php echo $data['exam']->semester == 3 ? 'selected' : '' ?>>3rd Semester</option>
                        <option value="4" <?php echo $data['exam']->semester == 4 ? 'selected' : '' ?>>4th Semester</option>
                        <option value="5" <?php echo $data['exam']->semester == 5 ? 'selected' : '' ?>>5th Semester</option>
                        <option value="6" <?php echo $data['exam']->semester == 6 ? 'selected' : '' ?>>6th Semester</option>
                      </select>
                    </div>
                    <div class="form-label-group mb-3">
                      <input type="date" name="date" id="date" class="form-control" placeholder="Date of Examination" value="<?php echo $data['exam']->date; ?>" required autofocus>
                      <label for="date">Date of Examination</label>
                    </div>
                    <div class="form-label-group mb-3">
                      <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="<?php echo $data['exam']->subject; ?>" required>
                      <label for="subject">Subject</label>
                    </div>
                    <div class="form-group pr-3 mb-3 row">
                      <label class="col" for="semester">Semester</label>
                      <select name="semester" class="col" id="semester">
                        <option value="" <?php echo $data['exam']->semester == null ? 'selected' : '' ?> disabled>Select an option</option>
                        <option <?php echo $data['exam']->semester == 'Theory' ? 'selected' : '' ?>>Theory</option>
                        <option <?php echo $data['exam']->semester == 'Practical' ? 'selected' : '' ?>>Practical</option>
                      </select>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">
                      <i class="material-icons">
                        add
                      </i>
                      <span class="text">Update Exam</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>