<option selected value="">Select a category</option>
@foreach ($categories as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach