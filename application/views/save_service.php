    <link rel="stylesheet" href="<?php echo base_url()?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>css/vertical-layout-light/style.css">
<br>
<br>
<center>
    
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Famenoana besoin </h4>
                  <form class="form-sample" method="post" action="<?php echo base_url('ServiceController/insertBesoin')?>">
                  <input type="hidden" name="idservice" value="<?php echo $idservice;?>">
                    <input type="hidden" name="nombesoin" value="<?php echo $nom;?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Taux jour homme</label>
                          <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" style="width:250px; margin-right:260px;" name="tjh"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Volume horaire</label>
                          <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" style="width:250px; margin-right:260px;" name="vh"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Diplome</label>
                                <div class="col-sm-9">
                                <select class="form-control" style="width:250px; margin-right:260px;" name="iddiplome">
                                  <?php foreach ($diplomes as $diplome): ?>
                                    <option value="<?php echo $diplome->iddiplome; ?>"><?php echo $diplome->diplome; ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Coefficient diplome</label>
                            <div class="col-sm-9">
                              <input type="number" min="0" class="form-control" style="width:150px; margin-right:260px;" name="coeffdipl"/>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Poste recherche</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" style="width:250px; margin-right:260px;" name="poste"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Matrimoniale</label>
                          <div class="col-sm-9">
                              <select class="form-control" style="width:250px; margin-right:260px;" name="matr">
                              <?php foreach ($matrimoniale as $matrimoniales): ?>
                                <option value="<?php echo $matrimoniales->idMatrimoniale; ?>"><?php echo $matrimoniales->situation; ?></option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Expérience</label>
                          <div class="col-sm-9">
                            <!--<input type="text" class="form-control" style="width:250px; margin-right:260px;"/>-->
                            <textarea id="" style="width:250px; margin-right:260px;" name="exp" ></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Année d'experience requis</label>
                          <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" style="width:150px; margin-right:260px;" name="anneeExp"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nationalité</label>
                            <div class="col-sm-9">
                            <select class="form-control" style="width:250px; margin-right:260px;" name="idnationalite">
                              <?php foreach ($nationalites as $nationalite): ?>
                                    <option value="<?php echo $nationalite->idnationalite; ?>"><?php echo $nationalite->nationalite; ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Coefficient nationalite</label>
                            <div class="col-sm-9">
                              <input type="number" min="0" class="form-control" style="width:150px; margin-right:260px;" name="coeffnation"/>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Salaire maximum</label>
                          <div class="col-sm-9">
                            <input type="text" min="1" class="form-control" style="width:250px; margin-right:260px;" name="salmax"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Salaire minimum</label>
                          <div class="col-sm-9">
                            <input type="text" min="1" class="form-control" style="width:250px; margin-right:260px;" name="salmin"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-block w-50 bg-primary" style=" font-size:20px;">Valider</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</center>

