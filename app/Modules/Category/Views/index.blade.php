@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Vocabularies list -->
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                    <div class="nav-actions float-right">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus"></i>
                            {{ __('Add') }}
                        </a>
                    </div>
                </div>

                @include('includes.result_messages')

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">ID родительской категории</th>
                            <th scope="col">External ID</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->parent_id }}
                                </td>
                                <td>{{ $item->external_id }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $item) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $item) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
