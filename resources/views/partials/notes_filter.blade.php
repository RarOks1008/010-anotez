<div class="notes_filter">
    <input type="text" class="search_notes" id="search_notes" name="searchtext"/>
    <select name="category_select" id="category_select">
        <option value="0">All</option>
        @foreach( $categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
</div>
