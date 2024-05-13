<?php
$name = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $name ?> View
    </title>
    <link rel="stylesheet" href="/app/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/styles.css">
</head>

<body>

    <div class='container'>

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
                <td><br>
                    <small>
                        <?= $publication->timestamp ?>
                    </small>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- Display comments --><br>
                    <h4 style="margin-left: 25px;">Comments:</h4>
                    <?php
                    // Fetch comments for this publication
                    $publicationCommentModel = new \app\models\PublicationComment();
                    $comments = $publicationCommentModel->getAllCommentsForPublication($publication->publication_id);

                    // Display each comment
                    foreach ($comments as $comment) {
                        echo "<p style='margin-left: 25px;'>{$comment->publication_comment_text}</p>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <?php
                echo "<td><br><a href='/Publication/edit/{$publication->publication_id}'class='btn'>Edit</a>
                <a href='/Publication/delete/{$publication->publication_id}'class='btn'>Delete</a></td>";
                ?>
            </tr>
        </table>

        <br>
        <a href='/User/publications' class="btntwo">Back</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>