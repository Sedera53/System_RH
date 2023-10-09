                <?php foreach ($data as $d) { ?>
                    
                    <a href="<?php echo base_url('ServiceController/loadSelectionCv')?>" style="text-decoration:none;">
                    <div class="col-md-12 grid-margin stretch-card" >
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php $d['services']?></h4>
                                <p class="card-description">
                                    <?php echo $d['nombesoin']?>
                                </p>
                                <p>
                                    <?php echo $d['experience']?>
                                </p>
                            </div>
                        </div>
                    </div>
                    </a>

                <?php } ?>
            </div>
        </div>
    </div>
</div>