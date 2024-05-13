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
        <form method='post' action='' onsubmit="return validateForm()"><br>
            <div class="form-group">
                <label>Username:<input type="text" class="form-control" name="username" placeholder="Bobby" id="username"/></label>
            </div>
            <div class="form-group">
                <label>Password:<input type="password" class="form-control" name="password"
                        placeholder="Password" id="password"/></label>
            </div>

            <div class="form-group"><br>
                <input type="submit" name="action" value="Register" class="btn"/><br><br>
                <a href='/User/login'>I have an account, bring me to the login page</a>
                <br><br>
                <a href='/Home/home'>Home Page</a>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username.trim() === '' || password.trim() === '') {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>