<?php if ($test ==1): ?>
  <div class="alert alert-danger" role="alert">
    LOGIN OU MOT DE PASSE INCORRECT !!
  </div>
<?php endif?>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">WELCOME TO PINKIE ACADEMY</h4>
                </div>

                <form method="post" action ="<?=$Constantes::WEB_ROOT."login"?>" > 
                  <p>SVP connectez-vous sur votre compte!!</p>

                  <div class="form-outline mb-4">
                    <input type="email"  name="login" id="validationServer01" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="validationServer01">Login</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password"  placeholder="Password" name="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type ="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">se connecter</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <img src="<?=$Constantes::WEB_ROOT.'images/loginbg.png'?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>