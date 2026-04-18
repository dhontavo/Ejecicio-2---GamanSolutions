<?php

class GameScoreTracker {
    private int $cumulativePlayer1 = 0;
    private int $cumulativePlayer2 = 0;
    private int $maxLead = 0;
    private int $winner = 1;

    public function recordRound(int $p1, int $p2): void {
        // 1. Acumulamos puntajes
        $this->cumulativePlayer1 += $p1;
        $this->cumulativePlayer2 += $p2;

        // 2. Calculamos ventaja actual
        $currentLead = abs($this->cumulativePlayer1 - $this->cumulativePlayer2);
        $currentLeader = ($this->cumulativePlayer1 > $this->cumulativePlayer2) ? 1 : 2;

        // 3. Verificamos si es un nuevo récord de ventaja
        if ($currentLead > $this->maxLead) {
            $this->maxLead = $currentLead;
            $this->winner = $currentLeader;
        }
    }

    public function getResult(): array {
        return [
            'winner' => $this->winner,
            'maxLead' => $this->maxLead
        ];
    }
}