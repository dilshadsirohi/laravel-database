<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        
    </div>

    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <div class="p-6 text-gray-900">
                    <p>To-do List</p>
                @if(isset($editData))
                <form action="/updatetodo/{{$editData->id}}" method="post">
                @csrf
               
                <input type="text" name="title" placeholder="title" value="{{$editData->title}}">
                  <input type="text" name="description" placeholder="description" value="{{$editData->description}}">
                  <button type="submit">Update</button>

                </form>
                @else
                <form action="/dashboard" method="post">
                    @csrf
                   
                    <input type="text" name="title" placeholder="title">
                      <input type="text" name="description" placeholder="description">
                      <button type="submit">Add To List</button>
    
                    </form>
                    @endif
             

                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($allData as $data)
                <tr>
                <td> {{$loop->index+1}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->created_at}}</td>
                <td><a href='dashboard-edit/{{ $data->id }}'>Edit</a>|
                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="dashboard/{{ $data->id }}">Delete<i class="fa fa-trash"></i></a>
                </td>
                </tr>   
                @endforeach
                    </tbody>
            
                  </table>
                 
            </div>
        </div>
       
  
    </div>
</x-app-layout>
