<?php
$name = "Home"; // Define the variable $name with a value of "Home"
?>

<html>

<head>
    <title>
        <?= $name ?> view
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/app/styles.css">
</head>

<body>
    <div class='container'>
        <br>
        <a href='/Publication/create'>Create Publication</a>
        |
        <a href='/Profile/index'>Profile</a>
        <br>
        <br>
        <form action="/User/search" method="GET">
            <input type="text" name="query" placeholder="Search publications...">
            <button type="submit" class='btn'>Search</button>
        </form>


        <div class="container">
            <?php foreach ($data as $publication): ?>
                <div class="publication-container">
                    <table>
                        <tr>
                            <td>
                                <h3>
                                    <?= $publication->publication_title ?>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $publication->publication_text ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <small>
                                    <?= $publication->timestamp ?>
                                </small>
                            </td>
                        </tr>
                        <tr>
                            <td><br>
                                <form action="/Comment/add" method="POST" onsubmit="return validateForm()">
                                    <input type="hidden" name="publication_id" value="<?= $publication->publication_id ?>">
                                    <textarea name="publication_comment_text" rows="3" cols="40" id="comment"
                                        placeholder="Add your comment here..."></textarea>
                                    <br>
                                    <button type="submit" class='btn'>Add Comment</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Display comments for this publication -->
                        <tr>
                            <td>
                                <h4 style="margin-left: 25px;">Comments:</h4>
                                <?php
                                // Fetch comments for this publication
                                $publicationCommentModel = new \app\models\PublicationComment();
                                $comments = $publicationCommentModel->getAllCommentsForPublication($publication->publication_id);

                                // Display each comment
                                foreach ($comments as $comment) {
                                    echo "<p style='margin-left: 25px;'>{$comment->publication_comment_text}<br><small style = 'color:blue'>{$comment->timestamp}</small></p>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
    function validateForm(publicationId) {
        var commentTextArea = document.querySelector("textarea[name='publication_comment_text'][data-publication-id='" + publicationId + "']");
        var comment = commentTextArea.value.trim();

        if (comment === '') {
            alert("Please enter some text to comment.");
            return false;
        }
        return true;
    }
</script>

</body>

</html>