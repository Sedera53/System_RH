<main>
<center>
<div class="card">
  <div class="card-header">
    <div class="text-header">Facture</div>
  </div>
  <div class="card-body">
    <form action="<?php echo base_url('C_control/showFacture') ?>" method="post">
        <div class="form-group">
            <label for="classe">Client</label>
            <select class="form-control" name="idCompteTier">
                <?php for ($i=0; $i <count($tab[0]) ; $i++) { ?>
                    <option value="<?php echo $tab[0][$i]['idCompteTier']?>"><?php echo "CLT:" . $tab[0][$i]['societe']; ?></option>
                <?php } ?>
            </select>
        </div>    
        <div class="form-group">
            <label for="classe">Ref. facture</label>
            <select class="form-control" name="idComm">
            <?php for ($i=0; $i <count($tab[1]) ; $i++) { ?>
                <?php date_default_timezone_set('Europe/Paris'); ?>
                <option value="<?php echo $tab[1][$i]['idComm']?>"><?php echo "dpx/".date("m",strtotime($tab[1][$i]['dateComm']))."/".date("Y",strtotime($tab[1][$i]['dateComm']))."/".str_pad($tab[1][$i]['idComm'], 3, '0', STR_PAD_LEFT);?></option>
            <?php } ?>
            </select>
        </div>    
        <div class="form-group">
            <label for="intitule">Date</label>
            <input required="" class="form-control" name="daty" type="date" >
        </div>
        <input type="submit" class="btn" value="Voir">    
    </form>
  </div>
</div>
</center>
</main>
</section>
<style>
    .card {
  width: 25%;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
  overflow: hidden;
  margin: 10px;
}
.lien{
    text-decoration:none;
    color:black;
}
.card-header {
  background-color: #333;
  padding: 16px;
  text-align: center;
}

.card-header .text-header {
  margin: 0;
  font-size: 18px;
  color: rgb(255, 255, 255);
}

.card-body {
  padding: 16px;
}

.form-group {
  margin-bottom: 10px;
}

.form-group label {
  display: block;
  font-size: 14px;
  color: #333;
  font-weight: bold;
  margin-bottom: 1px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"] {
  width: 100%;
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn {
  padding: 12px 24px;
  margin-left: 13px;
  font-size: 14px;
  border: none;
  border-radius: 4px;
  background-color: #333;
  color: #fff;
  text-transform: uppercase;
  transition: background-color 0.2s ease-in-out;
  cursor: pointer
}

.btn:hover {
  background-color: #ccc;
  color: #333;
}
</style>