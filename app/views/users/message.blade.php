@extends ('layouts.master')

@section ('content')

<div id="wrapper" class="toggled">

    
 
        
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        @if (Session::has('message'))
          <div class="alert alert-warning alert-dismissible" id="messageDiv" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <span><i class="fa fa-info-circle"></i>&nbsp;{{ Session::get('message') }}</span>
          </div>
        @endif

        <div class="col-md-offset-1 col-md-10">
          <!-- <a href="#menu-toggle" id="menu-toggle"><i class='fa fa-align-justify fa-2x'></i></a> -->
          <!--  -->
          
          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#messages" aria-controls="home" role="tab" data-toggle="tab">Messages</a></li>
              <!-- <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Compose</a></li> -->
              <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Sent messages</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

            <!-- messages -->
            <div role="tabpanel" class="tab-pane fade in active" id="messages">
              <br>
              <!-- <div class="panel panel-default"> -->
                <!-- Default panel contents -->
                <!-- <div class="panel-heading">Panel heading</div> -->

                <!-- Table -->
                <table class="table table-hover table-condensed" id="inbox">
                  
                  <tr class="success">
                    <th>From</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                  @forelse($messages as $message)
                  <tr>
                    <td>{{ User::where('id', $message->sender_id)->pluck('username') }}</td>
                    <td>
                      @if($message->read_status == 0)
                        <span class="label label-danger" id="span{{ $message->id }}">New</span>
                      @endif
                      {{ HTML::link('#messageModal', $message->title, ['id'=>$message->id, 'data-toggle'=>'modal']) }}
                    </td>
                    <td>{{ $message->date }}</td>
                    <td>{{ $message->time }}</td>
                  </tr>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <i class="fa fa-spinner fa-pulse fa-3x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

                  @empty
                  <tr><td colspan="4" style="color:#999999">{{ 'You currently don\'t have any messages.' }}</td></tr>

                  @endforelse

                </table>
              <!-- </div> -->

              <!-- Modal -->


            </div>
            <!-- messages -->

             
              
              <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
            </div>

          </div>
          <!--  -->

        		
												
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

@stop