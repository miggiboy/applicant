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
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  role="form" method="POST" action="{{ route('login') }}"> 
                            {{ csrf_field() }}
                                <h1>Вход</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Ваш email </label>
                                     <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Пароль </label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif 
                                </p>
                                <p class="keeplogin"> 
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                    <label for="loginkeeping">Запомнить меня</label>
                                    <a href="{{ route('password.request') }}">Забыл пароль</a>
                                </p>
                                
                                <p class ="sn" style="margin-top: 21px;">Вы можете войти через</p>
                                <a href="#"><img src="/img/vk1.png" class ="sn" alt="Вузы"></a><a href="#"><img src="/img/fb.png" class ="sn" alt="Вузы"></a>
                                <p class="login button"> 
                                    <input type="submit" value="Войти" /> 
                                </p>
                                <p class="change_link">
                                    Еще не зарегестрировались?
                                    <a href="{{ url('/register') }}" class="to_register">Регистрация</a>
                                </p>
                            </form>
                        </div>

                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>        

             
