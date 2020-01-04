
    <head>
        <h3 class="text-center text-success"></h3>
    </head>


    <body>


    {!!Form::open(['url'=>'/save_excel','method'=>'POST','enctype'=>'multipart/form-data'])!!}
    <h3 class="text-success text-center">{{Session::get('message')}}</h3>

    <div class="form-group">
        <label for="category">Upload File</label>
        <input id="excel_file" name="excel_file" class="form-control" type="file">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    {!!Form::close()!!}

    </body>

    </html>
