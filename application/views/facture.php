
    <link href="<?php echo base_url(); ?>assets/css/stylefacture.css" rel="stylesheet">
    <section >
    <div id="logo">
            <p><img src="<?php echo base_url(); ?>assets/img/logo.png"> </p>
        </div>
        <hr>
        <div id="detailsociete">
            <p>DIMPEX</p>
            <p>Antananarivo,Akorondrano lot 845 </p>
            <p>Antananarivo 101</p>
            <p>0343256894</p>
            <p>Madagascar</p>
            <p>dimpex@gmail.com</p>
        </div>
        <div id="detailfacture">
        <?php for ($i=0; $i <count($tab[0]) ; $i++) { ?>
                <?php date_default_timezone_set('Europe/Paris') ?>
            <p>facture N°: <b><?php echo "dpx/".date("m",strtotime($tab[0][$i]['datecommande']))."/".date("Y",strtotime($tab[0][$i]['datecommande']))."/".str_pad(($tab[1][$i]['idcommande']), 3, '0', STR_PAD_LEFT);?></b></p>
            <p><b>Antananarivo, le <?php echo $tab[0][$i]['datecommande'];?></b></p>
        <?php } ?>
        </div>
        <div id="detailclient">
        <?php for ($i=0; $i <count($tab[0]) ; $i++) { ?>
            <p>Société :<?php echo $tab[0][$i]['intitule'];?></p>
            <p>Dirigeant :<?php echo $tab[0][$i]['nomResponsable'];?></p>
            <p>Email :<?php echo $tab[0][$i]['email'];?></p>
            <p>Adresse :<?php echo $tab[0][$i]['adresse'];?></p>
            <p>Numero :<?php echo $tab[0][$i]['phone'];?></p>
        <?php } ?>
        </div>
        <div id="objet">
            <h4>objet: Vente immobilier</h4>
        </div>
        <br>
        <table>
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantite</th>
            <th>P.U</th>
            <th>montant</th>
        </tr>
        </thead>

        <tbody>
        <?php for ($i=0; $i <count($tab[1]) ; $i++) { ?>
        <tr>
            <td><?php echo $tab[1][$i]['designation'];?></td>
            <td><?php echo $tab[1][$i]['quantite'];?></td>
            <td><?php echo $tab[1][$i]['prixUnitaire'];?> Ar</td>
            <td><?php echo ($tab[1][$i]['quantite']*$tab[1][$i]['prixUnitaire']);?> Ar</td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="3" class="total">Total HT:</td>
            <?php 
            $total = 0;
            for ($i=0; $i <count($tab[1]) ; $i++) { 
                $total += ($tab[1][$i]['quantite']*$tab[1][$i]['prixUnitaire']);
                ?>
            <?php } ?>
            <td class="total"><?php echo $total;?> Ar</td>
        </tr>
        <tr>
            <td colspan="3" class="total">TVA (20%):</td>
            <?php 
            $total = 0;
            $tva = 0;
            for ($i=0; $i <count($tab[1]) ; $i++) { 
                $total += ($tab[1][$i]['quantite']*$tab[1][$i]['prixUnitaire']);
                $ttc = $tab[1][$i]['ttc'];
                $tva = $ttc-$total;
                ?>
            <?php } ?>
            <td class="total"><?php echo $tva;?> Ar</td>
        </tr>
        <tr>
            <td colspan="3" class="total">Total TTC:</td>
            <?php for ($i=0; $i <count($tab[0]) ; $i++) { ?>
            <td class="total"><?php echo $tab[0][$i]['ttc'];?> Ar</td>
            <?php } ?>
        </tr>
        </tbody>
    </table>
    <div>
        <p>arrete a la somme de: </p>
    </div>
    <hr>
    <div id="sonia1">
        <p>Le client</p>
    </div>
    <div id="sonia2">
        <p>Le Societe</p>
    </div>
</section>