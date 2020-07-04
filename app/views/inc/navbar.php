<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">
      <img src="<?php echo URLROOT; ?>/images/UE%20Logo-01_1.png" width="35" height="35" class="d-inline-block align-top" alt="">
      <?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/teachers">
            <div class="btn btn-sm btn-primary">
              Teachers Panel
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/admin">
            <div class="btn btn-sm btn-primary">
              Admin Panel
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>