<?php foreach ($players as $player): ?>
    <h2 class="mt-4">Statistieken voor: <?= htmlspecialchars($player->name) ?></h2>

    <?php if (empty($player->gameStats)): ?>
        <?php
        $errorMessage = "Geen stats gevonden voor speler " . htmlspecialchars($player->name);
        include __DIR__ . '/error.php';
        ?>
    <?php else: ?>
        <?php
        $statsToShow = $player->gameStats;
        include __DIR__ . '/table.php';
        ?>
    <?php endif; ?>
    <hr>
<?php endforeach; ?>
