@extends('layouts.master')

@section('title')  @endsection

@section('css')

@endsection

@section('content')
    <div class="container">
        <h1>PHP task</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('store') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL"
                               aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Generate Shorten Link</button>
                        </div>
                    </div>
                    @error('link')
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="day">Day</label><br>
                        <select name="day" id="day" class="form-control" >
                            @for($i = 1;$i<365;$i++)
                                <option value="{{ $i }}" @selected(old('day', 90) == $i)>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    @error('day')
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

                @if (Session::has('expired'))
                    <div class="alert alert-danger">
                        <p>{{ Session::get('expired') }}</p>
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
                            <td><a href="{{ route('show', $row->code) }}"
                                   target="_blank">{{ route('show', $row->code) }}</a></td>
                            <td>{{ $row->link }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('js')

@endsection
