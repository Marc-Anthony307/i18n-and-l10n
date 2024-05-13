<?php
$name = ''; // Define the variable $name
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/styles.css">
    <title>
        <?= $name ?> View
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/styles.css">
</head>

<body>

    <div class='container'>

        <h1 class="mt-3">
            <?= $name ?>My Publications
        </h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $publication): ?>
                    <tr>
                        <td>
                            <a href='/Publication/viewPublication/<?= $publication->publication_id ?>'>
                                <?= $publication->publication_title ?>
                            </a>
                        </td>
                        <td>
                            <!-- Display comments for this publication -->
                            <?php
                            // Fetch comments for this publication
                            $publicationCommentModel = new \app\models\PublicationComment();
                            $comments = $publicationCommentModel->getAllCommentsForPublication($publication->publication_id);

                            // Display the number of comments
                            echo count($comments);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href='/Profile/index' class="btntwo">Back</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>