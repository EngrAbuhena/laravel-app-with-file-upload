<!doctype html>
<html lang=""{{ str_replace('_', '-', app()->getLocale()) }}"">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="panel panel-primary">
<br>
        <div class="panel-heading">
            <h2>Laravel 10 File Upload Example</h2>
        </div>
<br>
        <br>
        <div class="panel-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="inputFile">File:</label>
                    <input
                        type="file"
                        name="file"
                        id="inputFile"
                        class="form-control @error('file') is-invalid @enderror">

                    @error('file')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>
