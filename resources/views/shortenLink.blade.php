<!DOCTYPE html>
<html>
<head>
    <title>How to create url shortener using Laravel? - Rahim Süleymanov</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">
    <h1>PHP task</h1>

    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{ route('generate-shorten-link.store') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="Enter URL"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Generate Shorten Link</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select name="day" id="day" class="form-control" >
                        @for($i = 1;$i<365;$i++)
                            <option value="{{ $i }}" @selected(old('day', 90) == $i)>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                @error('link')
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </form>
        </div>
        <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shortLinks as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="{{ route('generate-shorten-link.show', $row->code) }}"
                               target="_blank">{{ route('generate-shorten-link.show', $row->code) }}</a></td>
                        <td>{{ $row->link }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
