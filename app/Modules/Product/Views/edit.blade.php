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
                        <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            @method('PUT')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Название</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="name" placeholder="Text" value="{{ $product->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Описание</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="" cols="70" rows="10">{{ $product->desciption }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Цена</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="price" placeholder="Text" value="{{ $product->price }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Остаток товара на складе</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="quantity" placeholder="Text" value="{{ $product->quantity }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Внешний код</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="external_id" placeholder="Text" value="{{ $product->external_id }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Категории</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="categories[]" multiple id="">
                                        <option value="0">Выберите категорию</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
