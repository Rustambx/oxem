@extends('layouts.site')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $title }}</strong>
                    </div>
                    <div class="card-body card-block">
                        @include('includes.result_messages')
                        <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            @method('PUT')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Название</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="name" placeholder="Text" value="{{ $category->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Внешний код</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="external_id" placeholder="Text" value="{{ $category->external_id }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Родительская категория</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="parent_id" id="">
                                        <option value="0">Родитель</option>
                                        @if(isset($categories))

                                            @foreach($categories as $item)
                                                <option value="{{ $item->id }}" @if($category->parent_id == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <input type="submit" value="Сохранить" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
