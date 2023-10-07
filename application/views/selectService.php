                <center>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Choix service</h4>
                            <form class="forms-sample" action="<?php echo base_url('ServiceController/loadBesoinPage')?>" method="get">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service</label>
                                <select class="form-control" style="width:250px;" name="idService">
                                <?php for ($i=0; $i <count($tab[1]) ; $i++) { ?>
                                    <option value="<?php echo $tab[1][$i]['idservice']?>"><?php echo $tab[1][$i]['services']?></option>
                                <?php } ?>
                                  </select>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Service name" style="width:250px;"> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom du besoin</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="..." style="width:250px;" name="nom">
                            </div>
                            <input type="submit" class="btn btn-primary me-2" value="Valider">
                            </form>
                        </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>