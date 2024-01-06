@extends('backend.Layouts.entry')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
        <title>Document</title>
    </head>
    <style>
        .otp-field {
            flex-direction: row;
            column-gap: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .otp-field input {
            height: 45px;
            width: 42px;
            border-radius: 6px;
            outline: none;
            font-size: 1.125rem;
            text-align: center;
            border: 1px solid #d1cece;
        }

        .otp-field input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .otp-field input::-webkit-inner-spin-button,
        .otp-field input::-webkit-outer-spin-button {
            display: none;
        }

        .resend {
            font-size: 12px;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            right: 10px;
            color: black;
            font-size: 12px;
            text-align: right;
            font-family: monospace;
        }

        .footer a {
            color: black;
            text-decoration: none;
        }
    </style>

    <body>

        <div class="height-100v d-flex align-items-center justify-content-center">
            <div class="card card-authentication1 mb-0">
                <div class="card-body">
                    <div class="card-body p-5 text-center">
                        <h4>Verify</h4>
                        <p>Your code was sent to you via email</p>

                        <div class="otp-field mb-4">
                            <input type="number" />
                            <input type="number" disabled />
                            <input type="number" disabled />
                            <input type="number" disabled />
                            <input type="number" disabled />
                            <input type="number" disabled />
                        </div>

                        <button class="btn btn-primary mb-3">
                            Verify
                        </button>

                        <p class="resend text-muted mb-0">
                            Didn't receive code? <a href="">Request again</a>
                        </p>
                    </div>
                </div>
                <div class="card-footer text-center py-3">
                    {{-- <p class="text-warning mb-0">Return to the <a href="{{ route('admin') }}"> Sign In</a></p> --}}
                </div>
            </div>
        </div>



    </body>

    </html>
@endsection
