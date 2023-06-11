<main>
<div class="container">
    
    <a href="<?php echo base_url('C_control/loadAjoutClient')?>" class="btn btn-dark mb-3">Ajout Tiers</a>
    <!-- <a href="#" class="btn btn-dark mb-3">Facture</a> -->

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Type</th>
          <th scope="col">Societé</th>
          <th scope="col">Dirigeant</th>
          <th scope="col">Email</th>
          <th scope="col">Adresse</th>
          <th scope="col">Téléphone</th>
          <th scope="col">Intitulé du compte</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $d) { ?>
          <tr>
            <td><?php echo $d['pre']?></td>
            <td><?php echo $d['societe']?></td>
            <td><?php echo $d['nomResponsable']?></td>
            <td><?php echo $d['email']?></td>
            <td><?php echo $d['adresse']?></td>
            <td><?php echo $d['phone']?></td>
            <td><?php echo $d['intitule']?></td>
            <td>
              <a href="#" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <?php
              if($d['pre'] == "Cl") {  ?> 
                <a href="<?php echo base_url('C_control/addFacture')?>?idCompteTier=<?php echo $d['idCompteTier'];?>" class="link-dark"><i class="fa-sharp fa-solid fa-file-invoice-dollar fa-lg"></i></a>
              <?php } else { ?>
                <a href="#" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>
</section>
