<?php require APPROOT . '/views/admin/inc/header.php'; ?>
<div class="wrapper d-flex">
  <?php require APPROOT . '/views/admin/inc/sidebar.php'; ?>
  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 my-3">
            <div class="shadow px-3 py-3">
              <h4 class="mb-2">New Clients</h4>
              <div class="progress" style="height: 16px;">
                <div class="progress-bar bg-warning text-mattBlackDark" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  25
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="shadow px-3 py-3">
              <h4 class="mb-2">New Projects</h4>
              <div class="progress" style="height: 16px;">
                <div class="progress-bar bg-info text-mattBlackDark" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  50
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-3">
            <div class="shadow p-3">
              <h4 class="mb-2">Completed</h4>
              <div class="progress" style="height: 16px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  80
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="shadow my-2 p-3">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Ratione libero totam rerum eos nam ab perspiciatis voluptatum
              in. Quidem natus autem quae. Velit accusamus sit, perspiciatis
              sunt earum tempora veniam.
            </div>
          </div>
          <div class="col-md-6">
            <div class="shadow my-2 p-3">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Ratione libero totam rerum eos nam ab perspiciatis voluptatum
              in. Quidem natus autem quae. Velit accusamus sit, perspiciatis
              sunt earum tempora veniam.
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php require APPROOT . '/views/admin/inc/footer.php'; ?>