
    <form id="filterForm">
       <div class="main-cat-title">
       <h2 class="main-cat-title-inner">Search for bid</h2>
       </div>
       <div class="search_panel">
        <input type="hidden" id="list_type"  name="list_type" value="list">
            <input type="text" id="searchInput" placeholder="Search..." name="search">
            <button class="searchButton" onclick="action_filter()" type="button">Search</button>
        </div>
        <div class="main-cat-title">
       <h2 class="main-cat-title-inner">Select Categories</h2>
       </div>
        <div class="cat-main-1212">
           
            <div class="category-list">


             <!-- Category-1 -->

            @foreach($categories as $category) 

                <div class="category">
                    <input onchange="action_filter()" type="checkbox" name="cat_id[]" id="category{{ $category->id }}" class="category-checkbox" value="{{ $category->id }}">
                    <label for="category{{ $category->id }}" class="category-label">{{ $category->title }}</label>
                    @if(count($category->sub_category) > 0)
                    <div class="subcategories">
                        @foreach($category->sub_category as $sub_cat) 
                        <div class="subcategory">
                            <input onchange="action_filter()" type="checkbox" name="sub_cat_id[]" id="subcategory1-{{ $sub_cat->id }}" class="subcategory-checkbox" value="{{ $sub_cat->id }}">
                            <label for="subcategory1-{{ $sub_cat->id }}" class="subcategory-label">{{ $sub_cat->title }}</label>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            @endforeach
                <!-- category-1-end -->
            </div>
        </div>
        </form>
      
@section('page-js-script')

<script>
    $(document).ready(function() {
       
    });

    
</script>
    @endsection