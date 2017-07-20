<!-- resources/views/books_mod.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Bootstrap の定形コード... -->
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books_mod') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 本のタイトル -->
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">Book Name</label>
                <div class="col-sm-6">
                    <input type="text" name="item_name" id="book-name"class="form-control" value={{ $books->item_name }}>
                </div>
            </div>
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">ページ数</label>
                <div class="col-sm-6">
                    <input type="number" name="item_page" id="item-page"class="form-control" value={{ $books->item_page }}>
                </div>
            </div>
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">平均読了時間</label>
                <div class="col-sm-6">
                    <input type="number" name="item_time" id="item-time"class="form-control" value={{ $books->item_time }}>
                </div>
            </div>
             <input type="hidden" name="item_id" id="item-id"class="form-control" value={{ $books->id }}>
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-refresh"></i>更新
                    </button>
                </div>
            </div>
        </form>
<!-- Book: 既に登録されてる本のリスト -->
    </div>
    
    <!-- Book: 既に登録されてる本のリスト -->
@endsection    