<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Services\PlayerService;

class StatsController
{
    private PlayerService $playerService;

    public function __construct()
    {
        $this->playerService = new PlayerService();
    }

    public function index(Request $request, Response $response): Response
    {
        ob_start();
        include __DIR__ . '/../Views/index.php';
        $html = ob_get_clean();

        $response->getBody()->write($html);
        return $response;
    }

    public function fetchStats(Request $request, Response $response): Response
    {
        $params = (array) $request->getParsedBody();
        $usernames = $params['username'] ?? [];

        if (!is_array($usernames)) {
            $usernames = [$usernames];
        }

        $result = $this->playerService->fetchPlayers($usernames);
        $players = $result['players'];
        $errors = $result['errors'];

        ob_start();
        include __DIR__ . '/../Views/stats.php';
        $html = ob_get_clean();

        $response->getBody()->write($html);
        return $response;
    }
}
