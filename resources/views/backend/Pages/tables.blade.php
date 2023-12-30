  <div class="container-fluid">

      <div class="buttons text-right my-3">
          <a href="{{ route('admin.add') }}"><button type="submit" class="btn btn-light p-2 mx-3 ">
                  Add Products</button></a>
          <a href="{{ route('admin.sold') }}"><button type="submit" class="btn btn-light p-2 ">
                  Sold Products</button></a>
      </div>

      {{-- successful message --}}
      @section('success')
          <div class="bg-success">
              {{ session('seccess') }}
          </div>
      @endsection


      <div class="row mt-5">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Product Table</h5>
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Products</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">category</th>
                                      <th colspan="3" class="text-center">action</th>
                                      {{-- <th scope="col"></th> --}}
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($products as $product)
                                      <tr>
                                          <td>{{ $product->id }}</td>
                                          <td>{{ ucwords($product->name) }} </td>
                                          <td>{{ ucwords($product->price) }} </td>
                                          <td>{{ ucwords($product->quantity) }} </td>
                                          <td>{{ $product->category }} </td>
                                          <td>
                                              <a href="{{ route('admin.edit', $product->id) }}">
                                                  <button type="submit" class="btn btn-light px-3 mx-2">
                                                      edit</button>
                                              </a>
                                          </td>
                                          <td>
                                              <a href="{{ route('admin.sell', $product->id) }}">
                                                  <button type="submit" class="btn btn-success px-3 ">
                                                      sell</button>
                                              </a>
                                          </td>
                                          <td>
                                              <form action="{{ route('admin.delete', $product->id) }}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger p-2 mx-2">
                                                      delete</button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach




                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

      </div><!--End Row-->




      <!--start overlay-->
      <div class="overlay toggle-menu"></div>
      <!--end overlay-->

  </div>
  <!-- End container-fluid-->
