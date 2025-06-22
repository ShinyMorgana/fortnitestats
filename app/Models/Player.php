<?php

namespace App\Models;

class Player
{
    public string $id;
    public string $name;
    public array $gameStats = []; // ['solo' => GameStats, 'duo' => ..., 'overall' => ...]

    public function __construct(array $data)
    {
        $this->id = $data['account']['id'];
        $this->name = $data['account']['name'];

        $modes = ['overall', 'solo', 'duo', 'squad', 'ltm'];

        foreach ($modes as $mode) {
            $rawStats = $data['stats']['all'][$mode] ?? null;

            $this->gameStats[$mode] = $rawStats
                ? new GameStats($mode, $rawStats)
                : new GameStats($mode, []);
        }
    }
}
