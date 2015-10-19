<!-- Modal -->
<div id="resetPass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="modalResetHead">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div id="loaderimg" class="text-center hidden"><img src="{{ asset('/assets/img/loader.gif') }}" /></div>
      <div class="modal-body">
        <label class="sr-only" for="form-first-name">New Password</label>
        <form action="{{ url('/user/reset/password') }}" method="post" role="form" id="resetPassForm" class="registration-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {!! Form::hidden('id',null,array('id'=>'userId')) !!}
          {!! Form::hidden('resetemail',null,array('id'=>'userEmail')) !!}
          {!! Form::password('password',array('class'=>'form-control','placeholder'=>'New Password','id'=>'resetPass','required'=>'required')) !!}
          <br />
          {!! Form::submit('Reset', array('class' => 'btn btn-primary')) !!}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>