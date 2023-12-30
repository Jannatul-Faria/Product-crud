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
                        <div class="card-title">Sell Product</div>
                        <hr>
                        <form method="POST" action="{{ route('admin.soldStore', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <p class="text-danger">{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="number">Quantity</label>
                                <input type="number" class="form-control" id="number" name="quantity"
                                    value="{{ old('quantity', $product->quantity) }}">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="number">Category</label>
                                <input type="number" class="form-control" id="number" name="category"
                                    value="{{ old('category', $product->category) }}">
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}


                            <div class="form-group">
                                <a href=""> <button type="submit" class="btn btn-light px-5">
                                        sell</button></a>

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
