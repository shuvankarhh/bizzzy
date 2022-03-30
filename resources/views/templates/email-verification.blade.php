<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{asset('/css/vendor/bootstrap_v5-0-2/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <style>
        .verify{
            border: 1px solid green;
            padding: 15px 100px 15px 15px;
            border-radius: 15px;
        }
        .mb-2{
            margin-bottom: 20px
        }
        .mb-3{
            margin-bottom: 30px
        }

        .mt-3{
            margin-top: 30px
        }
        .row{display: grid;}
        .text-center{
            margin: auto;
        }
        a{
            text-decoration: none;
            color: white !important;
            padding: 9px 100px 9px 100px;
            background-color: #14A800;
            border-color: #14A800;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body" >            
            <div class="row">
                <div class="grid-item mb-2">
                    <h3 style="color: #0086FF">Bizzzy</h3>
                </div>
                <div class="grid-item">
                    <p style="font-weight: 500">Verify your email address to complete registration.</p>
                </div>
                <div class="grid-item">
                    <p>Hi {{$user_name}},</p>
                </div>
                <div class="grid-item">
                    <p>Thank you for your interest in joining Bizzy! To complete your registration, we need you to verify your email address.</p>
                </div>
                <div class="grid-item text-center" style="margin-top: 30px">
                    <a class="btn btn-primary" role="button" href="{{ route('user.verify.email', ['email' => $email, 'token' => $token]) }}">Verify Email</a>
                </div>
                <div class="grid-item mt-3">
                    <p class="mb-0">Thanks for your time.</p>
                    <p>The Bizzzy team.</p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>