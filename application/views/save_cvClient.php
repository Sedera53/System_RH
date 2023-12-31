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
                  <h4 class="card-title">Insertion CV</h4>
                  <form class="form-sample" method="post" action="<?php echo base_url('ServiceController/addCv')?>">
                  <input type="hidden" name="idbesoin" value="<?php echo $idbesoin?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nom</label>
                          <div class="col-sm-9">
                            <input type="text"  class="form-control" style="width:250px; margin-right:260px;" name="nom"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Prenom</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" style="width:250px; margin-right:260px;" name="prenom"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Numéro de téléphone</label>
                            <div class="col-sm-9">
                              <input type="phone" min="0" class="form-control" style="width:150px; margin-right:260px;" name="phone"/>
                            </div>
                          </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date de naissance</label>
                            <div class="col-sm-9">
                              <input type="date"  class="form-control" style="width:150px; margin-right:260px;" name="datenaiss"/>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Diplome</label>
                                <div class="col-sm-9">
                                <select class="form-control" style="width:250px; margin-right:260px;" name="iddiplome" >
                                 <?php foreach ($diplomes as $diplome): ?> 
                                    <option value="<?php echo $diplome->iddiplome; ?>"><?php echo $diplome->diplome; ?></option> 
                                  <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Expérience</label>
                                  <div class="col-sm-9">
                                    <!--<input type="text" class="form-control" style="width:250px; margin-right:260px;"/>-->
                                      <textarea id="" style="width:250px; margin-right:260px;" name="exp" ></textarea>
                                  </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Situation matrimoniale</label>
                                <div class="col-sm-9">
                                <select class="form-control" style="width:250px; margin-right:260px;" name="idmatr">
                                 <?php foreach ($matrimoniales as $matrimoniale): ?> 
                                     <option value="<?php echo $matrimoniale->idMatrimoniale; ?>"><?php echo $matrimoniale->situation; ?></option> 
                                 <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Année d'experience</label>
                                <div class="col-sm-9">
                                <div class="col-sm-9">
                                  <input type="number"  class="form-control" style="width:150px; margin-right:260px;" name="anneeexp"/>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nationalité </label>
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
                                <label class="col-sm-3 col-form-label">Sex</label>
                                <div class="col-sm-9">
                                <select class="form-control" style="width:250px; margin-right:260px;" name="idsex">
                                  <?php foreach ($genres as $genre): ?> 
                                     <option value="<?php echo $genre->idgenre; ?>"><?php echo $genre->genre; ?></option> 
                                 <?php endforeach; ?>
                                </select>
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

