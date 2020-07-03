<?php require APPROOT . '/views/admin/inc/header.php'; ?>
<?php
function getUrl() {
  $url = rtrim($_GET['url'], '/');
  $url = filter_var($url, FILTER_SANITIZE_URL);
  $url = explode('/', $url);
  return $url;
}
?>
<div class="wrapper d-flex">
  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>
  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 my-3">
            <div class="shadow p-3">
              <div class="row p-2 align-items-center">
                <h4 class="mb-2">Enter Payment Details</h4>
              </div>
              <?php print('<pre>' . print_r($data, true) . '</pre>'); ?>
              <?php // print_r(getUrl()[4]); ?>
              <?php // print_r($data['exam']->duty->question_paper_setters[0]); ?>
              <div class="row p-2 align-items-center">
                <?php if (strpos($_GET['url'], 'questionPaperSetter')) : ?>
                <div class="row row-cols-2">
                  <?php foreach ($data['exam']->duty->question_paper_setters[getUrl()[4]] as $key => $value ) : ?>
                    <?php if ($key == 'bankDetails'): ?>
                      <?php foreach($value as $key1 => $value1) : ?>
                        <div class="col"><?php echo $key1; ?></div>
                        <div class="col"><?php echo $value1; ?></div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <form action="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/questionPaperSetter/<?php echo getUrl()[4] ?>/pay" method="post">
                  <input type="submit" value="Pay" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>