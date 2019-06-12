<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Readers</title>
</head>
<body>

    <div class="row">

        <div class="col-md-12">
            <br>
            <h3>Edit book</h3>
            <form method="post" action="{{action('BooksController@update', $id)}}">
                {{csrf_field()}}
                <!--<input type="hidden" name="_method" value="PATCH"/>-->
                <div class="form-group">
                    <input type="text" name="titlu" class="form-control" value={{$book->titlu}} placeholder="Titlu"/>
                </div>
                <div class="form-group">
                    <input type="text" name="autor" class="form-control" value={{$book->autor}} placeholder="Autor"/>
                </div>
                <div class="form-group">
                    <input type="date" name="readon" class="form-control" value={{$book->readon}} placeholder="Readon"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edit"/>
                </div>
            </form>
        </div>
    </div>

</body>
</html>