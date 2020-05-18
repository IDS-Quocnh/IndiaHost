<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="{{ asset('public/assets/blacktheme/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/pace-theme-minimal.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/sticky-footer-navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/feedback-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/ribbon.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/chartjs/Chart.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/blacktheme/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/blacktheme/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/blacktheme/pace.min.js') }}"></script>
    <script src="{{ asset('public/assets/chartjs/Chart.min.js') }}"></script>
</head>
<body>
<center>
    <div id="mybutton">
      <form method="post" id="form" action="{{ route('upload-image/upload') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" id="myfile" name="fileUpload" accept="image/x-png,image/gif,image/jpeg" />
      </form>
      <div style="margin-top: 75px">
        Click here to upload Image
      </div>
    </div>
</center>


<script>
$(document).ready(function() {
    $('#myfile').change(function(evt) {
        $("#form").submit();
    });
});
</script>
<style>
div#mybutton {

  /* IMPORTANT STUFF */
  overflow: hidden;
  position: relative;
  cursor:   pointer;

  /* SOME CUSTOM STYLING */
  width:  300px;
  height:  200px;
  padding: 10px;
  text-align: center;
  border: 1px solid green;
  font-weight: bold
  background: red;
  background-color:rgb(255,255,255,0.5);
}

div#mybutton:hover {
  background: green;
}


input#myfile {
  height: 200px;
  cursor: pointer;
  position: absolute;
  top: 0px;
  right: 0px;
  font-size: 100px;
  z-index: 2;

  opacity: 0.0; /* Standard: FF gt 1.5, Opera, Safari */
  filter: alpha(opacity=0); /* IE lt 8 */
  -ms-filter: "alpha(opacity=0)"; /* IE 8 */
  -khtml-opacity: 0.0; /* Safari 1.x */
  -moz-opacity: 0.0; /* FF lt 1.5, Netscape */
}
</style>
</body>
</html>
