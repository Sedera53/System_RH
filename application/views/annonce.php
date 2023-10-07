         
                <div class="content-wrapper">
                    <div class="row">
            <?php for ($i=0; $i <count($tab[1]) ; $i++) { ?>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $tab[1][$i]['services']?></h4>
                    <div class="row">
                        <div class="col-md-6">
                        <address>
                            <p class="fw-bold">Informations</p>
                            <p>
                                Année d'expérience : <?php echo $tab[1][$i]['annee_experience']?> ans
                            </p>
                            <p>
                                Poste recherché : <?php echo $tab[1][$i]['poste_recherche']?>
                            </p>
                        </address>
                        </div>
                        <div class="col-md-6">
                        <address class="text-primary">
                            <p class="fw-bold">
                            Diplome :<?php echo $tab[1][$i]['diplome']?>
                            </p>
                            <p class="mb-2">
                            Nationalité :<?php echo $tab[1][$i]['nationalite']?>
                            </p>
                            <p class="fw-bold">
                            Situation :<?php echo $tab[1][$i]['situation']?>
                            </p>
                        </address>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                    <h4 class="card-title">Salaire :<br>
          <?php echo $tab[1][$i]['salaire_max']?> Ar - <?php echo $tab[1][$i]['salaire_min']?> Ar
                </h4>
                    <p class="card-description">
                        <?php 
                            $tjh = $tab[1][$i]['taux_jour_homme'];
                            $vh = $tab[1][$i]['volume_horaire'];
                            $nb_personnel = $tjh/1;
                        ?>
                        Nombre de personnel recherché : <code><?php echo (int)$nb_personnel;?></code>
                    </p>
                    <p class="lead">
                        <?php echo $tab[1][$i]['experience']?>
                    </p>
                    <a href="<?php echo base_url('ServiceController/loadViewCv')?>"><button class="btn btn-secondary">Postuler</button></a>
                    </div>
                </div>
                </div>
                
                <?php } ?>
                </div>
                </div>
                <!-- -->
            </div>
        </div>
    </div>
</div>