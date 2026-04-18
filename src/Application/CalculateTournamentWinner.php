<?php

class CalculateTournamentWinner {
    public function execute(array $rounds): string {
        $tracker = new GameScoreTracker();

        foreach ($rounds as $round) {
            $tracker->recordRound($round[0], $round[1]);
        }

        $res = $tracker->getResult();
        return $res['winner'] . " " . $res['maxLead'];
    }
}