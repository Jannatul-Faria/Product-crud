@extends('backend.Layouts.entry')
@section('content')
    <div class="height-100v d-flex align-items-center justify-content-center">
        <div class="card card-authentication1 mx-auto my-4">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="assets/images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Email Address</div>
                    <form>

                        <div class="form-group">
                            <label for="exampleInputEmailId" class="sr-only">Email</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="exampleInputEmailId" class="form-control input-shadow"
                                    placeholder="Enter Your Email ID">
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
                        <div class="text-center mt-3">Next</div>
                    </form>
                </div>
            </div>
            {{-- <div class="card-footer text-center py-3">
            <p class="text-warning mb-0">Already have an account? <a href="{{ route('login') }}"> Sign In here</a></p>
        </div> --}}
        </div>
    </div>
@endsection
