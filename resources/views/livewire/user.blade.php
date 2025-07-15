<div>
    <div class="container mx-auto mt-5">
        <h1>User page</h1>
        <h3>Total user : {{ count($users) }}</h3>
        <button class="bg-indigo-400 rounded-md px-3 py-2 my-4 text-green-200 hover:bg-indigo-600"
            wire:click='createUser'>
            Add data
        </button>
        <ol class="mt-5 list-decimal">
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ol>
    </div>
</div>
