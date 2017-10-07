
<div class="col-sm-12">
<ul>
@foreach($user->permissions as $perm)

<li>
    {{ $perm->display_name }}
</li>
@endforeach
</ul>
</div>

