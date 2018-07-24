@if (session('message') AND session('status'))
    <div class="alert alert-{{ strtolower(session('status')) }}">
        {{ session('message') }}
    </div>
@endif
