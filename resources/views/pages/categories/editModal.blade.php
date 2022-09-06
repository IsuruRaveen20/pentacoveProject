
<form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="inp_Category">Category</label>
                <input type="text" name="title" class="form-control" id="inp_category" aria-describedby="inp_category" value="{{ $category->title }}"
                    placeholder="Enter Category" required>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group">
                <h6 class="text-center responsive-mobile">
                    <button id="submit-btn" type="submit" class="btn btn-info">
                        Update Category
                    </button>
                </h6>
            </div>
        </div>
    </div>
</form>
