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
              <!-- <?php print('<pre>' . print_r($data, true) . '</pre>'); ?> -->
              <!-- <div class="row p-3">
                <div class="col-md-2 border rounded-lg m-0 p-2">Name</div>
                <div class="col-md-2 border rounded-lg m-0 p-2">Email</div>
                <div class="col-md-2 border rounded-lg m-0 p-2">College</div>
                <div class="col-md-2 border rounded-lg m-0 p-2">Duty Letter</div>
                <div class="col-md-2 border rounded-lg m-0 p-2">Action</div>
                <?php foreach ($data['externals'] as $key => $value) : ?>
                  <div class="w-100"></div>
                  <div class="col-md-2 border rounded-lg m-0 p-2"><?php echo $value->teacher->name; ?></div>
                  <div class="col-md-2 border rounded-lg m-0 p-2"><?php echo $value->teacher->email; ?></div>
                  <div class="col-md-2 border rounded-lg m-0 p-2"><?php echo $value->college; ?></div>
                  <div class="col-md-2 border rounded-lg m-0 p-2">
                    <?php if (isset($value->upload)) : ?>
                      <a href="<?php echo URLROOT; ?>/uploads/<?php echo $value->upload; ?>"><?php echo $value->upload; ?></a>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-2 border rounded-lg m-0 p-2">
                    <a href="<?php echo URLROOT; ?>/admin/exam/<?php echo $data['exam']->id; ?>/external/<?php echo $key; ?>/allocateCollege">
                      <div class="btn btn-primary">Allocate College</div>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div> -->
              <table class="table table-responsive table-hover table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">College</th>
                    <th scope="col">Duty Letter</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['externals'] as $key => $value) : ?>
                    <tr>
                      <th scope="row">
                        <?php echo $value->teacher->name; ?>
                      </th>
                      <td>
                        <?php echo $value->teacher->email; ?>
                      </td>
                      <td>
                        <?php echo $value->college; ?>
                      </td>
                      <td>
                        <?php if (isset($value->upload)) : ?>
                          <a href="<?php echo URLROOT; ?>/uploads/<?php echo $value->upload; ?>"><?php echo $value->upload; ?></a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?php echo URLROOT; ?>/admin/exam/<?php echo $data['exam']->id; ?>/external/<?php echo $key; ?>/allocateCollege">
                          <div class="btn btn-primary">Allocate College</div>
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