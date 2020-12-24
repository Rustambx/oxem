@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Vocabularies list -->
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                    <div class="nav-actions float-right">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-outline-primary">
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
                            <th scope="col">Описание</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Остаток товара на складе</th>
                            <th scope="col">Категории </th>
                            <th scope="col">External ID</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $item->price }}
                                </td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>
                                    @foreach($item->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                                <td>{{ $item->external_id }}</td>
                                <td>
                                    <a href="{{ route('product.edit', $item) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('product.destroy', $item) }}" method="post">
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
