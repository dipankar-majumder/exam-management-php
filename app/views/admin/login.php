<?php require APPROOT . '/views/inc/header.php'; ?>
<form class="form-signin" action="<?php echo URLROOT; ?>/admin/login" method="post">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
    <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
  </div>

  <div class="form-label-group">
    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="email">Email address</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
    <label for="password">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" disabled>Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>