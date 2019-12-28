<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title></title>



    <!-- Bootstrap -->

    <link href="{{ asset('public/site/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="{{ asset('public/site/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->

    <link href="{{ asset('public/site/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->

    <link href="{{ asset('public/site/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">



    <!-- Custom styling plus plugins -->

    <link href="{{ asset('public/site/build/css/custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('public/site/css/style.css') }}" rel="stylesheet">

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">
        
        <div class="col-md-3 col-md-3 left_col menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a href="" class="site_title"><span></span></a>

            </div>



            <div class="clearfix"></div>



            <!-- menu profile quick info -->

            <div class="profile clearfix">

              <div class="profile_pic">

                <img src="{{ Auth::user()->avatar ?? asset('public/site/images/no-avatar.png')}}" alt="..." class="img-circle profile_img">

              </div>

              <div class="profile_info">

                <h2></h2>

              </div>

            </div>

            <!-- /menu profile quick info -->



            <br />



            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                <h3></h3>

                <ul class="nav side-menu">

                  <li><a href="javascript:void(0)">Главная</a></li>
                  <li><a href="{{ route('company.index')}}">Компании</a></li>
                  <li><a href="{{ route('person.index')}}">Персонал</a></li>
                  

                 

                </ul>

              </div>



            </div>

            <!-- /sidebar menu -->



            <!-- /menu footer buttons -->

            <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Settings" href="">

                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>

              </a>

              

              

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                  @csrf

              </form>

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

              </a>

            </div>

            <!-- /menu footer buttons -->

          </div>

        </div>



        <!-- top navigation -->

        <div class="top_nav">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>



              <ul class="nav navbar-nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    <img src="{{ Auth::user()->avatar ?? asset('public/site/images/no-avatar.png') }}" alt="">{{ Auth::user()->name }}

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    

                    <li>

                      <a href="javascript:void(0)"><span>Профиль</span></a>

                    </li>

                    

                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>{{ __('Выход') }}</a></li>

                  </ul>

                </li>



                <li role="presentation" class="dropdown" style="display: none">

                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-envelope-o"></i>

                    <span class="badge bg-green">6</span>

                  </a>

                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    <li>

                      <a>

                        <span class="image"><img src="{{ Auth::user()->avatar  }}" alt="Profile Image" /></span>

                        <span>

                          <span>{{ Auth::user()->lastname}}</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>

                        <span class="image"><img src="{{ Auth::user()->avatar  }}" alt="Profile Image" /></span>

                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>

                        <span class="image"><img src="{{ Auth::user()->avatar }}" alt="Profile Image" /></span>

                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>

                        <span class="image"><img src="{{ Auth::user()->avatar }}" alt="Profile Image" /></span>

                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <div class="text-center">

                        <a>

                          <strong>See All Alerts</strong>

                          <i class="fa fa-angle-right"></i>

                        </a>

                      </div>

                    </li>

                  </ul>

                </li>

              </ul>

            </nav>

          </div>

        </div>

        <!-- /top navigation -->



        @yield('content')

        <!-- footer content -->

        <footer>

          <div class="pull-right">

            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>

          </div>

          <div class="clearfix"></div>

        </footer>

        <!-- /footer content -->

      </div>

    </div>



    <!-- compose -->

    <div class="compose col-md-6 col-xs-12">

      <div class="compose-header">

        New Message

        <button type="button" class="close compose-close">

          <span>×</span>

        </button>

      </div>



      <div class="compose-body">

        <div id="alerts"></div>



        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">

          <div class="btn-group">

            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>

            <ul class="dropdown-menu">

            </ul>

          </div>



          <div class="btn-group">

            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>

            <ul class="dropdown-menu">

              <li>

                <a data-edit="fontSize 5">

                  <p style="font-size:17px">Huge</p>

                </a>

              </li>

              <li>

                <a data-edit="fontSize 3">

                  <p style="font-size:14px">Normal</p>

                </a>

              </li>

              <li>

                <a data-edit="fontSize 1">

                  <p style="font-size:11px">Small</p>

                </a>

              </li>

            </ul>

          </div>



          <div class="btn-group">

            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>

            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>

            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>

            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>

          </div>



          <div class="btn-group">

            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>

            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>

            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>

            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>

          </div>



          <div class="btn-group">

            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>

            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>

            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>

            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>

          </div>



          <div class="btn-group">

            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>

            <div class="dropdown-menu input-append">

              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />

              <button class="btn" type="button">Add</button>

            </div>

            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>

          </div>



          <div class="btn-group">

            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>

            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />

          </div>



          <div class="btn-group">

            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>

            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>

          </div>

        </div>



        <div id="editor" class="editor-wrapper"></div>

      </div>



      <div class="compose-footer">

        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>

      </div>

    </div>

    <!-- /compose -->


    <!-- jQuery -->

    
    <script src="{{ asset('public/site/vendors/jquery/dist/jquery.min.js') }}"></script>


    <!-- Bootstrap -->

    <script src="{{ asset('public/site/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- FastClick -->

    <script src="{{ asset('public/site/vendors/fastclick/lib/fastclick.js') }}"></script>

    <!-- NProgress -->

    <script src="{{ asset('public/site/vendors/nprogress/nprogress.js') }}"></script>

    <!-- bootstrap-wysiwyg -->

    <script src="{{ asset('public/site/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>

    <script src="{{ asset('public/site/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>

    <script src="{{ asset('public/site/vendors/google-code-prettify/src/prettify.js') }}"></script>



    <!-- Custom Theme Scripts -->

    <script src="{{ asset('public/site/build/js/custom.min.js') }}"></script>




  </body>

</html>