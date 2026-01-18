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
     <div class="card p-4 mb-4">
        <h4>Add Feedback</h4>

        <form method="POST" action="<?= url('feedback/store') ?>">
           
            <div class="mb-3">
                <input name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="mb-3">
                <textarea name="comment" class="form-control" placeholder="Your Feedback" required></textarea>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>