<?php

namespace Services;

use App\Models\Player;

class PlayerService
{
    public function fetchPlayers(array $usernames): array
    {
        $api = new FortniteApiService();
        $players = [];
        $errors = [];

        foreach ($usernames as $username) {
            $username = trim($username);
            if (!$username) continue;

            $data = $api->fetchStats($username);
            if ($data) {
                $players[] = new Player($data);
            } else {
                $errors[] = $username;
            }
        }

        return ['players' => $players, 'errors' => $errors];
    }
}
