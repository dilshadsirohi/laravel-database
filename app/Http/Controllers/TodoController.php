<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    public function submitForm(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        
        // Do something with the submitted data, like saving to a database
        $todo = new Todo();
        $todo->title = $title;
        $todo->description = $description;
        $todo->save();
        
        $allData = Todo::all();
        // dd($allData);

        // return redirect('/dashboard',['allData',$allData])->with('success', 'Form submitted successfully!');
        return view('/dashboard',['allData'=>$allData]);
    }
   

    
}
