<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?= base_url('assets/login/auth.css')?>" />
    <title>Sign in & Sign up Form</title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?= base_url('auth')?>" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <?= $this->session->flashdata('message'); ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" /> 
          </form>

          
          <form action="<?= base_url('auth/register')?>" method="POST" class="sign-up-form">
            <h2 class="title">Register</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Full Name" name="name">
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password1" placeholder="Password" />
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password2" placeholder="Confirmation Password" />
            </div>
            
            <div class="form-check">
              <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="3" checked>
              <label class="form-check-label" for="exampleRadios1">
                Daftar Sebagai Pembeli
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="2">
              <label class="form-check-label" for="exampleRadios2">
              Daftar Sebagai Penjual
              </label>
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form> 
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register
            </button>
          </div>
          <img src="<?= base_url('assets/login/img/log.svg')?>" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Punya Akun ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="<?= base_url('assets/login/img/register.svg')?>" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="<?= base_url('assets/login/auth.js')?>"></script>
  </body>
</html>
