

<!DOCTYPE html>
<html>
<head>
    <title>Feedback App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 mb-4">
        <h4>Add Feedback</h4>

        <form method="POST">
           
            <div class="mb-3">
                <input name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="mb-3">
                <textarea name="comment" class="form-control" placeholder="Your Feedback" required></textarea>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h4>Feedback List</h4>

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
