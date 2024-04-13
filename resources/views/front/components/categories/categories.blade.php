@foreach ($favCategories as $category)
    <div class="col-md-3 cate-box-home" data-id="{{ $category->id }}">
        <a href="javascript:void(0);" title="Drag for order change">
            <div style="background-color: #7BAB47;" class="category-main-box">
                <div class="category-img">
                    <img src="{{ asset('uploads/category/' . @$category->category->photo->file) }}">
                </div>
                <h5 class="text-white text-16 mb-0">{{ $category->category->title }}</h5>
            </div>
        </a>
    </div>
@endforeach
