<!DOCTYPE html>
<html lang="en"><head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type"> 
        <meta charset="utf-8">
        <title>Bootply snippet - Bootstrap Bootstrap 3 Admin</title>
        <meta content="Bootply" name="generator">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta content="Bootstrap Bootstrap 3 Example dashboard / admin / control panel layout. This 3-column responsive template has a collapsible sidebar menu, alerts, noti" name="description">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="/bootstrap/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="/bootstrap/img/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon">
        <link href="/bootstrap/img/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon">










        <!-- CSS code from Bootply.com editor -->
        
        <style type="text/css">
            .navbar-static-top {
  margin-bottom:20px;
}

i {
  font-size:16px;
}

.nav &gt; li &gt; a {
  color:#787878;
}
  
footer {
  margin-top:20px;
  padding-top:20px;
  padding-bottom:20px;
  background-color:#efefef;
}

/* count indicator near icons */
.nav&gt;li .count {
  position: absolute;
  bottom: 12px;
  right: 6px;
  font-size: 9px;
  background: rgba(51,200,51,0.55);
  color: rgba(255,255,255,0.9);
  line-height: 1em;
  padding: 2px 4px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -ms-border-radius: 10px;
  -o-border-radius: 10px;
  border-radius: 10px;
}

        </style>
    <script id="_carbonads_projs" type="text/javascript" src="//srv.carbonads.net/ads/C6AILKT.json?segment=placement:bootplycom&amp;callback=_carbonads_go"></script><script type="text/javascript" src="//fallbacks.carbonads.com/home/e99a260b94849497ea962f674f0aebd9//bootplycom/8?144500337"></script></head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body>
        
        <!-- header -->
<div class="navbar navbar-inverse navbar-static-top" id="top-nav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check()) {
                <li><a href="{{ url('/auth/logout') }}"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        
        <!-- /col-3 -->
        <div class="col-sm-12">

            <!-- column 2 -->
            
            
            

            <div class="row">
                <!-- center left-->
                
                <!--/col-->
                <div class="col-md-12">
                @if(isset($message))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($allUserInfo) > 0)
                            @foreach($allUserInfo as $allUserInf)
                                <tr>
                                    <td>{{$allUserInf->name}}</td>
                                    <td>{{$allUserInf->email}}</td>
                                    <td>{!! date('Y-m-d',strtotime($allUserInf->created_at)) !!}</td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td colspan="5" align="center">{!! str_replace('/?', '?', $allUserInfo->render()) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="glyphicon glyphicon-wrench pull-right"></i>
                                <h4>Add User</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form form-vertical" action="{{ url('/users/list') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="control-group">
                                    <label>Name</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>email</label>
                                    <div class="controls">
                                       <input type="email" placeholder="Email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>password</label>
                                    <div class="controls">
                                       <input type="password" placeholder="Password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label></label>
                                    <div class="controls">
                                        <button class="btn btn-primary" type="submit">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/panel content-->
                    </div>
                    <!--/panel-->

                    
                    <!--/panel-->

                </div>
                <!--/col-span-6-->

            </div>
            <!--/row-->

            

            

            

            
        </div>
        <!--/col-span-9-->
    </div>
</div>
<!-- /Main -->

<footer class="text-center">This Bootstrap 3 dashboard layout is compliments of <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a></footer>

<div id="addWidgetModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Add Widget</h4>
            </div>
            <div class="modal-body">
                <p>Add a widget stuff here..</p>
            </div>
            <div class="modal-footer">
                <a class="btn" data-dismiss="modal" href="#">Close</a>
                <a class="btn btn-primary" href="#">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dalog -->
</div>
<!-- /.modal -->
        
        <script async="" src="//www.google-analytics.com/analytics.js"></script><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>


        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>






        
        <!-- JavaScript jQuery code from Bootply.com editor  -->
        
        <script type="text/javascript">
        
        $(document).ready(function() {
        
            $(".alert").addClass("in").fadeOut(4500);

/* swap open/close side menu icons */
$('[data-toggle=collapse]').click(function(){
    // toggle icon
    $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
});
        
        });
        
        </script>
        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-40413119-1', 'bootply.com');
          ga('send', 'pageview');
        </script>
        
        
        <style>
            .ad {
              position: absolute;
              bottom: 70px;
              right: 48px;
              z-index: 992;
              background-color:#f3f3f3;
              position: fixed;
              width: 155px;
              padding:1px;
            }
            
            .ad-btn-hide {
              position: absolute;
              top: -10px;
              left: -12px;
              background: #fefefe;
              background: rgba(240,240,240,0.9);
              border: 0;
              border-radius: 26px;
              cursor: pointer;
              padding: 2px;
              height: 25px;
              width: 25px;
              font-size: 14px;
              vertical-align:top;
              outline: 0;
            }
            
            .carbon-img {
              float:left;
              padding: 10px;
            }
            
            .carbon-text {
              color: #888;
              display: inline-block;
              font-family: Verdana;
              font-size: 11px;
              font-weight: 400;
              height: 60px;
              margin-left: 9px;
              width: 142px;
              padding-top: 10px;
            }
            
            .carbon-text:hover {
              color: #666;
            }
            
            .carbon-poweredby {
              color: #6A6A6A;
              float: left;
              font-family: Verdana;
              font-size: 11px;
              font-weight: 400;
              margin-left: 10px;
              margin-top: 13px;
              text-align: center;
            }
        </style>
        
        
    
</body></html>