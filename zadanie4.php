<?php
    function getSynonyms($word) {
        //tabela wyrazów i ich synonimów
        $thesaurus = array(
            'market' => array("trade"),
            'small' => array("little", "compact")
        );
        //sprawdza czy $thesaurus[$word] zawiera podane słowo jeśli tak to je zwraca jeśli nie zwraca
        // pustą liste
        $synonyms = isset($thesaurus[$word]) ? $thesaurus[$word] : array();
        //przypisz $word i zwrócony wcześniej snonim do listy
        $result = array(
            "word" => $word,
            "synonyms" => $synonyms,
        );
        //zwróć liste w formie JSON
        return json_encode($result);

    }

    echo getSynonyms("small");
    echo getSynonyms("asleast");

?>