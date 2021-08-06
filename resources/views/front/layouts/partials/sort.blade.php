<form class="col-auto" id="sort-form">
    <select name="sort" id="sort" class="form-select">
        <option value="1" selected disabled>
            Filter by
        </option>
        <option value="name" {{request()->get('sort') == 'name' ? 'selected' : ''}}>
            Name
        </option>
        <option value="date" {{request()->get('sort') == 'date' ? 'selected' : ''}}>
            Date
        </option>
    </select>
    <input type="hidden" value="{{request()->get('attribute')}}" name="attribute">
    <input type="hidden" value="{{request()->get('brand')}}" name="brand">
    <input type="hidden" value="{{request()->get('available')}}" name="available">

</form>
