@extends('Layouts.listlayout')
@section('content')
<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <a class="pull-right btn btn-primary" href="{{ URL::route('view.relationship') }}">View relationships based on blog post</a>
        <!-- /col-3 -->
        <div class="col-sm-12">
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($allUserInfo) > 0)
                            @foreach($allUserInfo as $allUserInf)
                                <tr>
                                    <td>{{$allUserInf->name}}</td>
                                    <td>{{$allUserInf->email}}</td>
                                    <td>{!! date('Y-m-d',strtotime($allUserInf->created_at)) !!}</td>
                                    <td><a title="reset password" onclick="showModel('resetPass','{{$allUserInf->id}}','{{ $allUserInf->email }}')" class="glyphicon glyphicon-edit">(Reset Password)</a></td>
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
@include('Home.resetpass')<!-- Main -->
@endsection