<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Albums</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('albums.create') }}"> Create New Albums</a>
                </div>
            </div>
        </div>
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <th scope="row">{{ $album->id }}</th>
                        <td>{{ $album->name }}</td>
                        <td>
                          <ul>
                            @foreach ($album->medias as $media)
                            <li>{{$media->name}}-- <img src="{{$media->image}}" alt="{{$media->name}}"></li>
                            @endforeach
                          </ul>
                      </td>
                        <td><a href="{{ route('albums.edit', $album) }}">Edit</a></td>
                        <td>
                        <form action="{{ route('albums.destroy',$album->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
      
                          <button type="submit" class="btn btn-danger">Delete</button>
      
                      </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
