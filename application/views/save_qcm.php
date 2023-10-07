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
                  <h4 class="card-title">Famenoana qcm</h4>
                  <form class="form-sample" action="<?php echo base_url('ServiceController/insertQCM')?>" >
                    <input type="hidden" name="idservice" value="<?php echo $idservice ?>">
                  <?php for ($i=1; $i < 6; $i++) { ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Question nº<?php echo $i; ?></label>
                            <div class="col-sm-9">
                                <!--<input type="text" class="form-control" style="width:250px; margin-right:260px;"/>-->
                                <textarea name="q<?php echo $i; ?>" id="" style="width:250px; margin-right:260px;"></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Coefficent question nº<?php echo $i; ?></label>
                            <div class="col-sm-9">
                                <input name="c<?php echo $i; ?>" type="text" class="form-control" style="width:150px; margin-right:260px;"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Valiny</label>
                            <div class="col-sm-9">
                                <!--<input type="text" class="form-control" style="width:250px; margin-right:260px;"/>-->
                                <textarea name="v<?php echo $i; ?>" id="" style="width:250px; margin-right:260px;"></textarea>
                            </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                    
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

