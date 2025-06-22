<table class="table table-bordered table-hover text-center align-middle">
    <thead>
        <tr>
            <th>Gametype</th>
            <th>Gespeelde Matches</th>
            <th>Aantal Wins</th>
            <th>Top 10</th>
            <th>Top 25</th>
            <th>Winrate</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($statsToShow as $mode => $gameStats): ?>
            <tr>
                <td><?= ucfirst($mode) ?></td>
                <td><?= $gameStats->matches ?? '-' ?></td>
                <td><?= $gameStats->wins ?? '-' ?></td>
                <td><?= $gameStats->top10 ?? '-' ?></td>
                <td><?= $gameStats->top25 ?? '-' ?></td>
                <td><?= $gameStats->winRate ?? '-' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
