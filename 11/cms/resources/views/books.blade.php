<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
    <!-- Bootstrap の定形コード... -->
    
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
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
                                <form action="{{ url('books/'.$book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success"> <i class="glyphicon glyphicon-save"></i> 
                                        スケジュール登録
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