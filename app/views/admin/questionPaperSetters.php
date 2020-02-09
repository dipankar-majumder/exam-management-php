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
                <h4 class="mb-2">Question Paper Setters</h4>
              </div>
              <!-- <?php print('<pre>' . print_r($data, true) . '</pre>'); ?> -->
              <div class="row p-3">
                <div class="col-md-3 border rounded-lg m-0 p-2">name</div>
                <div class="col-md-3 border rounded-lg m-0 p-2">email</div>
                <?php foreach ($data['questionPaperSetters'] as $key => $value) : ?>
                  <div class="w-100"></div>
                  <!-- <div class="col-md-4 border rounded-lg m-0 p-2"><?php echo $key; ?></div> -->
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->name; ?></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->email; ?></div>
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