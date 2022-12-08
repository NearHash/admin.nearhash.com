<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.png') }}" />
    <title>Near Hash | Login  </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7c0ec42130.js" crossorigin="anonymous"></script>

{{--    https://animate.style/--}}
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="auth">
        <div class="auth-over ">
            <div class="col-lg-6 col-xl-4 mx-auto p-2">
                <div class="login-card animate__animated animate__bounce">
                    <h3 class="text-center mb-3">Get Near, Feel Reality.</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3 ">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" class="form-input form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" id="email" autocomplete="off">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" class="form-input form-control @error('password') is-invalid @enderror" type="password" id="password" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="login-btn w-100 my-4">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="friends col-md-7 h-100">
                <img src="https://friendkit.cssninja.io/assets/img/illustrations/characters/friends.svg" alt="" class="w-100 h-100" />
        </div>
    </div>
</body>
</html>
