
<?php 
  if(isset($_POST['submit'])){?>
      <div class="alert alert-success" role="alert">
    Votre demande a bien été prise en compte
    </div>
  <?php } ?>
  <marquee><h3>Vous pouvez formuler votre demande d'annulation ou de suspension de votre inscription</h3></marquee>
<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 50px; border-color:pink; box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px; ">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">FAIRE UNE DEMANDE</h3>
           <form action="" method="POST" role="form">
              <div class="row">
                <div class="form-group">
                        <label for="exampleFormControlTextarea1">Motif de la demande</label></label>
                        <textarea name="libelle" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

              </div>

              <div class="mt-4 pt-2">
                <input name="submit" class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>