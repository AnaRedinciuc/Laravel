<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Readers</title>
</head>
<body>
<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">For Real Readers</h1>
                    <p class="lead">Applicatie web pentru iubitorii de carti</p>
                </div>
                <div>
                    <div class="col-md-6">
                        <img src="img/read2.png" alt="Books">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <form action="{{route('books.create')}}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Titlu: </label>
                        <input type="text" name="titlu" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Autor: </label>
                        <input type="text" name="autor" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Read on: </label>
                        <input type="date" name="readon" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success w-50 float-md-right" >Add book</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Titlu</th>
                    <th>Autor</th>
                    <th>Citita la data de</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->titlu}}</td>
                        <td>{{$book->autor}}</td>
                        <td>{{$book->readon}}</td>
                        <td>
                            <a href="{{action('BooksController@edit', $book->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{action('BooksController@destroy', $book->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>