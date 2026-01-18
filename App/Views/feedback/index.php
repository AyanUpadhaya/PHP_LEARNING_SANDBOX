
<?php
    use function App\Utils\url;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
   
    <h4>Feedback List</h4>

    <a href="<?= url('feedback/add') ?>" class="btn btn-primary mb-3">Add Feedback</a>

    <?php foreach ($feedbacks as $feedback): ?>
        <div class="card mb-2">
            <div class="card-body">
                <strong><?= htmlspecialchars($feedback['name']) ?></strong>
                <p><?= htmlspecialchars($feedback['comment']) ?></p>
                <small class="text-muted"><?= $feedback['date'] ?></small>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
