<?php

namespace App\Models;

class GameStats
{
    public string $mode;
    public int $matches;
    public int $wins;
    public int $top10;
    public int $top25;
    public float $winRate;
    public int $kills;
    public int $deaths;
    public float $kd;
    public float $killsPerMatch;
    public int $minutesPlayed;
    public ?\DateTime $lastModified;

    public function __construct(string $mode, array $data)
    {
        $this->mode = $mode;
        $this->matches = (int)($data['matches'] ?? 0);
        $this->wins = (int)($data['wins'] ?? 0);
        $this->top10 = (int)($data['top10'] ?? 0);
        $this->top25 = (int)($data['top25'] ?? 0);
        $this->winRate = (float)($data['winRate'] ?? 0.0);
        $this->kills = (int)($data['kills'] ?? 0);
        $this->deaths = (int)($data['deaths'] ?? 0);
        $this->kd = (float)($data['kd'] ?? 0.0);
        $this->killsPerMatch = (float)($data['killsPerMatch'] ?? 0.0);
        $this->minutesPlayed = (int)($data['minutesPlayed'] ?? 0);
        $this->lastModified = isset($data['lastModified'])
            ? new \DateTime($data['lastModified'])
            : null;
    }
}
