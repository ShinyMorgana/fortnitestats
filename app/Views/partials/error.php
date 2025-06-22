<?php if (!empty($errorMessage)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($errorMessage) ?>
    </div>
<?php endif; ?>
