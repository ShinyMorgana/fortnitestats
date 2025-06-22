<?php
use Slim\App;
use App\Controllers\StatsController;

return function (App $app) {
    $app->get('/', [StatsController::class, 'index']);
    $app->post('/stats', [StatsController::class, 'fetchStats']);
    $app->post('/compare', [StatsController::class, 'compare']);
};
