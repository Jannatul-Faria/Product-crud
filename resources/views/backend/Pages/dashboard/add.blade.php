@extends('backend.Layouts.app')
@section('content')
    <div class="container-fluid">

        <div class="form-group text-right">
            <a href="{{ route('admin.tables') }}"><button type="submit" class="btn btn-light px-5">
                    <i class="fa fa-backward"></i> Back table</button></a>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Add Product</div>
                        <hr>
                        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ old('description') }}">
                                @error('description')
                                    <p class="text-danger">{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger">{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="number">Quantity</label>
                                <input type="number" class="form-control" id="number" name="quantity"
                                    value="{{ old('quantity', 'quantity') }}">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="category">category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="{{ old('cloths', 'cloths') }}" selected>Cloths</option>
                                    <option value="{{ old('beauty', 'beauty') }}">beauty products</option>
                                    <option value="{{ old('food', 'food') }}">food</option>

                                </select>
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" value="image">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="public"><input type="radio" name="status" id="public" value="public">
                                    Published</label>

                                <label for="draft" class="px-3"> <input type="radio" id="draft" name="status"
                                        value="draft">Draft</label>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="form-group py-2">
                                <div class="icheck-material-white">
                                    <input type="checkbox" id="checkbox" value="checkbox" name="checkbox">
                                    <label for="checkbox">Checked all</label>
                                </div>
                                @error('checkbox')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5">
                                    add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div><!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->
@endsection
