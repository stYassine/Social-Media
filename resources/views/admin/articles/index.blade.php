@extends('admin.dashboard')


@section('content')

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h5>Articles</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Id</th>
                <th>User Id</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Remove</th>
            </thead>
            <tbody>
                @if(isset($articles))
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->user_id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category_id }}</td>
                            <td>{{ $article->is_active ? 'Active' : 'disActive' }}</td>
                            <td><a href="{{ route('dashboard.photos.edit', ['id' => $article->id]) }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{ route('dashboard.photos.remove', ['id' => $article->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection