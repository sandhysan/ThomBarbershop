<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thom Barbershop | Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/styleregis.css') }}">
    
     <!-- bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>
</head>
<body>

    <div class="main">

        <section class="signup">
           
            <div class="container" style="width: 60%">
                <div class="signup-content">
                    @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    @endif
                    <form action="/registrasi" method="post" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Sign Up Thom Barbershop</h2>
                        <div class="form-group">
                            <label for="" class="form-text">Your Name</label>
                            <input type="text" class="form-input" name="nama" id="nama" placeholder="Your Name"  required/>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Email</label>
                            <input type="email" class="form-input  @error ('email')is-invalid @enderror"  id="validationCustom03"  name="email" id="email" placeholder="Your Email" required/>
                            @error('email')
										<div class="invalid-feedback" style="color: red;">
											{{ $message }}
										</div>
									@enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Username</label>
                            <input type="text" class="form-input @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required/>
                            @error('username')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Password</label>
                            <input type="password" class="form-input @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required/>
                            @error('password')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Confirm Password</label>
                            <input type="password" class="form-input @error('konfirmasi') is-invalid @enderror" name="konfirmasi" id="konfirmasi" placeholder="Confirm Password" required/>
                            @error('konfirmasi')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Telphone</label>
                            <input type="number" class="form-input" name="notelp" id="notelp" placeholder="Telphone Number" required/>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Date of Birth</label>
                            <input type="date" class="form-input" name="tgllahir" id="tgllahir" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-text">Address</label>
                            <textarea class="form-input @error('konfirmasi') is-invalid @enderror" name="alamat" id="alamat" cols="30" rows="8" placeholder="Address" required></textarea>
                            @error('alamat')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <div class="form-group text-bold">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" onclick="showPassword()"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Show Password</label>
                    </div>
                    <p class="loginhere">Have already an account ? <a href="/login" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
     <script>
       var all = document.getElementById('agree-term')
        var pass = document.getElementById('password')

        all.addEventListener('click', function() {
            if (all.checked) {
                pass.setAttribute('type', 'text')
            } else {
                pass.setAttribute('type', 'password')
            }
        })
    </script>
     <script>
        function showPassword() {
            var user_pass = document.getElementById('konfirmasi');
            if (user_pass.type == 'password') {
                user_pass.type = 'text';
            } else {
                user_pass.type = 'password';
            }
        }
     </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>