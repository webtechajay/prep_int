<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ajax form Submission</title>
  <!-- For Ajax for submit -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <!-- jqury file -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
   <style>
   .error{ color:red; } 
  </style>
</head>
 
<body>
 
<div class="container">
    <h2 style="margin-top: 10px;">Laravel 5.8 Ajax Form Submit with Validation - W3Adda</h2>
    <br>
    <br>
   
    <form id="contact_us" method="post" action="javascript:void(0)">
        <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
         </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Please enter name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group">
        <label for="email">Email Id</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>      
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Please enter mobile number" maxlength="10">
        <span class="text-danger">{{ $errors->first('phone') }}</span>
      </div>
      <div class="form-group">
       <button type="submit" id="send_form" class="btn btn-success">Submit</button>
      </div>
    </form>
 
</div>



<script type="text/javascript">
  $(document).ready(function(){
    $('#send_form').click(function(e){
      e.preventDefault();

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#send_form').html('sending...');

      // Submit form data using ajax

      $.ajax({
        url: "{{url('jquery-ajax-form-submit')}}",
        method: 'post',
        data: $('#contact_us').serialize(),
        success:function(response){
          //=======================
          $('#send_form').html('Submit');
          $('#res_message').show();
          $('#res_message').html(response.msg);
          $('#msg_div').removeClass('d-none');

          document.getElementById("contact_us").reset();
          setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
          },10000);
        }
      });
    });
  });
</script>
</body>
</html>