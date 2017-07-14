<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="/css/style2.css" />
        <link rel="stylesheet" href="/css/animate-custom.css"/>
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
            </header>
            <section>               
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="wrapper">
                        
                        <div id="register" class="animate form">
                            <form  role="form" method="POST" action="{{ route('register') }}"> 
                                {{ csrf_field() }}

                                <h1> Регистрация </h1>

                                @if ($errors->count())

                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach

                                @endif

                                <p> 
                                    <label for="usernamesignup" class="name" data-icon="u">Ваше имя</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Ваш email</label>
                                     <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Ваш пароль </label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Подвердите пароль </label>
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </p>
                                <p class="signin button"> 
                                    <input type="submit" value="Готово"/> 
                                </p>
                                <p class="change_link">  
                                    Уже зарегистрировались?
                                    <a href="{{ url('/login') }}" class="to_register">Войти</a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>