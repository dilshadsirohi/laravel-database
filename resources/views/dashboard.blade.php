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
                <form action="/todo" method="post">
                @csrf
                <input type="text" name="title">
                  <input type="text" name="description">
                  <button type="submit">Add To List</button>

                </form>
                
            </div>
        </div>
        @foreach ($allData as $data)
        {{$data->title}}
            
        @endforeach
        
    </div>
</x-app-layout>
