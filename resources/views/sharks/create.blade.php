<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
        <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
    </ul>
</nav>

<h1>Create a shark</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif

<form action="{{ route('shark.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input 
            type="text" 
            name="name" 
            id="name"
            value="{{ old('name') }}" 
            class="form-control"
        >
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input 
            type="text" 
            name="email" 
            id="email"
            value="{{ old('email') }}" 
            class="form-control"
        >
    </div>

    <div class="form-group">
        <label for="shark_level">Shark Level</label>
        <select 
            name="shark_level" 
            id="shark_level"
            value="{{ old('shark_level') }}" 
            class="form-control"
        >
            <option value="0">Select a Level</option>
            <option value="1">Sees Sunlight</option>
            <option value="2">Foosball Fanatic</option>
            <option value="3">Basement Dweller</option>
        </select>
    </div>
    
    <button 
        type="submit"
        class="btn btn-primary"
    >
        Create the shark!
    </button>
</form>

</div>
</body>
</html>