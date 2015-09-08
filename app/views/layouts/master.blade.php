<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  {{-- <link rel="favicon" href="{{ asset('favicon.ico') }}"> --}}

  <!-- Paper Bootstrap CSS -->
  {{ HTML::style('css/paper.bootstrap.css') }}

  {{ HTML::style('font-awesome-4.4.0/css/font-awesome.min.css') }}

  <!-- Custom CSS -->
  {{-- {{ HTML::style('css/heroic-features.css') }} --}}
  {{-- {{ HTML::style('css/search.css') }} --}}
  {{-- {{ HTML::style('css/sidebar.css') }} --}}
  {{ HTML::style('css/bootstrap-tagsinput.css') }}
  {{ HTML::style('css/chat.css') }}
  {{ HTML::style('css/fileinput.css') }}
  {{ HTML::style('css/bootstrap-editable.css') }}
  {{-- {{ HTML::style('css/stroke-gap-icons/style.css') }} --}}
  {{ HTML::style('vendor/selectize/css/selectize.bootstrap3.css') }}
  {{ HTML::style('css/sattapatta.css') }}


  @yield('styleScript')

</head>

<body>


   <!-- Navigation -->
   <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
         <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
        
           <a class="navbar-brand" href="#">
             {{ HTML::image('images/logo-play.png', 'logo', ['height'=>'30px']) }}
           </a>
            
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class=@yield('home-class')>
              <a href="{{ URL::route('home') }}">
                <i class="fa fa-home fa-lg" data-toggle="tooltip" data-placement="bottom" title="home"></i>
              </a>
            </li>

            <li class=@yield('browse-class')>
              <a href="{{ URL::route('items.browse') }}">
                <i class="fa fa-th fa-lg" data-toggle="tooltip" data-placement="bottom" title="browse"></i>
              </a>
            </li>

            <li class=@yield('chat-class')>
              <a href="{{ URL::route('chatsbs') }}">
                <i class="fa fa-comment-o fa-lg" data-toggle="tooltip" data-placement="bottom" title="chat"></i>
              </a>
            </li>

            @if (Auth::check())
              <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell-o fa-lg" data-toggle="tooltip" data-placement="bottom" title="notifications"></i>
                
                  @if ($notifications->count() > 0)
                    <span class="badge" id="notif-badge">{{ $notifications->count() }}</span>
                  @endif
                  
                </a>
                <ul class="dropdown-menu">
                   @forelse ($notifications as $notification)
                  <li id="notif{{$notification->id}}" class="notif"><a href="{{ URL::to($notification->link) }}">{{ $notification->content }}</a></li>
                @empty
                  <li>You have no unread notifications.</li>
                @endforelse
                 </ul>
              </li>
  
              <li><a href="{{ URL::route('users.messages') }}"><i class="fa fa-envelope-o fa-lg"></i></a></li>
              @endif

            {{-- <li>
              {{ Form::select('q', null, null, ['id'=>'searchbox', 'placeholder'=>'Search..', 'class'=>'form-control']) }}
            </li> --}}

            

            <li>
              {{ Form::open(array('route'=>'search.results', 'class'=>'navbar-form', 'id'=>'navbar-search', 'method'=>'get')) }}
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="fa fa-search fa-rotate-90 fa-lg"></i></span>
                  <input type="text" name="search" id="navbar-searchbox" class="form-control" placeholder="Search" list="search-results">
                  <datalist id="search-datalist"></datalist>
                  
                </div>
              {{ Form::close() }}
            </li>
            
              @if(Auth::check())
                <li class="navbar-avatar">{{ HTML::image(Auth::user()->photoURL, 'profile-pic', ['height'=>'47px', 'class'=>'img-circle']) }}</li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span>{{ Auth::user()->username }}</span>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- <li>{{ HTML::linkRoute('users.dashboard', 'Dashboard', $loggedUser->username) }}</li> -->
                    <li>{{ HTML::linkRoute('items.post', 'Post item', $loggedUser->username) }}</li>
                    <!-- <li>{{ HTML::linkRoute('users.listing', 'My listings', $loggedUser->username) }}</li> -->
                    <li>{{ HTML::linkRoute('users.messages', 'Messages') }}</li>
                    <li>{{ HTML::linkRoute('users.profile', 'Profile', $loggedUser->username) }}</li>
                    <!-- <li>{{ HTML::linkRoute('chats', 'chat', $loggedUser->username) }}</li> -->
                    <li class="divider"></li>
                    <li>{{ HTML::linkRoute('logout', 'Log out') }}</li>
                   </ul>
                </li>
                
              @else
                <li>{{ HTML::linkRoute('login', 'LOG IN') }}</li>
              @endif
              
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    <!-- /.container -->
  </nav>
  {{-- <div class="body-container"> --}}

  
  
  <div class="container">

    {{-- <select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select> --}}

    @include('partials.alert')
    @yield('content')

  </div> 

  <div class="footer">
    <div class="container">
      <p class="text-muted text-center">
        Copyright &copy; SattaPatta {{ date('Y') }}
        <br>
        Paragraph graphic by <a href="http://picol.org">Picol</a> from <a href="http://www.flaticon.com/">Flaticon</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a>
      </p>
    </div>
  </div>

  <!-- jQuery -->
  {{ HTML::script('js/jquery.js') }}

  <!-- Bootstrap Core JavaScript -->
  <!-- // <script src="js/bootstrap.min.js"></script> -->
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/search.js') }}
  {{ HTML::script('js/bootstrap-tagsinput.js') }}
  {{-- {{ HTML::script('js/chats.js') }} --}}
  {{ HTML::script('js/fileinput.js') }}
  {{ HTML::script('js/bootstrap-editable.js') }}
  {{ HTML::script('js/moment.js') }}
  {{ HTML::script('js/brain-socket.min.js') }}
  {{ HTML::script('js/jquery.waypoints.min.js') }}
  {{ HTML::script('vendor/selectize/js/standalone/selectize.min.js') }}

  {{ HTML::script('js/sattapatta.js') }}
  {{ HTML::script('js/chat.js') }}

  {{-- {{ HTML::script('js/chatsbs.js') }} --}}

  <script>

  // window.app = {};

  // app.BrainSocket = new BrainSocket(
  //     new WebSocket('ws://localhost:8080'),
  //     new BrainSocketPubSub()
  //   );

  </script>

  @yield('script')

    
    <!-- Menu Toggle Script -->
    <script>

      var root = '{{url("/items/browse")}}';
      console.log(root);
      // Activate Selectize
      $(document).ready(function(){
          $('#searchbox').selectize();
      });
    

    // $('.dropdown-toggle').dropdown();
    // $('[data-toggle="dropdown"]').dropdown();

    

    



    // $(document).ready(function() {
    //   $('#profile-table').find('a').editable();
    //   $('#username').editable('disable');
      
    // });

    // $('#comment').popover(options);
    // $('#comment').popover('show');

 /*   $(document).ready(function(){
      $('#get').click(function(e){
        e.preventDefault();

        // ajax get
        $.get('jpt/get', function(data) {
          console.log(data);
        });
      });

      $('form').submit(function(e) {
        e.preventDefault();

        var name = $(this).find('input[name=name]').val();

        // ajax post
        $.post('jpt/get', {name: name}, function(data){
          console.log(data);
        });
      });
    });*/

    $(document).ready(function(){
      $('#infoForm').submit(function(e) {
        e.preventDefault();

        var username = $(this).find('input[name=username]').val();
        // var $form = $(this); 
        // var data=$form.serialize();

        $.post('profile/info', {username:username}, function(response){
          if(response.fail) {
             $.each(response.errors, function(index, value){
               var errorDiv = '#'+index+'_error';
               $(errorDiv).addClass('text-danger');
               $(errorDiv).empty().append(value);
             });

           }
           if(response.success) {
            
            $('#edit-profile').hide();
            var successMessage = 'Profile info updated successfully';
            $('#messageDiv').empty().append('<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span><i class="fa fa-info-circle"></i>Profile info updated successfully. Refreshing......</span></div>');

            var url = '{{ route("users.profile", ":username") }}';
            url = url.replace(':username', response.username);
            window.location=url;
           }
        });
      });
    });

  
  $('.notif').click(function(e){
    e.preventDefault();
    var notifId = $('.notif').attr('id');
    var id = notifId.substring(5);
    // alert(id);
    $.post('/updateNotif', {id:id}, function(response){
      if(response.success) {
        var url = response.link;
        window.location = url;
      }
    });
  });

  $('#get').click(function(e){
    e.preventDefault();
    $.get('messages/show', function(response){
      console.log(response);
    });
  });

  $('#messageModal').on('show.bs.modal', function (event) { // id of the modal with event
    
    var link = event.relatedTarget; // Button that triggered the modal
    var id = link.id;
    var modal = $(this);
    var spinner = $('<i></i>').addClass('fa fa-spinner fa-pulse fa-3x');

    modal.find('.modal-title').text('');
    modal.find('.modal-body').text('');
    modal.find('.modal-body').append(spinner);

    // var messageId = link.data('messageId'); // Extract info from data-* attributes
    // var productname = button.data('productname')

    var label = '#span'+id;
    // var content = 'Are you sure want to delete ' + productname + '?'
    // alert(id);
    $.post('messages/show', {data:id}, function(response){
      console.log(label);
      // $('#'.msgId).empty().append('wateva');
      // if(response.success) {
      //   console.log(response);
      //   alert(response);
      // }
      // if(response.fail) {
      //   console.log('wtf');
      // }
      var title = response.title;
      var content = response.content;
      if(response.update) {
        $(label).empty();
      }

    // Update the modal's content.
    
    // var modal = event.target;
    // modal.find('.modal-title').text(title);
    
     modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    });

    

    // And if you wish to pass the productid to modal's 'Yes' button for further processing
    // modal.find('button.btn-danger').val(productid)
  });

  // $('tabletr td').click(function() {
  //   // e.preventDefault();
  //   var msgId = this.id;
  //   // alert(msgId);
  //   $('#myModal').show();

  //   $.get('show', {data: msgId}, function(response){
  //     console.log(msgId);
  //     $('#'.msgId).empty().append('wateva');
  //     if(response.success) {
  //       console.log(response.message);
  //     }
  //     if(response.fail) {
  //       console.log('wtf');
  //     }
  //   });

  // });

   
/*    $(document).on('submit', '#infoForm', function(event) {
    event.preventDefault();
    var $form = $(this); 
    var data=$form.serialize();
    var url=$form.attr("url");
    var posting = $.post(url, {formData:data});
    // posting.done(function(data){
    //  if(data.fail) {
    //    $.each(data.errors, function(index, value){
    //      var errorDiv = '#'+index+'_error';
    //      $(errorDiv).addClass('required');
    //      $(errorDiv).empty().append(value);
    //    });
    //  }
    // });
    $.post(url, {formData:data}, function(response){
      // validation success
    }).fail(function(response){
      //validation fail
      //if(data.fail) {
        $.each(data.errors, function(index, value){
          var errorDiv = '#'+index+'_error';
          $(errorDiv).addClass('required');
          $(errorDiv).empty().append(value);
        });
      //}
    });
  });*/
    </script>

</body>

</html>
