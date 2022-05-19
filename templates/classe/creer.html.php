<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 50px; border-color:pink; box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px; ">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">AJOUT CLASSE</h3>
           <form action="" method="POST" role="form">
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstName" name="libelle" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">Libelle</label>
                  </div>

                </div>

              </div>


              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="emailAddress" name="filiere" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">Filiere</label>
                  </div>

                </div>
               
              </div>
        
               

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="emailAddress" name="niveau" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">Niveau</label>
                  </div>

                </div>
               
              </div>

            

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<a class="nav-link" href="<?=$Constantes::WEB_ROOT."classes"?>"><button type="button" class="btn btn-success">Voir la liste</button></a>  