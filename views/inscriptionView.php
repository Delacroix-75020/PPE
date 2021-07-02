<div class="row d-flex justify-content-center">
    <div class="col-sm-4 col-md-4 py-4">
        <?php if(isset($erreur)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-message">
                    <?= $erreur; ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="card">
            <div class="card-header">
                <h1 class="box-title">S'inscrire</h1>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Pseudo :</label>
                        <input type="text" id="username" name="username" placeholder="Votre pseudo" class="form-control" value="<?php if(isset($username)) { echo $username; } ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email :</label>
                        <input type="email" id="email" name="email" placeholder="Votre adresse email" class="form-control" value="<?php if(isset($email)) { echo $email; } ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="email2" class="form-label">Confirmation de l'adresse email :</label>
                        <input type="email" id="email2" name="email2" placeholder="Confirmez votre adresse email" class="form-control" value="<?php if(isset($email2)) { echo $email2; } ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse de Livraison :</label>
                        <input type="text" id="adresse" name="adresse" placeholder="ex : rue jean moulin" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">Numéro de Téléphone  :</label>
                        <input type="tel" id="tel" name="tel" placeholder="Numéro de Téléphone" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Mot de passe :</label>
                        <input type="password" id="pass" name="pass" placeholder="Votre mot de passe" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="pass2" class="form-label">Confirmation du mot de passe :</label>
                        <input type="password" id="pass2" name="pass2" placeholder="Confirmez votre mot de passe" class="form-control" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="forminscription" class="btn btn-success">Je m'inscris</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
