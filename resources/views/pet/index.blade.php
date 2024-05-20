<html>
    <head>
        <title>Pet Store</title>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    </head>

    <body>
        <div style="width: 100vw">
            <h1>GetAll</h1>
            <form method="get" action="api/pet/" id="getAllForm">
                <label for="getAllFormStatus">Status</label><br>
                <select name="status" id="getAllFormStatus" multiple>
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="pending">Pending</option>
                </select>
                <input type="submit" value="Zapisz">
            </form>
            <textarea id="getAllResponse">

            </textarea>
        </div>

        <div style="width: 100vw">
            <h1>GetOne</h1>
            <form method="get" action="api/pet/" id="getOneForm">
                <label for="getOneId">ID</label><br>
                <input type="number" name="id" id="getOneId"/>
                <input type="submit" value="Zapisz">
            </form>
            <textarea id="getOneResponse">

            </textarea>
        </div>

        <div style="width: 100vw">
            <h1>Store</h1>
            <form method="post" action="api/pet/store" id="storeForm">
                <label for="storeFormName">Name</label>
                <input type="text" name="name" id="storeFormName"/>
                <br>

                <label for="storeFormStatus">Status</label>
                <select name="status" id="storeFormStatus">
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="pending">Pending</option>
                </select>
                <br>

                <label for="storeFormURL">Photo URL</label>
                <input type="text" name="photoUrls[0]" id="storeFormURL"/>
                <br>

                <label for="storeFormTagID">Tag ID</label>
                <input type="number" name="tags[0][id]" id="storeFormTagID"/>
                <br>

                <label for="storeFormTagName">Tag Name</label>
                <input type="text" name="tags[0][name]" id="storeFormTagName"/>
                <br>

                <input type="submit" value="Zapisz">
                <br>
            </form>
            <textarea id="storeResponse">

            </textarea>
        </div>


        <div style="width: 100vw">
            <h1>Update</h1>
            <form method="get" action="api/pet/" id="updateForm">
                <label for="updateId">ID</label>
                <input type="number" name="id" id="updateId"/>
                <br>

                <label for="updateFormName">Name</label>
                <input type="text" name="name" id="updateFormName"/>
                <br>

                <label for="updateFormStatus">Status</label>
                <select name="status" id="updateFormStatus">
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="pending">Pending</option>
                </select>
                <br>

                <label for="updateFormURL">Photo URL</label>
                <input type="text" name="photoUrls[0]" id="updateFormURL"/>
                <br>

                <label for="updateFormTagID">Tag ID</label>
                <input type="number" name="tags[0][id]" id="updateFormTagID"/>
                <br>

                <label for="updateFormTagName">Tag Name</label>
                <input type="text" name="tags[0][name]" id="updateFormTagName"/>
                <br>

                <input type="submit" value="Zapisz">
                <br>
            </form>
            <textarea id="updateResponse">

            </textarea>
        </div>

        <div style="width: 100vw">
            <h1>Delete</h1>
            <form method="get" action="api/pet/" id="deleteForm">
                <label for="deleteId">ID</label>
                <input type="number" name="id" id="deleteId"/>
                <input type="submit" value="Zapisz">
            </form>
            <textarea id="deleteResponse">

            </textarea>
        </div>

        <div style="width: 100vw">
            <h1>Error</h1>
            <textarea id="error">

            </textarea>
        </div>


    <script>
        $(document).ready(function (){
            $("#getAllForm").submit(function (e){
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                $.ajax({
                    type: "GET",
                    url: actionUrl,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#error").val(null);
                        $("#getAllResponse").val(JSON.stringify(data, null, 2)); // show response from the php script.
                    },
                    error: function (data){
                        $("#error").val(JSON.stringify(data, null, 2));
                    }
                });
            })

            $("#getOneForm").submit(function (e){
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                var id = $("#getOneId").val()
                $.ajax({
                    type: "GET",
                    url: actionUrl + id,
                    success: function(data)
                    {
                        $("#error").val(null);
                        $("#getOneResponse").val(JSON.stringify(data, null, 2)); // show response from the php script.
                    },
                    error: function (data){
                        $("#error").val(JSON.stringify(data, null, 2));
                    }
                });
            })

            $("#storeForm").submit(function (e){
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form.serialize(),
                    success: function(data)
                    {
                        $("#error").val(null);
                        $("#storeResponse").val(JSON.stringify(data, null, 2)); // show response from the php script.
                    },
                    error: function (data){
                        $("#error").val(JSON.stringify(data, null, 2));
                    }
                });
            })

            $("#updateForm").submit(function (e){
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                var id = $("#updateId").val()
                $.ajax({
                    type: "POST",
                    url: actionUrl+id,
                    data: form.serialize(),
                    success: function(data)
                    {
                        $("#error").val(null);
                        $("#updateResponse").val(JSON.stringify(data, null, 2)); // show response from the php script.
                    },
                    error: function (data){
                        $("#error").val(JSON.stringify(data, null, 2));
                    }
                });
            })

            $("#deleteForm").submit(function (e){
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                var id = $("#deleteId").val()
                $.ajax({
                    type: "GET",
                    url: actionUrl + id,
                    success: function(data)
                    {
                        $("#error").val(null);
                        $("#deleteForm").val(JSON.stringify(data, null, 2)); // show response from the php script.
                    },
                    error: function (data){
                        $("#error").val(JSON.stringify(data, null, 2));
                    }
                });
            })
        });

    </script>
    </body>
</html>
