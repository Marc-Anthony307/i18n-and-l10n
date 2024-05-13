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
        <form method='post' action='' onsubmit="return validateForm()">
            <div class="form-group"><br>
                <label>Publication Title:<input type="textarea" class="form-control" name="publication_title"
                        id="publication_title" placeholder="Title" /></label>
            </div><br>
            <div class="form-group">
                <label for="publication_text">Publication Text:</label>
                <textarea class="form-control" name="publication_text" id="publication_text" rows="4"
                    placeholder="What's Happening?"></textarea>
            </div><br>
            <div class="form-group">
                <label>
                    <input type="radio" name="visibility" value="1" checked>
                    Public
                </label>
                <label>
                    <input type="radio" name="visibility" value="0">
                    Private
                </label>
            </div><br>
            <div class="form-group">
                <input type="submit" name="action" value="Post!" class="btn"/>
            </div>
            <a href='/User/home' class='btntwo'>Cancel</a>

        </form>
    </div>
    <script>
        function validateForm() {
            var title = document.getElementById("publication_title").value;
            var text = document.getElementById("publication_text").value;
            if (title.trim() === '' || text.trim() === '') {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
