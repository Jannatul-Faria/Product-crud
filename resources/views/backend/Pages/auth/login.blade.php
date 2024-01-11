@extends('backend.Layouts.entry')
@section('content')
    {{-- <div class="loader-wrapper">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}

    <div class="height-100v d-flex align-items-center justify-content-center">
        <div class="card card-authentication1 mb-0">

            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        {{-- <img src="assets/images/logo-icon.png" alt="logo icon"> --}}
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Login In</div>
                    <form>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="email" class="form-control input-shadow"
                                    placeholder="Enter Your Email ID">
                                <div class="form-control-position">
                                    <i class="icon-envelope-open"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password" class="form-control input-shadow"
                                    placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="icheck-material-white">
                                    <input type="checkbox" id="user-checkbox" checked="" />
                                    <label for="user-checkbox">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group col-6 text-right">
                                <a href="{{ url('/sendOtp') }}">Reset Password</a>
                            </div>
                        </div>
                        <button onclick="SubmitLogin()" class="btn btn-light btn-block">Sign In</button>
                        <div class="text-center mt-3">Sign In With</div>

                        <div class="form-row mt-4">
                            <div class="form-group mb-0 col-6">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i>
                                    Facebook</button>
                            </div>
                            <div class="form-group mb-0 col-6 text-right">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i>
                                    Twitter</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-warning mb-0">Do not have an account? <a href="{{ url('/userRegistation') }}"> Register
                        here</a>
                </p>
            </div>
        </div>
    </div>
    <script>
        // async function SubmitLogin() {
        //     let email = document.getElementById('email').value;
        //     let password = document.getElementById('password').value;

        //     if (email.length === 0) {
        //         errorToast("Email is required");
        //     } else if (password.length === 0) {
        //         errorToast("password is required");
        //     } else {
        //         showLoader();
        //         let res = await axios.post("/userLogin", {
        //             email: email,
        //             password: password
        //         });
        //         hideLoader()
        //         if (res.status === 200 && res.data['status'] === 'success') {
        //             wwindow.location.href = "/userProfile";
        //         } else {
        //             errorToast(res.data['message']);
        //         }
        //     }
        // }

        async function SubmitLogin() {
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

            if (email.length === 0) {
                errorToast("Email is required");
            } else if (password.length === 0) {
                errorToast("Password is required");
            } else {
                showLoader();
                let res = await axios.post("/userLogin", {
                    email: email,
                    password: password
                });
                hideLoader()
                if (res.status === 200 && res.data['status'] === 'success') {
                    setToken(res.data['token'])
                    window.location.href = "/userProfile";
                } else {
                    errorToast(res.data['message']);
                }
            }
        }
    </script>
@endsection
