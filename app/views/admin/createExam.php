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
                  <form action="<?php echo URLROOT; ?>/admin/exam/create" method="post">
                    <div class="form-label-group mb-3">
                      <input type="text" name="name" id="name" class="form-control" placeholder="Exam Name" required="" autofocus="">
                      <label for="name">Exam Name</label>
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