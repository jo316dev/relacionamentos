@if ($errors->any())
   
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach   
    </div>

@endif

@if (session('success'))

    <div class="alert alert-info">
        {{ session('success') }}
    </div>
    
@endif

@if (session('error'))

    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
    
@endif