  <div class="container-fluid">

      <div class="buttons text-right my-3">
          <a href="{{ route('admin.tables') }}"><button type="submit" class="btn btn-light p-2 mx-3 ">
                  All Products</button></a>
      </div>
      {{-- <div class="heads text-center">
          <h3 class="">Jannatul's Shop</h3>
      </div> --}}
      <div class="row mt-5">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Sold Product Table</h5>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Products</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">action</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($products as $product)
                                      <tr>
                                          <th>{{ $product->id }}</th>
                                          <td>{{ $product->name }}</td>
                                          <td>{{ $product->price }}</td>
                                          <td>{{ $product->quantity }}</td>
                                          <td>
                                              <button class="active btn btn-success py-2 mx-2">
                                                  sold</button>
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
