<?php
class RankingTable {
    public $players = array();
    public $results = array();

    public function __construct($players) {
        $this->players = $players;
    }

    public function recordResult($player, $score) {
        $this->results[$player] = $score;
    }

    public function playerRank($rank) {
        // Sortowanie graczy według wyników
        uasort($this->players, function ($a, $b) {
            if ($this->results[$a] === $this->results[$b]) {
                // Jeśli wyniki są takie same, sortuj wg ilości gier
                if ($this->getGamesPlayed($a) === $this->getGamesPlayed($b)) {
                    // Jeśli ilość gier jest taka sama, sortuj wg kolejności na liście graczy
                    return array_search($a, array_keys($this->players)) - array_search($b, array_keys($this->players));
                } else {
                    // Sortuj wg ilości gier od najmniejszej do największej
                    return $this->getGamesPlayed($a) - $this->getGamesPlayed($b);
                }
            } else {
                // Sortuj wg wyników od największego do najmniejszego
                return $this->results[$b] - $this->results[$a];
            }
        });

        // Pobierz gracza na danym rankingu
        $rankedPlayers = array_values($this->players);
        return $rankedPlayers[$rank-1];
    }

    public function getGamesPlayed($player) {
        // Zliczanie ilości gier rozegranych przez gracza
        $count = 0;
        foreach ($this->results as $p => $score) {
            if ($p === $player) {
                $count++;
            }
        }
        return $count;
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);

?>