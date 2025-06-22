<?php if (count($players) === 1): ?>
    <div class="d-flex gap-2 mb-3">
        <button class="btn btn-outline-secondary" onclick="toggleCompare()">+ Vergelijk stats met andere speler</button>
        <a href="/" class="btn btn-secondary">Terug</a>
    </div>

    <form method="POST" action="/stats" class="d-none" id="compare-form">
        <input type="hidden" name="username[]" value="<?= htmlspecialchars($players[0]->name) ?>">
        <input type="text" name="username[]" class="form-control mb-2" placeholder="Gebruiker 2">
        <button type="submit" class="btn btn-outline-primary">Vergelijk</button>
    </form>
<?php else: ?>
    <a href="/" class="btn btn-secondary mt-3">Terug</a>
<?php endif; ?>
