@foreach($perms as $perm)

<div class="col-sm-4">
    <input type="checkbox" name="permissoes[]" value="{{ $perm->id }}" {{ $user->hasPermission($perm->name) ? 'checked':'' }}> {{ $perm->display_name }}

</div>

@endforeach
