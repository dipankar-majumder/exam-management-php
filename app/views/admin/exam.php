<?php require APPROOT . '/views/admin/inc/header.php'; ?>
<div class="wrapper d-flex">
  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>
  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 my-3">
            <div class="shadow p-3">
              <?php flash('exam_action_status') ?>
              <div class="row p-2 align-items-center">
                <h4 class="mb-2">Exam</h4>
                <div class="ml-auto m-2 row align-items-center">
                  <a href="<?php echo URLROOT; ?>/admin/exam/update/<?php echo $data['exam']->id; ?>" class="btn btn-outline-primary shadow mr-3 center">
                    <i class="material-icons md-24 icon">
                      create
                    </i>
                    <span class="text pr-1">Update</span>
                  </a>
                  <form action="<?php echo URLROOT; ?>/admin/exam/delete/<?php echo $data['exam']->id; ?>" method="POST">
                    <button type="submit" class="btn btn-outline-danger shadow">
                      <i class="material-icons md-24 icon">
                        delete
                      </i>
                      <span class="text pr-1">Delete</span>
                    </button>
                  </form>
                </div>
              </div>
              <!-- <?php print('<pre>' . print_r($data['exam'], true) . '</pre>'); ?> -->
              <div class="row p-3">
                <?php foreach ($data['exam'] as $key => $value) : ?>
                  <?php if ($key != 'id') : ?>
                    <div class="w-100"></div>
                  <?php endif; ?>
                  <?php if ($key == 'duty') : ?>
                    <?php continue; ?>
                  <?php endif; ?>
                  <div class="col-md-4 border rounded-lg m-0 p-2"><?php echo $key; ?></div>
                  <div class="col-md-8 border rounded-lg m-0 p-2">
                    <!-- <?php if ($key == 'duty') : ?>
                      <pre><?php print(json_encode($value, JSON_PRETTY_PRINT)); ?></pre>
                      <?php continue; ?>
                    <?php endif; ?> -->
                    <?php echo $value; ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="row p-2 justify-content-center align-items-center">
                <h4 class="mb-2">Exam Duties</h4>
              </div>
              <div class="row justify-content-around justify-content-end p-3">
                <a href="<?php echo URLROOT; ?>/admin/exam/<?php echo $data['exam']->id; ?>/questionPaperSetters" class="col-md-2 shadow btn btn-large btn-lg btn-outline-primary">
                  Question Paper Setters
                </a>
                <?php if ($data['exam']->type == 'Theory') : ?>
                  <a href="<?php echo URLROOT; ?>/admin/exam/<?php echo $data['exam']->id; ?>/answerPaperSetters" class="col-md-2 shadow btn btn-large btn-lg btn-outline-primary">
                    Answer Paper Setters
                  </a>
                <?php endif; ?>
                <?php if ($data['exam']->type == 'Practical') : ?>
                  <a href="<?php echo URLROOT; ?>/admin/exam/<?php echo $data['exam']->id; ?>/externals" class="col-md-2 shadow btn btn-large btn-lg btn-outline-primary">
                    External Teachers
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>