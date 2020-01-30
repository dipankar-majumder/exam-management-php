<?php require APPROOT . '/views/admin/inc/header.php'; ?>
<div class="wrapper d-flex">
  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>
  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 my-3">
            <div class="shadow p-3">
              <div class="row p-2 align-items-center">
                <h4 class="mb-2">Exam</h4>
                <div class="ml-auto m-2 row align-items-center">
                  <a href="<?php echo URLROOT; ?>/admin/exams/addExam" class="btn btn-outline-primary shadow mr-3 center">
                    <i class="material-icons md-24 icon">
                      create
                    </i>
                    <span class="text pr-1">Update</span>
                  </a>
                  <a href="<?php echo URLROOT; ?>/admin/exams/addExam" class="btn btn-outline-danger shadow">
                    <i class="material-icons md-24 icon">
                      delete
                    </i>
                    <span class="text pr-1">Delete</span>
                  </a>
                </div>
              </div>
              <div class="row">
                <?php foreach ($data['exam'] as $key => $value) : ?>
                  <div class="col-md-2"><?php echo $key; ?></div>
                  <div class="col-md-10"><?php echo $value; ?></div>
                  <div class="w-100"></div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>