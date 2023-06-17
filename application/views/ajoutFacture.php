
<main>
    <div class="container">
        <div class="title">Saisie facture</div>
            <div class="content">
                <form id="formulaire" action="<?php echo base_url('C_control/ajoutValeurFacture')?>" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Ref. Client</span>
                        <select id="ref_client" name="ref_client" class="form-control">
                            <?php for($i=0; $i<count($tab[0]); $i++) { ?> 
                                <option value="<?php echo $tab[0][$i]['idCompteTier']; ?>"
                                        data-societe="<?php echo $tab[0][$i]['societe']; ?>"
                                        data-nomresponsable="<?php echo $tab[0][$i]['nomResponsable']; ?>"
                                        data-adresse="<?php echo $tab[0][$i]['adresse']; ?>">
                                <?php echo "CLT:" . $tab[0][$i]['societe']; ?>
                                </option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Sociéte</span>
                        <input type="text" id="societe" placeholder="XXXX" name="societe" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Nom du client</span>
                        <input type="text" placeholder="XXXX" id="responsable" name="responsable" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Adresse</span>
                        <input type="text" placeholder="XXXX" id="adresse" name="adresse" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Ref. Produit</span>
                        <select id="ref_produit" name="ref_produit" class="form-control">
                            <?php for($i=0; $i<count($tab[1]); $i++) { ?> 
                                <option value="<?php echo $tab[1][$i]['idArticle']; ?>"
                                        data-qte="<?php echo $tab[1][$i]['quantite']; ?>"
                                        data-designation="<?php echo $tab[1][$i]['designation']; ?>"
                                        data-puht="<?php echo $tab[1][$i]['prixUnitaire']; ?>">
                                <?php echo "ART:" . $tab[1][$i]['designation']; ?>
                                </option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantité en stock</span>
                        <input type="text" placeholder="XXXX" id="qte" name="qte" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Désignation du produit</span>
                        <input type="text" placeholder="XXXX" id="designation" name="designation" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Prix unitaire HT</span>
                        <input type="text" placeholder="XXXX" id="puht" name="puht" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantité commandée</span>
                        <input type="text" placeholder="XXXX" id="qte_commande" name="qte_commande" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Total commande</span>
                        <input type="text" placeholder="XXXX" id="total_commande" name="total_commande" required>
                    </div>
                </div>
                <div class="input-box">
                    <input class="btn btn-secondary" type="button" id="ajouter" name="ajouter" value="Ajouter Produit" onclick="plus_com();">
                    <input type="text" id="param" name="param" style="visibility:hidden;">
                </div>
                <hr>
                <div class="button">
                    <input type="submit" id="valider" name="valider" value="Facturer">
                    <input type="text" id="chaine_com" name="chaine_com" style="visibility:hidden;">
                    <input type="text" id="total_com" name="total_com" style="visibility:hidden;">
                </div>
                </form>
            </div>
        </div>
    </div>				
    <br>
    <br>
    <hr>
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
    </main>
</section>
<script language='javascript' type="text/javascript">
    document.getElementById('ref_client').addEventListener('change', function() {
  var selectedValue = this.value;
  var selectedOption = Array.from(this.options).find(function(option) {
    return option.value === selectedValue;
  });
  if (selectedOption) {
    document.getElementById('societe').value = selectedOption.getAttribute('data-societe');
    document.getElementById('responsable').value = selectedOption.getAttribute('data-nomresponsable');
    document.getElementById('adresse').value = selectedOption.getAttribute('data-adresse');
  }
});
</script>
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
				document.getElementById("det_com").innerHTML += "<div class='bord'><input type='button' value='X' title='Supprimer le produit' style='height:20px; font-size:20x;' onclick='suppr(\"" + tab_com[ligne] + "\");' /></div>";											
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

<style>
.container{
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }
  .container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }
  .container .title::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg,#e3e8eb, #597ab6);
  }
  .content form .user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }
  form .user-details .input-box{
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }
  form .input-box span.details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }
  .user-details .input-box input{
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }
  .user-details .input-box input:focus,
  .user-details .input-box input:valid{
    border-color: #9b59b6;
  }
   form .button{
     height: 45px;
     margin: 35px 0
   }
   form .button input{
     height: 100%;
     width: 100%;
     border-radius: 5px;
     border: none;
     color: #fff;
     font-size: 18px;
     font-weight: 500;
     letter-spacing: 1px;
     cursor: pointer;
     transition: all 0.3s ease;
     background: linear-gradient(135deg, #e3e8eb, #597ab6);
   }
   form .button input:hover{
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #bfd2df, #5967b6);
    }
   @media(max-width: 584px){
   .container{
    max-width: 100%;
  }
  form .user-details .input-box{
      margin-bottom: 15px;
      width: 100%;
    }
    form .category{
      width: 100%;
    }
    .content form .user-details{
      max-height: 300px;
      overflow-y: scroll;
    }
    .user-details::-webkit-scrollbar{
      width: 5px;
    }
    }
    @media(max-width: 459px){
    .container .content .category{
      flex-direction: column;
    }
  }


  .bord
{
	float:left;
	width:5%;
	height:25px;
}

.suite
{
	width:15%;
	height:25px;
	float:left;
	font-size:16px;
	font-weight:normal;
	text-align:left;
}

.des
{
	width:30%;
	height:25px;
	float:left;
	font-size:16px;
	font-weight:normal;
	text-align:left;
	overflow:hidden;
}

.prix
{
	width:15%;
	height:25px;
	float:left;
	font-size:16px;
	font-weight:normal;
	text-align:right;
}
</style>
