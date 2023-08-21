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

    public function deleteTodo($id) {
        $todo = Todo::find($id); 
        
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
    
        $todo->delete(); 
    
        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
    
}
