@foreach($gruposPermissoes as $grupo => $perms)

<div class="col-sm-4 col-md-3">
    <h4> {{ $grupo }} </h4>
    @foreach($perms as $perm)
    <div class="row col-sm-12">
    <input type="checkbox" name="permissoes[]" value="{{ $perm->id }}" {{ $user->hasPermission($perm->name) ? 'checked':'' }}> {{ $perm->display_name }}
    </div>
    @endforeach
</div>

@endforeach
