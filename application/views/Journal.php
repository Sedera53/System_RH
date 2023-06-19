<main>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Jour</th>
      <th scope="col">Numero piece</th>
      <th scope="col">N·compte</th>
      <th scope="col">Libellé</th>
      <th scope="col">Devise</th>
      <th scope="col">Débit</th>
      <th scope="col">Crédit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $d) {?>
    <tr>
      <th scope="row"><?php echo $d['dateComm']?></th>
      <td>VNT:<?php echo $d['idComm']?></td>
      <td><?php echo $d['compte']?></td>
      <td><?php echo $d['libelle']?></td>
      <td>Ariary</td>
      <td><?php echo $d['debit']?></td>
      <td><?php echo $d['credit']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</main>
</section>