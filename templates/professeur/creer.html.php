<?php

use App\Model\Professeur;

  if(isset($_POST['submit'])){?>
      <div class="alert alert-success" role="alert">
    insertion du professeur reussie
    </div>
  <?php } ?>
  <br><br><br>
<section class="gradient-custom">
    <div class="container py-10 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:pink; box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?=$data['titre']?></h3>
                        <form action="" method="POST">
                                <input type="hidden" name="idProf" value="<?=$professeur->id?>">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Nom Complet</label>
                                        <input type="text" id="firstName"  <?= isset($professeur->nom_complet) ? "disabled" : "" ?> name="nomComplet" class="form-control form-control-lg" value ="<?= isset($professeur->nom_complet)?$professeur->nom_complet:""?>"  />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5>Affecter classes</h5>
                                        <select class="select selectpicker" name ="classe_id[]" multiple data-mb-placeholder="Example placeholder" data-live-search="true">
                                        <?php foreach($classes as $value): ?>
                                            <option value="<?=$value->id?>"><?=$value->libelle?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Sexe:</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="maleGender"  <?= isset($professeur->sexe) ? "disabled" : "" ?>  value="masculin" <?= ($professeur->sexe=='masculin') ? "checked":""?>/>
                                        <label class="form-check-label" for="maleGender">Maculin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="femaleGender"  <?= isset($professeur->sexe) ? "disabled" : "" ?> value="feminin" <?= ($professeur->sexe=='feminin') ? "checked":""?> />
                                        <label class="form-check-label" for="femaleGender">Feminin</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Grade</label>
                                        <input type="text" id="firstName" name="grade" class="form-control form-control-lg" value ="<?= isset($professeur->grade)?$professeur->grade:""?>" <?= isset($professeur->nom_complet) ? "disabled" : "" ?> />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5>Affecter modules</h5>
                                    <select class="select selectpicker" name="module_id[]" multiple >
                                        <?php foreach($modules as $value): ?>
                                            <option value="<?=$value->id?>"><?=$value->libelle?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>
                            </div>
                   
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Submit" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
