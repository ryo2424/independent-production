@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')

<head><link rel="stylesheet" href="{{ asset('css/app.css') }}"></head>

    <h1 style="margin-bottom:30px;">商品一覧</h1>

<style>
    .box select{
        width: 120px;
    }
</style>




@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>カテゴリー</th>
                                <th>値段</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td><img src="{{ Storage::url($item->file_path)}}" width="100px"></td>
                                    <td>
                                    <a href="{{url('edit')}}/{{$item->id}}" class="btn btn-info">編集</a>
                                    </td>
                                    <td>
                                    <form action="{{ url('Items/'.$item->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-Item-{{ $item->id }}" class="btn btn-info">
                                            <i class="deletebutton" >削除</i>
                                        </button>
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
@stop

@section('css')
@stop

@section('js')
@stop
