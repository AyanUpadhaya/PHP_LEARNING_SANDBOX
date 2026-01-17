<?php

namespace App\Controller;

use App\Core\Controller;
use App\Models\Feedback;


class FeedbackController extends Controller{
    private Feedback $feedback;

    public function __construct()
    {
        $this->feedback = new Feedback();
    }

    public function index(): void
    {
        $feedbacks = $this->feedback->getAll();
        $this->view('feedback/index', compact('feedbacks'));
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $comment = trim($_POST['comment'] ?? '');

            if ($name && $comment) {
                $this->feedback->create($name, $comment);
            }
            $redirectTo = $_SERVER['HTTP_REFERER'] ?? '/';
            header("Location: $redirectTo");
            exit;
        }
    }
}
