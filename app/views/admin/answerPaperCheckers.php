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
                <h4 class="mb-2">Answer Paper Checkers</h4>
              </div>
              <!-- <?php print('<pre>' . print_r($data, true) . '</pre>'); ?> -->
              <!-- <div class="row p-3">
                <div class="col-md-3 border rounded-lg m-0 p-2">name</div>
                <div class="col-md-3 border rounded-lg m-0 p-2">email</div>
                <?php foreach ($data['answerPaperCheckers'] as $key => $value) : ?>
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
                    <th scope="col">Answer Paper Submission Slip</th>
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['answerPaperCheckers'] as $key => $value) : ?>
                    <tr>
                      <th scope="row">
                        <?php echo $value->teacher->name; ?>
                      </th>
                      <td>
                        <?php echo $value->teacher->email; ?>
                      </td>
                      <td>
                        <a href="<?php echo URLROOT . '/uploads/' . $value->answerPaperSubmissionSlip; ?>">
                          <?php echo $value->answerPaperSubmissionSlip; ?>
                        </a>
                      </td>
                      <td>
                        <!-- <a href="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/answerPaperChecker/<?php echo $key ?>/approve">
                          <div class="btn btn-primary">Aprove</div>
                        </a> -->
                        <form action="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/answerPaperChecker/<?php echo $key ?>/approve" method="post">
                          <input type="submit" class="btn btn-primary" value="<?php echo isset($value->approved) && $value->approved ? 'Approved' : 'Approve'; ?>" <?php echo isset($value->approved) && $value->approved ? 'disabled' : ''; ?> />
                        </form>
                      </td>
                      <td>
                        <form action="<?php echo URLROOT ?>/admin/exam/<?php echo $data['exam']->id ?>/answerPaperChecker/<?php echo $key ?>/approve" method="post">
                          <input type="submit" class="btn btn-primary" value="Pay" <?php echo isset($value->approved) && $value->approved ? '' : 'disabled'; ?> />
                        </form>
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