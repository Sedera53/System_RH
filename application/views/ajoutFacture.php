<main>
<link href='<?php echo base_url()?>/assets/css/mef.css' rel='stylesheet' type='text/css' />
    <div style="width:100%;display:block;text-align:center;">
    </div>
    
    <div class="div_saut_ligne" style="height:30px;">
    </div>						
    
    <div style="float:left;width:10%;height:40px;"></div>
    <div style="float:left;width:80%;height:auto;text-align:center;">
    <div class="titre_h1">
    <h1>Facturation Clients</h1>
    </div>
    </div>
    <div style="float:left;width:10%;height:40px;"></div>
    
    <div class="div_saut_ligne" style="height:30px;">
    </div>
    
    <div style="float:left;width:10%;height:350px;"></div>
    <div style="float:left;width:80%;height:350px;text-align:center;">
    <form id="formulaire" name="formulaire" method="post" action="#">
        <div class="titre_h1" style="height:370px;">
            <div style="width:10%;height:50px;float:left;"></div>
            <div style="width:35%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
                <u>Informations du client</u><br />
            </div>
            <div style="width:10%;height:50px;float:left;"></div>
            <div style="width:35%;height:50px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                <a href="#"><input type="button" id="creer_client" name="creer_client" value="Voir produit" /></a>
            </div>
            <div style="width:10%;height:50px;float:left;"></div>

            <div style="width:10%;height:75px;float:left;"></div>
            <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Réf. Client :<br />
                <?php for ($i=0;$i<count($tab[1]);$i++) { ?>
                <input type="text" id="ref_client" name="ref_client" value="<?php echo "Clt". " ".$tab[1][$i]['idCompteTier'];?>"/>
                <?php } ?>
            </div>
            <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Sociéte :<br />
                <?php for ($i=0;$i<count($tab[1]);$i++) { ?>
                <input type="text" id="civilite" name="societe" value="<?php echo $tab[1][$i]['societe'];?>"/>
                <?php } ?>
            </div>
            
            <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Nom du client :<br />
                <?php for ($i=0;$i<count($tab[1]);$i++) { ?>
                <input type="text" id="nom_client" name="responsable" value="<?php echo $tab[1][$i]['nomResponsable'];?>"/>
                <?php } ?>
            </div>
            <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Adresse :<br />
                <?php for ($i=0;$i<count($tab[1]);$i++) { ?>
                <input type="text" id="prenom_client" name="adresse" value="<?php echo $tab[1][$i]['adresse'];?>"/>
                <?php } ?>
            </div>					
            <div style="width:10%;height:75px;float:left;"></div>

    <div class="div_saut_ligne" style="height:5px;">
    </div>

            <div style="width:10%;height:50px;float:left;"></div>
            <div style="width:80%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
                <u>Ajout des produits commandés</u><br />
            </div>
            <div style="width:10%;height:50px;float:left;"></div>	
            
            <div style="width:10%;height:75px;float:left;"></div>
            <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Réf. Produit :<br />
                <select id="ref_produit" name="ref_produit">
                <?php for($i=0; $i<count($tab[2]); $i++) { ?> 
                    <option value="<?php echo $tab[2][$i]['idArticle']; ?>"
                            data-qte="<?php echo $tab[2][$i]['quantite']; ?>"
                            data-designation="<?php echo $tab[2][$i]['designation']; ?>"
                            data-puht="<?php echo $tab[2][$i]['prixUnitaire']; ?>">
                    <?php echo "Art" . " " . $tab[2][$i]['idArticle']; ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Qté en stock :<br />
                <input type="text" id="qte" name="qte" disabled style="text-align:right;" />
            </div>
            <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Désignation du produit :<br />
                <input type="text" id="designation" name="designation" disabled />
            </div>
            <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Prix unitaire HT :<br />
                <input type="text" id="puht" name="puht" disabled style="text-align:right;" />
            </div>		
            <div style="width:10%;height:75px;float:left;"></div>				

    <div class="div_saut_ligne" style="height:30px;">
    </div>

            <div style="width:10%;height:75px;float:left;"></div>
            <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Qté commandée :<br />
                <input type="text" id="qte_commande" name="qte_commande" />
            </div>
            <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Total commande :<br />
                <input type="text" id="total_commande" name="total_commande" disabled />
            </div>
            <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                <input type="button" id="ajouter" name="ajouter" value="Ajouter" style="margin-top:10px;"  onclick="plus_com();"/><br />
                <input type="text" id="param" name="param" style="visibility:hidden;" />
            </div>
            <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                <input type="button" id="valider" name="valider" value="Valider" style="margin-top:10px;" /><br />
                <input type="text" id="chaine_com" name="chaine_com" style="visibility:hidden;" />
                <input type="text" id="total_com" name="total_com" style="visibility:hidden;" />						
            </div>			
            <div style="width:10%;height:75px;float:left;"></div>			
                            
        </div>
    </form>
    </div>
    <div style="float:left;width:10%;height:350px;"></div>	

    <div class="div_saut_ligne" style="height:50px;">
    </div>						
    
    <div style="float:left;width:10%;height:25px;"></div>
    <div style="float:left;width:80%;height:auto;text-align:center;">
        <div class="titre_h1" style="float:left;height:auto;width:100%;">
            <div style="float:left;width:5%;height:25px;"></div>
            <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Réf.
            </div>
            <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                Qté
            </div>
            <div style="width:30%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;overflow:hidden;">
                Désignation du produit
            </div>
            <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:right;">
                PHT
            </div>
            <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:right;">
                TTC
            </div>
            <div style="float:left;width:5%;height:25px;"></div>
            
            <div style="float:left;width:100%;height:auto;" id="det_com">
                <div class="bord"></div>
                <div class="suite">
                </div>
                <div class="suite">
                </div>
                <div class="des">
                </div>
                <div class="prix">
                </div>
                <div class="prix" style="font-weight:bold;">
                </div>
                <div class="bord"></div>						
            </div>		
        </div>
    </div>
    <div style="float:left;width:10%;height:auto;"></div>	
    
    <div class="div_saut_ligne" style="height:30px;">
</div>
</main>
</section>

<script language='javascript' type="text/javascript">
document.getElementById('ref_produit').addEventListener('change', function() {
  var selectedValue = this.value;
  var selectedOption = Array.from(this.options).find(function(option) {
    return option.value === selectedValue;
  });
  if (selectedOption) {
    document.getElementById('qte').value = selectedOption.getAttribute('data-qte');
    document.getElementById('designation').value = selectedOption.getAttribute('data-designation');
    document.getElementById('puht').value = selectedOption.getAttribute('data-puht');
  }
});

document.getElementById('qte_commande').addEventListener('input', function() {
  var qteCommande = parseInt(this.value);
  var puht = parseFloat(document.getElementById('puht').value);
  var totalCommande = qteCommande * puht;
  document.getElementById('total_commande').value = totalCommande;
});
</script>

<script language='javascript' type="text/javascript">
	
	var tot_com = 0;
	
	function plus_com()
	{
		if(ref_client.value != 0 && ref_produit.value != 0 && qte_commande.value != "0" && qte_commande.value != "")
		{
			if(parseInt(qte_commande.value) > parseInt(qte.value))
				alert("La quantité en stock n'est pas suffisante pour honorer la commande");
			else
			{
				var ref_p = ref_produit.value;
				var qte_p = qte_commande.value;
				var des_p = designation.value;
				var pht_p = puht.value;
				
				tot_com = tot_com + (qte_p*pht_p)*1.2;
				total_commande.value = tot_com.toFixed(2);
				total_com.value = total_commande.value;
				chaine_com.value += "|" + ref_p + ";" + qte_p + ";" + des_p + ";" + pht_p;				
				facture();
			}
		}
	}
	

	function facture()
	{		
		var tab_com = chaine_com.value.split('|');
		var nb_lignes = tab_com.length;
		document.getElementById("det_com").innerHTML = "";
		for (ligne=0; ligne<nb_lignes; ligne++)
		{
			if(tab_com[ligne]!="")
			{
				var ligne_com = tab_com[ligne].split(';');
				document.getElementById("det_com").innerHTML += "<div class='bord'></div>";
				document.getElementById("det_com").innerHTML += "<div class='suite'>" + ligne_com[0] + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='suite'>" + ligne_com[1] + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='des'>" + ligne_com[2] + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='prix'>" + (ligne_com[3]*ligne_com[1]).toFixed(2) + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='prix'>" + (1.2*(ligne_com[3]*ligne_com[1])).toFixed(2) + "</div>";
				document.getElementById("det_com").innerHTML += "<div class='bord'><input type='button' value='X' title='Supprimer le produit' style='height:20px; font-size:12px;' onclick='suppr(\"" + tab_com[ligne] + "\");' /></div>";											
			}
		}		
	}

    function suppr( ligne_s)
{
    chaine_com.value = chaine_com.value.replace('|' + ligne_s, '');
    var tab_detail = ligne_s.split(";");

    total_commande.value = (total_commande.value - (tab_detail[1]*tab_detail[3])*1.2).toFixed(2);
    total_com.value = total_commande.value;
    tot_com = total_com.value*1;

    facture();
}
</script>
