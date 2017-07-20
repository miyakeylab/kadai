<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
    <!-- Bootstrap の定形コード... -->
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books_reg') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 本のタイトル -->
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">Book Name</label>
                <div class="col-sm-6">
                    <input type="text" name="item_name" id="book-name"class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">ページ数</label>
                <div class="col-sm-6">
                    <input type="number" name="item_page" id="item-page"class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">平均読了時間</label>
                <div class="col-sm-6">
                    <input type="number" name="item_time" id="item-time"class="form-control">
                </div>
            </div>
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i>保存
                    </button>
                </div>
            </div>
        </form>
        @if (count($books) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">現在の本 </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead> 
                    <th>本一覧</th>
                    <th>ページ数</th>
                    <th>平均読了時間</td>
                    <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <!-- 本タイトル -->
                            <td class="table-text">
                                <div>{{ $book->item_name }}
                                </div>
                            </td>
                            <td>
                                <div>{{ $book->item_page }}
                                </div>
                            </td>
                            <td>
                                <div>{{ $book->item_time }}
                                </div>
                            </td>
                            <td>
                                <form action="{{ url('books_mod/'.$book->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-warning"> <i class="glyphicon glyphicon-refresh"></i> 
                                        更新
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('books_reg/'.$book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> 
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
<!-- Book: 既に登録されてる本のリスト -->
    </div>
    
    <!-- Book: 既に登録されてる本のリスト -->
@endsection