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
                <h4 class="mb-2">Exams</h4>
                <div class="ml-auto m-2 row align-items-center">
                  <a href="<?php echo URLROOT; ?>/admin/exam/create" class="btn btn-outline-primary shadow">
                    <i class="material-icons md-24">
                      add
                    </i>
                    <span class="text">Add Exam</span>
                  </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Exam Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['exams'] as $key => $exam) : ?>
                      <tr data-href="<?php echo URLROOT; ?>/admin/exams/<?php echo $exam->id; ?>">
                        <th scope="row"><?php echo $exam->id; ?></td>
                        <td><?php echo $exam->name; ?></td>
                      </tr>
                    <?php endforeach; ?>
                    <?php if (!count($data['exams'])) : ?>
                      <tr>
                        <td colspan="2"><?php echo 'Empty'; ?></td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>