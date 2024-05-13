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

    <div class='container'><br>
        <h1>Delete Profile</h1>
        <p>Do you want to proceed with deletion of your profile?</p>
        <dl>
            <dt>First Name:</dt>
            <dd>
                <?= $data->first_name ?>
            </dd><br>

            <dt>Middle Name:</dt>
            <dd>
                <?= $data->middle_name ?>
            </dd>
            <br>
            <dt>Last Name:</dt>
            <dd>
                <?= $data->last_name ?>
            </dd>
        </dl><br>
        <form method="post" action=''>
            <input type="submit" name="action" class="btn" value="Delete"><br><br>
            <a href='/Profile/index' class="btntwo">Cancel</a>
        </form>
    </div>
</body>

</html>