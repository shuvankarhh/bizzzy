@foreach ($permissions as $idx=>$item)
    <!-- Checked checkbox -->
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="permission[]" id="permission{{ $idx }}" {{ ($item->roles_count > 0) ? 'checked' : '' }}/>
        <label class="form-check-label" for="permission{{ $idx }}">{{ $item->name }}</label>
    </div>    
@endforeach