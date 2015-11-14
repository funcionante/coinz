@if(Session::has('alert-message'))
    <div class="alert {{ Session::get('alert-type', 'alert-info') }}" role="alert" @unless(Session::has('alert-important')) id="hide-after-delay" @endunless>
        {{ session('alert-message') }}
    </div>
@endif