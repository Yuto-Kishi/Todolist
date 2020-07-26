<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Todo;
use App\History;
use Carbon\Carbon;

class TodoController extends Controller
{
     public function add()
  {
      return view('admin.todo.create');
  }
  
  
     public function create(Request $request)
  {
      
      $this->validate($request, Todo::$rules);
      
      $todo = new Todo;
      $form = $request->all();
      
      unset($form['_token']);
      $todo->fill($form);
      $todo->save();
      
      return redirect('admin/todo/create');
     
  }
     public function index(Request $request)
     {
         $cond_title = $request->cond_title;
         if ($cond_title != '') {
             
             $posts = Todo::where('title','like','%'.$cond_title.'%')->get();
         } else {
             $posts = Todo::all();
         }
         return view('admin.todo.index', ['posts' => $posts, 'cond_title' => $cond_title]);
     }
     
     public function edit(Request $request)
     {
         $todo = Todo::find($request->id);
         if (empty($todo)) {
             abort(404);
         }
         return view('admin.todo.edit', ['todo_form' => $todo]);
     }
     
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Todo::$rules);
      
      $todo = Todo::find($request->id);
      // 送信されてきたフォームデータを格納する
      $todo_form = $request->all();
      unset($todo_form['_token']);

      // 該当するデータを上書きして保存する
      $todo->fill($todo_form)->save();
      
      $history = new History;
      $history->todo_id = $todo->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/todo');
  }
     public function delete(Request $request)
     {
      
      $todo = Todo::find($request->id);
      // 削除する
      $todo->delete();
      return redirect('admin/todo/');
     }  

  
}
