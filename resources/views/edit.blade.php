@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ url('update') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group row col-md-6">
                    <label for="title" class="col-sm-2 col-form-label">Title *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title', $reminder->title ?? '')  }}">
                        <input type="hidden" name="id" value="{{ $reminder->id ?? '' }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row col-md-6">
                    <label for="description" class="col-sm-2 col-form-label">Description *</label>
                    <div class="col-sm-10">
                        <textarea class="form-control mt-2" name="description" id="description">{{ $reminder->description ?? '' }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row col-md-6">
                    <label for="datetime" class="col-sm-2 col-form-label">Datetime *</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control mt-2" name="datetime" id="datetime"
                            value="{{ $reminder->datetime ?? '' }}">
                        @if ($errors->has('datetime'))
                            <span class="text-danger">{{ $errors->first('datetime') }}</span>
                        @endif
                    </div>
                </div>

                <button type="submit" id="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection
