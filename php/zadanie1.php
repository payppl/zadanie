<?php

class Pipeline {
    public static function make(...$functions) {
        return function($arg) use ($functions) {
            $result = $arg;
    
            foreach($functions as $function) {
                $result = $function($result);
            }

            return $result;
        };
        
    }
}

$pomnozprzez3 = function($arg) {
        return $arg * 3;
};

$dodaj1 = function($arg) {
    return $arg +1;
};

$podzielprzez2 = function($arg) {
    return $arg /2;
};

$pipeline = Pipeline::make($pomnozprzez3,$dodaj1,$podzielprzez2);
$result = $pipeline(3);
echo $result;

?>