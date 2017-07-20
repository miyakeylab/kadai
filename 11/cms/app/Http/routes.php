<?php
use App\Books; 
use App\Schedule;
use Illuminate\Http\Request; 
use Carbon\Carbon;
/** 
* 本 のダッシュボード 表示 
*/ 
Route::get('/', function () {
    
    $books = Books::orderBy('created_at', 'asc')->get();
    return view('books', ['books' => $books]);
	 //
//	 return view('books');
}); 

/**
* 新 「本」 を 追加 
*/ 
Route::post('/books_reg', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
        // Eloquent モデル
    $books = new Books;
    $books->item_name = $request->item_name;
    $books->item_number = '1';
    $books->item_amount = '1000';
    $books->item_page = $request->item_page;
    $books->item_time = $request->item_time;
    $books->published = Carbon::now();
    $books->save();   //「/」ルートにリダイレクト 
    return redirect('/books_reg');
}); 

/**
* 本 を 削除 
*/ 
Route::delete('/books_reg/{book}', function (Books $book) {
    $book->delete();
    return redirect('/books_reg');
});
/**
 * 登録画面へ遷移
 */
Route::get('/books_reg', function () {
    
    $books = Books::orderBy('created_at', 'asc')->get();
    
    return view('books_reg', ['books' => $books]);
	
}); 
/** 
* 更新画面へ遷移
*/ 
Route::get('/books_mod/{book}', function (Books $book) {
    
    return view('books_mod', ['books' => $book]);
}); 
/**
* 「本」 を 更新 
*/ 
Route::post('/books_mod', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
        // Eloquent モデル
    $books = Books::find($request->item_id);
    $books->item_name = $request->item_name;
    $books->item_page = $request->item_page;
    $books->item_time = $request->item_time;
    $books->published = Carbon::now();
    $books->save();   //「/」ルートにリダイレクト 
    return redirect('/books_reg');
}); 
/** 
* スケジュール 表示 
*/ 
Route::get('/my_schedule', function () {
    
    return view('my_schedule');

}); 