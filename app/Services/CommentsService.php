<?php

namespace App\Services;

use App\Models\Comments;

class CommentsService
{
   // private Comments $commentsModel;

    function __construct()
    {
        $this->commentsModel = new Comments();
    }

    public function setComment($userName, $userEmail, $commentTheme, $commentText, $newsId)
    {
        return $this->commentsModel->setComment($userName, $userEmail, $commentTheme, $commentText, $newsId);
    }
}