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

            <h1>Create Profile</h1>

            <div class="form-group">
                <label>First name:<input type="text" class="form-control" name="first_name" id="fname"
                        placeholder="John" /></label> <!-- id is for the browser and name is for the server -->
            </div><br>
            <div class="form-group">
                <label>Middle name:<input type="text" class="form-control" name="middle_name" id="mname"
                        placeholder="Joseph" /></label>
            </div><br>
            <div class="form-group">
                <label>Last name:<input type="text" class="form-control" name="last_name" placeholder="Doe"
                        id="lname" /></label>
            </div><br>

            <div class="form-group">
                <input type="submit" name="action" class='btn' value="Create my profile" />
            </div> <br>
            <a href='/User/login' class="btntwo">Cancel</a>

        </form>
    </div>

    <script>
        function validateForm() {
            var fname = document.getElementById("fname").value;
            var mname = document.getElementById("mname").value;
            var lname = document.getElementById("lname").value;

            if (fname.trim() === '' || mname.trim() === '' || lname.trim() === '') {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>