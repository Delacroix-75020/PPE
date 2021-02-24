  <body>
       <div class="row d-flex justify-content-center">
        <div class="col-sm-8 col-md-7 py-4">
         <form method="POST" class="box">
            <table class="box-input">
            <h1 class="box-title">S'inscrire</h1>
               <tr>
                  <td align="right">
                     <label for="username" >username :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre username" id="username" name="username" class="box-input" value="<?php if(isset($username)) { echo $username; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="email">email :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre email" id="email" name="email" class="box-input" value="<?php if(isset($email)) { echo $email; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="email2">Confirmation du email :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre email" id="email2" name="email2" class="box-input" value="<?php if(isset($email2)) { echo $email2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="pass">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="pass" name="pass" class="box-input" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="pass2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre pass" id="pass2" name="pass2" class="box-input" />
                  </td>
               </tr>
               <tr>
                  
                  <td>
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" class="box-button" align="center" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red" align="center">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>