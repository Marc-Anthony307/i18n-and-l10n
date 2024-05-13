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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="/app/styles.css">

</head>

<body>

    <div class='container'>
        <h1>Are you sure you want to delete this publication?</h1><br>
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
        </table>

        <form method="post" action=''><br>
            <input type="submit" name="action" value="Delete" class="btn">
            <a href='/User/publications' class="btn">Cancel</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>