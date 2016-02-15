<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
    <!-- Navigation -->

    <link rel="stylesheet" href="{{asset('themes/blog/css/scrolling-nav.css')}}" type="text/css"/>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav page-active">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li>
                        <a class="page-scroll" href="/">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Article">Article</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/Albums">Photos</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right:0">
                    <!-- Search Bar -->
                    <li>
                        <form class="navbar-form" role="search">
                            <div class="form-group ">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                </div><!-- /input-group -->

                            </div>
                        </form>
                    </li>
                    <li class="dropdown">
                        <button  href="#" class="user-login btn btn-circle-sm btn-success navbar-btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="border-top-left-radius:4px;border-top-right-radius:4px">
                            @if($loginStauts  == 'unlogin')
                            <li role="presentation">
                                <a role="menuitem" href="#" data-toggle="modal" data-target="#login">Login</a>
                            </li>
                            @endif
                            <li role="presentation"><a role="menuitem" href="#">Dashboard</a></li>
                            @if($loginStauts == 'logined')
                            <li role="presentation" class="divider"></li>
                            
                            <li role="presentation"><a role="menuitem" href="/logout">Logout</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- /.container -->

    </nav>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" 
                   data-dismiss="modal" aria-hidden="true">
                      &times;
                    </button>
                    <h5 class="modal-title" id="myModalLabel">
                       LOGIN
                        <div class = "clearfix"></div>
                        <div class = "extraspace-small"></div>
                        <div class = "alert alert-danger" role="alert" data-alert = "login-alert" style="display:none">
                            Wrong Account or Password!
                        </div>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" role="form" id="login_form">
        <!--                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Account</label>
                            <div class="col-sm-8">
                                <input type="mail" name="name" class="form-control" id="inputEmail3" value="" placeholder="ID">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary center-block" data-login='submit'>Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scrolling Nav JavaScript -->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('themes/blog/js/scrolling-nav.js')}}"></script>
    <script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("[data-target='#login']").on("click",function(){
         $("[data-alert='login-alert']").hide();
    });
    $.ajaxSetup({ 
        headers: {'csrftoken' : CSRF_TOKEN}
    });
    $(function(){
        $("button[data-login='submit']").click(function(){
                $.ajax({
                    type:"POST",
                    url:"asynlogin",
                    dataType: "json",
                    data:{'_token':CSRF_TOKEN,'name':$('input[name=name]').val(),'password':$('input[name=password]').val()},
                    async: true,
                    success: function(data){
                        if(data.login=='fail'){
                            $("[data-alert='login-alert']").show("fast");
                        }
                        else{
                            window.location.href = data.redirect;
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR);
                    //console.log(jqXHR['responseText']);
                    var win = window.open('', '_self');
                    win.document.getElementsByTagName('Body')[0].innerHTML = jqXHR.responseText;
                }
                });
            
            });
    });
    </script>

