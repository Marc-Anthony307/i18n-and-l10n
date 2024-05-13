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
        <a href='/User/home' class='arrow-button'>Home Page</a>
        <br><br>
        <h1><?= __('User Profile')?></h1>
        <dl>
            <dt>First Name:</dt>
            <dd>
                <?= $data->first_name ?>
            </dd><br>
            <dt>Middle Name:</dt>
            <dd>
                <?= $data->middle_name ?>
            </dd><br>
            <dt>Last Name:</dt>
            <dd>
                <?= $data->last_name ?>
            </dd><br>
        </dl>
        <a href='/User/publications' class='btn'>My Publications</a>
        |
        <a href='/Profile/modify'class='btn'>Modify my profile</a>
        |
        <a href='/Profile/delete'class='btn'>Delete my profile</a>
        |
        <a href='/User/logout'class='btn'>Logout</a>


    </div>
</body>

</html>