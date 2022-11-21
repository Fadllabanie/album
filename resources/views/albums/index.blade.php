<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                                    <li>{{ $media->name }}-- <img src="{{ $media->image }}" alt="{{ $media->name }}">
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td><a href="{{ route('albums.edit', $album) }}">Edit</a></td>
                        <td>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{ $album->id }}">
                                Delete
                            </button>

                            <div class="modal fade" id="exampleModal{{ $album->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('albums.delete', $album->id) }}" method="POST">
                                            @csrf
                                            <input class="form-check-input" type="hidden" name="album"
                                                value="{{ $album->id }}">
                                            <div class="modal-body">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type"
                                                        id="exampleRadios2" value="delete">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Delete All Images
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type"
                                                        id="exampleRadios2" value="move" onclick="hide()">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Move Images
                                                    </label>
                                                </div>
                                                <div id="myDIV" style="display: none">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputState">State</label>
                                                        <select id="inputState" class="form-control" name="album_id"
                                                            required>
                                                            <option selected>Choose...</option>
                                                            @foreach ($albums as $album)
                                                                <option value="{{ $album->id }}">
                                                                    {{ $album->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submet" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function hide() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>

</html>
