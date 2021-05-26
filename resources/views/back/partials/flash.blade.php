@if(Session::has('success'))
<div>
    <p class="success">{{Session::get('success')}}</p>
</div>
@endif