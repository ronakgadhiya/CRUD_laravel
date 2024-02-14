@extends('layouts.app')
@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form method="POST" action ="\product\store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger"> {{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image"
                                value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="text-danger"> {{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <button type="submit" class = "btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@endsection
