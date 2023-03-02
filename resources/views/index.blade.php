@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('create') }}" class="btn btn-primary btn-lg">Add</a>
        <div class="row justify-content-center">
            <div class="alert1 alert-success  mb-1 mt-1"></div>
            @if (session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->title }}</td>
                            <td>{{ $reminder->description }}</td>
                            <td>{{ $reminder->datetime }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('edit', $reminder->id) }}">Edit</a>
                                <a href="javascript:void(0)" data-url="{{ route('delete', $reminder->id) }}"
                                    class="btn btn-danger delete-reminder">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center">No records found</td>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".alert-success").delay(3000).slideUp(300);
        });
        $(document).on('click', '.delete-reminder', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);

            if (confirm("Are you sure you want to delete this reminder?") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.status);
                        trObj.parents("tr").remove();
                        $('.alert1').addClass('alert');
                        $('.alert1').html(data.status);
                        location.reload();
                    }
                });
            }

        });
    </script>
@endsection
