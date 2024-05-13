<?php
namespace app\controllers;

use app\models\PublicationComment;

#[\app\filters\Login]
class Comment
{
    #[\app\filters\HasProfile]

    public function addComment()
    {
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Get data from form
            $publication_id = $_POST["publication_id"];
            $profile_id = $_SESSION['profile_id'];
            $publication_comment_text = $_POST["publication_comment_text"];
            var_dump($_POST["publication_comment_text"]);

            // Create new comment
            $comment = new PublicationComment();
            $comment->publication_id = $publication_id;
            $comment->profile_id = $profile_id;
            $comment->publication_comment_text = $publication_comment_text;
            $comment->insert();

            // Redirect back to the same page
            header('location:/User/home');
            exit();
        }
    }
    
    public function createComment($publication_id, $profile_id, $publication_comment_text)
    {
        // Create new comment
        $comment = new PublicationComment();
        $comment->publication_id = $publication_id;
        $comment->profile_id = $profile_id;
        $comment->publication_comment_text = $publication_comment_text;
        $comment->insert();
        // Handle redirection or display success message
    }

    public function editComment($publication_comment_id, $publication_comment_text)
    {
        // Get the comment
        $comment = PublicationComment::get($publication_comment_id);
        // Update comment text
        $comment->publication_comment_text = $publication_comment_text;
        $comment->update();
        // Handle redirection or display success message
    }

    public function deleteComment($publication_comment_id)
    {
        // Get the comment
        $comment = PublicationComment::get($publication_comment_id);
        // Delete the comment
        $comment->delete();
        // Handle redirection or display success message
    }
}
?>
