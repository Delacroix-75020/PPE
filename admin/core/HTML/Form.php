<?php

namespace Core\HTML;

class Form{
    
    protected $data;
    public $surround = "div";
    
    public function __construct($data = array()){
        
        $this->data = $data;
    }
    
    protected function getValue($key){
        
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
    
    protected function label($name){
        
        return "<label for='$name'>". ucfirst($name) ."</label>: ";
    }
    
    protected function surround($field){
        
        return "<" . $this->surround . ">" . $field . "</" . $this->surround .">";
    }
    
    public function create($name, $options = array()){
        
        $html = "<form name='$name'";
        
        $html .= isset($options['method']) ?  " method = '" .$options['method']. "'" : " method = 'post'";
        $html .= isset($options['action']) ?  " action = '" .$options['action']. "'" : " action = '#'";
        $html .= isset($options['class']) ?  " class = '" .$options['class']. "'" : "";
        $html .= isset($options['file']) ?  " enctype = 'multipart/form-data'" : "";
        
        $html .= ">";
        
        return $html;
    }
 
    public function input($name, $options = array()){
        
        $html = $this->label($name);
        
        $html .= "<input id='$name' name='$name'";
        
        $html .= isset($options['type']) ?  " type = '" .$options['type']."'" : " type = 'text'";
        $html .= isset($options['class']) ?  " class = '" .$options['class']."'" : "";
        $html .= isset($options['pattern']) ?  " pattern = " .$options['pattern']."'" : "";
        $html .= isset($options['placeholder']) ?  " placeholder = " .$options['placeholder']."'" : "";
        $html .= isset($options['required']) ?  " required" : "";
        $html .= isset($options['min']) ?  " min = '" .$options['min']. "'" : "";
        $html .= isset($options['max']) ?  " max = '" .$options['max']. "'" : "";
        $html .= isset($options['step']) ?  " step = '" . $options['step'] . "'" : "";
        $html .= isset($options['maxlength']) ?  " maxlength = '" . $options['maxlength'] . "'" : "";
        $html .= isset($options['disabled']) ?  " disabled = 'true'" : "";
        
        $html .= " value = '" .$this->getValue($name). "'>";
        
        return $this->surround($html);
    }
    
    public function select($name, $options = array()){
        
        $html = $this->label($name);
        
        $html .= "<select name='$name' id='$name'";
        
        $html .= isset($options['class']) ?  " class = '" .$options['class']."'" : "";
        
        $html .= ">";
        
        foreach($options as $k => $v){

            $html .= "<option value = '$k'>$v</option>";
        }
                    
        $html .= "</select>";
        
        return $this->surround($html);
    }
    
    public function checkbox($checkboxes){
        
        $html = $this->label($name);
        
        foreach($checkboxes as $k => $v){

            $html .= $k ." <input type = 'checkbox' name = '$k' id='$k' value = '$v'>";
        }
        
        return $this->surround($html);
    }
    
    public function radio($name, $radios){
        
        $html = $this->label($name);
        
        foreach($radios as $k => $v){

            $html .= $k ." <input type = 'radio' name = '$name' id='$k' value = '$v'>";
        }
        
        return $this->surround($html);
    }
    
    public function textarea($name, $options = array()){
        
        $html = $this->label($name);
        
        $html .= "<textarea name='$name' id='$name'";
        
        $html .= isset($options['class']) ?  " class = '" .$options['class']."'" : "";
        $html .= isset($options['cols']) ?  " cols = '" .$options['cols']."'" : " cols='30'";
        $html .= isset($options['rows']) ?  " rows = '" .$options['rows']."'" : " rows='10'";
        $html .= isset($options['placeholder']) ?  " placeholder = " .$options['placeholder']."'" : "";
        $html .= isset($options['required']) ?  " required" : "";
        
        $html .= " ></textarea>";
        
        return $this->surround($html);
    }
    
    public function button($name,$options = array()){
        
        $html = "<button ";
        
        $html .= isset($options['type']) ?  " type = '" .$options['type']."'" : " type = 'submit'";
        $html .= isset($options['class']) ?  " class = '" .$options['class']."'" : "";
        
        $html .= ">" .$name ."</button>";
        
        return $html;
    }
    
    public function hidden($name,$value){
        
        return $this->surround("<input name='$name' value='$value'>");
    }
    
    public function end($text, $reset = ""){
        
        if($reset == "")
            $html  = $this->surround("<input type='submit' name='submit' value='$text'> ");
        else
            $html  = $this->surround("<input type='submit' name='submit' value='$text'> 
                                      <input type='reset' name='reset' value='$reset'>");  
        
        $html .= "</form>";
        
        return $html;
        
    }
    
}

$form = new Form(array("pseudo" => "haydenx"));

echo $form->create("register",array('file' => 'true'));
echo $form->radio("civ" ,array("Mr" => "mr",
                               "Mme" => "mme"));
echo $form->input("pseudo");
echo $form->input("mdp", array('type' => 'password','class' => 'test'));
echo $form->input("chiffre", array('type' => 'number',
                                   'class' => 'test',
                                   'min' => '2',
                                   'max' => '20',
                                   'step' => '2'));
echo $form->input("avatar", array('type' => 'file','class' => 'test'));
echo $form->input("email", array('type' => 'email','disabled' => true));
echo $form->button("valider");
echo $form->button("RAZ", array('type' => 'reset'));
echo $form->select("pays", array('fr' => 'France',
                                 'en' => 'Angleterre'));
echo $form->textarea("description", array('class' => 'test','required'=>'required'));
echo $form->end("Valider", "Réinitialiser");

?>


