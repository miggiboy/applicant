<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="ScoopThemes">
    <meta name="robots" content="noindex"/>
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Выпускник</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animations.css">
 <link href="https://fonts.googleapis.com/css?family=Anonymous+Pro|Comfortaa|Gabriela" rel="stylesheet">
    <!-- siimple style -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/css/semantic.css">
  <style>
      .b-popup{
    width:100%;
    min-height:100%;
    background-color: rgba(0,0,0,0.5);
    overflow:hidden;
    position:fixed;
    top:0px;
}
.b-popup .b-popup-content{
    margin:40px auto 0px auto;
    width:560px;
    height: 230px;
    padding:10px;
    background-color: #194f67;
    color:white;
    border-radius:5px;
    box-shadow: 0px 0px 10px #000;
}
  </style>
</head>

<body>

    <div class="cloud floating">
        <img src="assets/img/cloud.png" alt="Выпускник">
    </div>

    <div class="cloud pos1 fliped floating">
        <img src="assets/img/cloud.png" alt="Выпускник">
    </div>

    <div class="cloud pos2 floating">
        <img src="assets/img/cloud.png" alt="Выпускник">
    </div>

    <div class="cloud pos3 fliped floating">
        <img src="assets/img/cloud.png" alt="Выпускник">
    </div>


    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1>Выпускник</h1>
                    <br/>
                    <a href="javascript:PopUpShow()">Show popup</a>
                    <br>
                    
                    <h2 class="subtitle">Мы усердно работаем над нашим сайтом<br>и очень скоро будем готовы</h2>
                    <br/>
                    <h2  class="subtitle">Запуск в мае 2017</h2>
                    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                </div>>
            </div>
        </div>
    </div>
    <div class="b-popup" id="popup1">
        <div class="b-popup-content">
            <h3 style="color:white;">Выберите специальность</h3>
            <form class="ui form">
                <div class="ui floating dropdown labeled icon button">
  <i class="filter icon"></i>
  <span class="text">Filter Posts</span>
  <div class="menu">
    <div class="ui icon search input">
      <i class="search icon"></i>
      <input type="text" placeholder="Search tags...">
    </div>
    <div class="divider"></div>
    <div class="header">
      <i class="tags icon"></i>
      Tag Label
    </div>
    <div class="scrolling menu">
      <div class="item">
        <div class="ui red empty circular label"></div>
        Important
      </div>
      <div class="item">
        <div class="ui blue empty circular label"></div>
        Announcement
      </div>
      <div class="item">
        <div class="ui black empty circular label"></div>
        Cannot Fix
      </div>
      <div class="item">
        <div class="ui purple empty circular label"></div>
        News
      </div>
      <div class="item">
        <div class="ui orange empty circular label"></div>
        Enhancement
      </div>
      <div class="item">
        <div class="ui empty circular label"></div>
        Change Declined
      </div>
      <div class="item">
        <div class="ui yellow empty circular label"></div>
        Off Topic
      </div>
      <div class="item">
        <div class="ui pink empty circular label"></div>
        Interesting
      </div>
      <div class="item">
        <div class="ui green empty circular label"></div>
        Discussion
      </div>
    </div>
  </div>
</div>
                <div style="margin-top:10px;margin-bottom:10px;"class="ui fluid multiple search selection dropdown">
                  <input type="hidden" name="receipt">
                  <i class="dropdown icon"></i>
                  <div class="default text">Все специальности</div>
                  <div class="menu">
                    <div class="item" data-value="jenny" data-text="Jenny">
                      <img class="ui mini avatar image" src="/images/avatar/small/jenny.jpg">
                      Jenny Hess
                    </div>
                    <div class="item" data-value="elliot" data-text="Elliot">
                      <img class="ui mini avatar image" src="/images/avatar/small/elliot.jpg">
                      Elliot Fu
                    </div>
                    <div class="item" data-value="stevie" data-text="Stevie">
                      <img class="ui mini avatar image" src="/images/avatar/small/stevie.jpg">
                      Stevie Feliciano
                    </div>
                    <div class="item" data-value="christian" data-text="Christian">
                      <img class="ui mini avatar image" src="/images/avatar/small/christian.jpg">
                      Christian
                    </div>
                    <div class="item" data-value="matt" data-text="Matt">
                      <img class="ui mini avatar image" src="/images/avatar/small/matt.jpg">
                      Matt
                    </div>
                    <div class="item" data-value="justen" data-text="Justen">
                      <img class="ui mini avatar image" src="/images/avatar/small/justen.jpg">
                      Justen Kitsune
                    </div>
                  </div>
                </div>
              <div class="ui button" tabindex="0" style="background-color:#FF8A21;color:white">Применить</div>
              <a href="javascript:PopUpHide()"><div class="ui button">Отмена</div></a>
            </form>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--script src="http://downloads.mailchimp.com/js/jquery.form-n-validate.js"></script>
    <script>
        
$(document).ready( function () {
    $('#wrapper').height($(document).height());
    // I only have one form on the page but you can be more specific if need be.
    var $form = $('form');

    if ( $form.length > 0 ) {
        $('form input[type="submit"]').bind('click', function ( event ) {
            if ( event ) event.preventDefault();
            // validate_input() is a validation function I wrote, you'll have to substitute this with your own.
            if ( $form.validate() ) { register($form); }
        });
    }
});

function appendResult(userText , className, iconClass){
  var resultHTML = "<div class='stretchLeft result "+ className + "'>" + userText + " <span class='fa fa-" + iconClass + "'></span>" + "</div>";
  $('body').append(resultHTML);
  $('.result').delay(10000).fadeOut('1000');
}


function register($form) {
    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
        cache       : false,
        dataType    : 'json',
        contentType: "application/json; charset=utf-8",
        
}
    </script-->
<script>
    $(document).ready(function(){
    PopUpHide();
});
function PopUpShow(){
    $("#popup1").show();
}
function PopUpHide(){
    $("#popup1").hide();
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
	 <script>
	    $('.ui .dropdown').dropdown();
	 </script>
</body>

</html>
