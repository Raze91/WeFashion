@if(Session::has('success'))
<div>
    <p class="success">{{Session::get('success')}}</p>
</div>
@endif
@if(Session::has('error'))
<div>
    <p class="error" >{{Session::get('error')}}</p>
</div>
@endif