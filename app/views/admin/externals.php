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
                <h4 class="mb-2">Externals</h4>
              </div>
              <?php print('<pre>' . print_r($data, true) . '</pre>'); ?>
              <div class="row p-3">
                <div class="col-md-3 border rounded-lg m-0 p-2">Name</div>
                <div class="col-md-3 border rounded-lg m-0 p-2">Email</div>
                <div class="col-md-3 border rounded-lg m-0 p-2">College</div>
                <div class="col-md-3 border rounded-lg m-0 p-2">Action</div>
                <?php foreach ($data['externals'] as $key => $value) : ?>
                  <div class="w-100"></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->teacher->name; ?></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->teacher->email; ?></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->college; ?></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><a href="<?php echo URLROOT; ?>/admin/exam/<?php echo $data['exam']->id; ?>/external/<?php echo $key; ?>/allocateCollege">
                      <div class="btn btn-primary">Allocate College</div>
                    </a></div>
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