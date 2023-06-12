<?php

class TextInput {

    protected $value = "";
    
    public function add($text) {
        $this->value .= $text;
    }

    public function getValue() {
        return $this->value;
    }
}

class NumericInput extends TextInput {
    public function add($text) {
        if(ctype_digit($text)) {
            parent::add($text);
        }
    }
}

$textInput = new TextInput();
$textInput->add("Witam ");
$textInput->add("was\n");
echo $textInput->getValue();

$numericInput = new NumericInput();
$numericInput->add("5353");
$numericInput->add("fh");
$numericInput->add("1111");
echo $numericInput->getValue(); 

?>