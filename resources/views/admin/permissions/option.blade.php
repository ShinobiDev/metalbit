@foreach ($permissions as $id => $name)
    <div class="checkbox">
        <label>        	
          <input type="checkbox" name="permissions[]" value="{{$name}}"
            {{ $model->permissions->contains($id)
              || collect( old( 'permissions' ))->contains($name) ?  'checked' : ''}}>
            {{$name}}
        </label>
    </div>
@endforeach
