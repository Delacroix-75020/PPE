<?php

namespace Core\HTML;

class BootstrapForm extends Form{
    
    
   
}

$form = new BootstrapForm(array("pseudo" => "haydenx"));

echo $form->create("register");
echo $form->radio("civ" ,array("Mr" => "mr",
                               "Mme" => "mme"));
echo $form->input("pseudo");
echo $form->input("mdp", array('type' => 'password'));
echo $form->input("email", array('type' => 'email'));
echo $form->select("pays", array('fr' => 'France',
                                 'en' => 'Angleterre'));
echo $form->textarea("description");
echo $form->end("Valider", "Réinitialiser");

?>