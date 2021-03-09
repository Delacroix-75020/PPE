<?php

class Forms{
    
    public function input($label, $type = "text"){
        
        return
        "<div class='mb-3'>
            <label for='{$label}' class='form-label'>{$label}</label>
            <input type='{$type}' name='{$label}' class='form-control' id='{$label}'>
        </div>";
    }
    
    public function textearea($label){
        
        return "<textarea name='{$label}' rows='10' cols='30'></textarea>";
    }
    
    public function button($name, $type){
        
        return "<button type='$type' name='{$name}' class='btn btn-primary'>$name</button>";
    }
    
    public function checkbox($label, $name){
        
        return "<div class='mb-3 form-check'>
                    <input type='checkbox' name='$name' class='form-check-input' id='exampleCheck1'>
                    <label class='form-check-label' for='$name'>$label</label>
                </div>";
    }
    
    public function select($label, $options = array()){
        
        $html = "<select class='form-select' aria-label='Default select example'>";
        
        foreach($options as $k => $v){
            
            $html .= "<option value='{$k}'>{$v}</option>";
        }
         
        $html .= "</select>";
        
        return $html;
    }
}

?>