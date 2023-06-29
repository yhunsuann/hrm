@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
