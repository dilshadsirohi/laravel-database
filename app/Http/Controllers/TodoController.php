<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    public function authQuery()
    {
        $userId = auth()->user()->id;
        $allData = Todo::where('user_id',$userId)->get();
        return $allData;
    }

    public function submitForm(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        
       
        $todo = new Todo();
        $todo->title = $title;
        $todo->description = $description;
        $todo->user_id = auth()->user()->id;
        $todo->save();
        
       
        $allData = $this->authQuery();

     
        return redirect('/dashboard')->with('allData',$allData);
       
    }
   public function showDashboard(Request $request)
   {

    $allData = $this->authQuery();
     return view('/dashboard',['allData'=>$allData]);
   
    }

    public function deleteTodo(Request $request) {
        $id = $request->id;
              
         $todo = Todo::find($id); 

         $todo->delete(); 
         return redirect('/dashboard');
        
    }
    public function editTodo(Request $request)
    {
        $allData = $this->authQuery();
        $id = $request->id;
        $editData = Todo::findOrFail($id);
      
         return view('/dashboard', compact('editData','allData'));

    }
    public function updateTodo(Request $request)
    {
        $id = $request->id;
        $title = $request->input('title');
        $description = $request->input('description');
       
        $post = Todo::find($id);
        $post->title = $title;
        $post->description = $description;
        $post->save();

        
        return redirect('/dashboard');
    }
    
}
