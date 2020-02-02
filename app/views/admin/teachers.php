<?php require APPROOT . '/views/admin/inc/header.php'; ?>
<div class="wrapper d-flex">
  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>
  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 my-3">
            <div class="shadow p-3">
              <h4 class="mb-2">Teachers</h4>
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['teachers'] as $key => $teacher) : ?>
                      <tr>
                        <th scope="row">
                          <?php echo $teacher->id; ?>
                        </th>
                        <td>
                          <?php echo $teacher->name; ?>
                        </td>
                        <td>
                          <?php echo $teacher->email; ?>
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