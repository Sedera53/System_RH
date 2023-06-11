<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
    $type[] = "Client";
    $type[] = "Fournisseur";
?>
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ajoutclient.css">
<main>
    <div class="container">
    <div class="title">Ajout Client</div>
    <div class="content">
        <form action="<?php echo base_url('C_control/addClient')?>" method="post">
        <div class="user-details">
            <div class="input-box">
            <span class="details">Type</span>
            <select class="form-control" name="type" required>
                <?php for ($i = 0; $i < count($type); $i++) { ?>
                    <option value="<?php echo $i+1?>"><?php echo $type[$i]?></option>
                <?php } ?>
            </select>
            </div>
            <div class="input-box">
            <span class="details">Sociéte</span>
            <input type="text" placeholder="Enter your society" name="societe" required>
            </div>
            <div class="input-box">
            <span class="details">Dirigeant</span>
            <input type="text" placeholder="Enter your name" name="dirigeant" required>
            </div>
            <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
            </div>
            <div class="input-box">
            <span class="details">Adresse</span>
            <input type="text" placeholder="Enter your address" name="adresse" required>
            </div>
            <div class="input-box">
            <span class="details">Téléphone</span>
            <input type="text" placeholder="Enter your number" name="phone" required>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Register">
        </div>
        </form>
    </div>
</div>
</main>
</section>
