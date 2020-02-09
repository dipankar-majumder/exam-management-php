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
                <h4 class="mb-4">Create New Exam</h4>
                <div class="col-md-8 col-lg-6 col-xl-4 mx-auto my-2">
                  <form action="<?php echo URLROOT; ?>/admin/exam/create" method="post">
                    <div class="form-label-group mb-3">
                      <input type="text" name="name" id="name" class="form-control" placeholder="Exam Name" required="" autofocus="">
                      <label for="name">Exam Name</label>
                    </div>
                    <div class="form-group pr-3 mb-3 row">
                      <label class="col" for="type">Exam Type</label>
                      <!-- <input type="text" name="name" id="name" class="form-control" placeholder="Exam Name" required="" autofocus=""> -->
                      <select name="type" class="col" id="type">
                        <option value="" selected disabled>Select an option</option>
                        <option>Theory</option>
                        <option>Practical</option>
                      </select>
                    </div>
                    <div class="form-group pr-3 mb-3 row">
                      <label class="col" for="semester">Semester</label>
                      <select name="semester" class="col" id="semester">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                        <option value="4">4th Semester</option>
                        <option value="5">5th Semester</option>
                        <option value="6">6th Semester</option>
                      </select>
                    </div>
                    <div class="form-label-group mb-3">
                      <input type="date" name="date" id="date" class="form-control" placeholder="Date of Examination" required autofocus>
                      <label for="date">Date of Examination</label>
                    </div>
                    <div class="form-label-group mb-3">
                      <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                      <label for="subject">Subject</label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">
                      <i class="material-icons">
                        add
                      </i>
                      <span class="text">Create Exam</span>
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