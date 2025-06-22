<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Fortnite Stats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <script>
        function toggleCompare() {
            document.getElementById('compare-form').classList.toggle('d-none');
        }
    </script>
</head>

<body class="p-4">
    <div class="container">
        
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $name): ?>
                <div class="alert alert-warning">
                    Geen speler gevonden met de naam <strong><?= htmlspecialchars($name) ?></strong>.
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php include __DIR__ . '/partials/player_stats_block.php'; ?>

        <?php include __DIR__ . '/partials/compare_form.php'; ?>

    </div>
</body>

</html>