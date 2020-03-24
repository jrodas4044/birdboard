<html>
<body>
    <h1>Create a Project</h1>

    <form method="post" action="/projects">
        @csrf
        <div class="field">
            <label for="">title</label>
            <div class="control">
                <input type="text" name="title">
            </div>
        </div>

        <div class="field">
            <label for="">Description</label>
            <div class="control">
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <button type="submit"></button>
    </form>
</body>
</html>
