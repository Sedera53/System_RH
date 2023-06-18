<main>
<a href="<?php echo base_url('C_control/loadAjoutClient')?>" class="btn btn-dark mb-3">Ajout Tiers</a>
<table class="table">
  <thead>
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
            <th scope="row"><?php echo $d['pre']?></th>
            <td><?php echo $d['societe']?></td>
            <td><?php echo $d['nomResponsable']?></td>
            <td><?php echo $d['email']?></td>
            <td><?php echo $d['adresse']?></td>
            <td><?php echo $d['phone']?></td>
            <td><?php echo $d['intitule']?></td>
            <td><a href="<?php echo base_url('C_control/loadFormFacture')?>?idCompteTier=<?php echo $d['idCompteTier']?>" class="link-dark"><i class="fa-solid fa-file-invoice-dollar fa-lg"></i></a>
            <a href="#" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a></td>
          </tr>
        <?php } ?>
  </tbody>
</table>
</main>
</section>
