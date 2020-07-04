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
              <!-- <div class="row p-3">
                <div class="col-md-3 border rounded-lg m-0 p-2">name</div>
                <div class="col-md-3 border rounded-lg m-0 p-2">email</div>
                <?php foreach ($data['questionPaperSetters'] as $key => $value) : ?>
                  <div class="w-100"></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->teacher->name; ?></div>
                  <div class="col-md-3 border rounded-lg m-0 p-2"><?php echo $value->teacher->email; ?></div>
                <?php endforeach; ?>
              </div> -->
              <table class="table table-responsive table-hover table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Question Paper</th>
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['questionPaperSetters'] as $key => $value) : ?>
                    <tr>
                      <th scope="row">
                        <?php echo $value->teacher->name; ?>
                      </th>
                      <td>
                        <?php echo $value->teacher->email; ?>
                      </td>
                      <td>
                        <a href="<?php echo URLROOT . '/uploads/' . $value->questionPaper; ?>">
                          <?php echo $value->questionPaper; ?>
                        </a>
                      </td>
                      <td>
                        <!-- <a href="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/questionPaperSetter/<?php echo $key ?>/approve">
                          <div class="btn btn-primary">Aprove</div>
                        </a> -->
                        <form action="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/questionPaperSetter/<?php echo $key ?>/approve" method="post">
                          <input type="submit" class="btn btn-primary" value="<?php echo isset($value->approved) && $value->approved ? 'Approved' : 'Approve'; ?>" <?php echo isset($value->approved) && $value->approved ? 'disabled' : ''; ?> />
                        </form>
                      </td>
                      <!-- <td>
                        <form action="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/questionPaperSetter/<?php echo $key ?>/pay" method="post">
                          <input type="submit" class="btn btn-primary" value="<?php echo isset($value->paymentStatus) && $value->paymentStatus == 'done' ? 'Paid' : 'Pay' ?>" <?php echo isset($value->approved) && $value->approved ? '' : 'disabled'; ?> />
                        </form>
                      </td> -->
                      <td>
                        <a href="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/questionPaperSetter/<?php echo $key ?>/pay">
                          <button class="btn btn-primary" <?php echo isset($value->approved) && $value->approved ? '' : 'disabled'; ?> <?php echo isset($value->paymentStatus) && $value->paymentStatus == 'done' ? 'disabled' : ''; ?>>
                            <?php echo isset($value->paymentStatus) && $value->paymentStatus == 'done' ? 'Paid' : 'Pay' ?>
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>