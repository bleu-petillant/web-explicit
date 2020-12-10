@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <ul class="list-unstyled mb-2 mt-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
