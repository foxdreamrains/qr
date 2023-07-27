<!doctype html>
    <html lang="en" style="background: white;">
    <head>
        <link rel="icon" type="image/png" href="{{ asset('images/logo/pristine.png') }}">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Login</title>

        <style>
            body{
                background: white;
            }
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif
            }

            .container {
                margin: 50px auto
            }

            .body {
                position: relative;
                width: 720px;
                height: 440px;
                margin: 20px auto;
                border: 1px solid #dddd;
                border-radius: 18px;
                overflow: hidden;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px
            }

            .box-1 img {
                width: 100%;
                height: 100%;
                object-fit: cover
            }

            .box-2 {
                padding: 10px
            }

            .box-1,
            .box-2 {
                width: 50%
            }

            .h-1 {
                font-size: 24px;
                font-weight: 700
            }

            .text-muted {
                font-size: 14px
            }

            .container .box {
                width: 100px;
                height: 100px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border: 2px solid transparent;
                text-decoration: none;
                color: #615f5fdd
            }

            .box:active,
            .box:visited {
                border: 2px solid #ee82ee
            }

            .box:hover {
                border: 2px solid #ee82ee
            }

            .btn.btn-primary {
                background-color: transparent;
                color: #ee82ee;
                border: 0px;
                padding: 0;
                font-size: 14px
            }

            .btn.btn-primary .fas.fa-chevron-right {
                font-size: 12px
            }

            .footer .p-color {
                color: #ee82ee
            }

            .footer.text-muted {
                font-size: 10px
            }

            .fas.fa-times {
                position: absolute;
                top: 20px;
                right: 20px;
                height: 20px;
                width: 20px;
                background-color: #f3cff379;
                font-size: 18px;
                display: flex;
                align-items: center;
                justify-content: center
            }

            .fas.fa-times:hover {
                color: #ff0000
            }

            .imgLogo{
                width: 120px;
                position: relative;
                left: 22%;
            }

            @media (max-width:767px) {
                body {
                    padding: 10px
                }

                .body {
                    width: 100%;
                    height: 100%
                }

                .box-1 {
                    width: 100%
                }

                .box-2 {
                    width: 100%;
                    height: 440px
                }

                .imgLogo {
                    width: 120px;
                    position: relative;
                    left: 35%;
                    top: 20px;
                }
            }
            .form-control:focus {border-color:rgba(100,100,100,1)!important;
                -webkit-box-shadow: none!important;
                -moz-box-shadow: none!important;
                box-shadow: none!important;
            }
            .mgtop{
                position: relative; top: 40px;
            }
        </style>
    </head>
    <body style="background: white;">
        <div class="container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="body d-md-flex align-items-center justify-content-between mr-5 mgtop" style="background: #f7f7f7;">

                     <img src="{{ asset('images/logo/pristine.png') }}" class="imgLogo">
                    <div class=" d-flex flex-column h-150">
                        <div class="text-center" style="padding: 50px;">
                            <form>


                                <div class="input-group mb-3">
                                    <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" aria-label="username" aria-describedby="basic-addon1" placeholder="Username" style="border-radius: 5px; text-align:center">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" aria-label="password" aria-describedby="basic-addon1" placeholder="Password" style="border-radius: 5px; text-align:center">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-dark" style="width: 70%; border-radius: 25px; background: #1b7f77;">LOGIN</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
        </html>
