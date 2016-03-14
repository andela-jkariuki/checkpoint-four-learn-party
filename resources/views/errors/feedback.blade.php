@if(Session::has('message'))
    <div class="alert alert-{{ Session::has('status') ? Session::get('status') : 'info' }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('message') }}
    </div>
@endif