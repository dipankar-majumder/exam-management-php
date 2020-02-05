<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <?php flash('register_success'); ?>
      <?php flash('login_failed') ?>
      <form action="<?php echo URLROOT; ?>/teachers/login" method="post" class="form-signin">
        <div class="text-center mb-4">
          <h2>Login</h2>
          <p>Please fill in your credentials to log in</p>
        </div>
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
          <div class="row">
              <div class="col">
          <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
              </div>
                  <div class="col">
          <input type="text" class="form-control" name="captcha_code" size="10" maxlength="6" />
          [REFRESH] <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"><img src="/securimage/images/refresh.png " height="25px" width="25px"></a>
                  </div>
                  </div>
              <div class="row">
          <div class="col">
            <input type="submit" value="Login" class="btn btn-primary btn-block">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/teachers/register" class="btn btn-outline-secondary btn-block">No account? Register</a>
          </div>
        </div>
          <?php
          include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
          $securimage = new Securimage();
          if ($securimage->check($_POST['captcha_code']) == false) {
              // the code was incorrect
              // you should handle the error so that the form processor doesn't continue

              // or you can use the following code if there is no validation or you do not know how
              echo "The security code entered was incorrect.<br /><br />";
              echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
              exit;
          }
          ?>
      </form>

    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>