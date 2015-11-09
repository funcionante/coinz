@if(Session::has('alert_success'))
    <div class="alert alert-success" role="alert" id="alert">
        {{ session('alert_success') }}
    </div>
@endif