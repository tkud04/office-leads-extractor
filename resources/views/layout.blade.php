<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title>@yield('title') | Office Leads Extractor</title>
	

	  
	<!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    
	<!-- custom css -->
	  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
	  
    <!-- jquery 3.3.1 -->
    <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
	 <!-- bootstrap bundle js -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
	
	<!--AutoComplete --> 
    <link href="{{asset('css/flexselect.css')}}" rel="stylesheet">
    <script src="{{asset('js/liquidmetal.js')}}"></script>
    <script src="{{asset('js/jquery.flexselect.js')}}"></script>
	
	<!-- custom js -->
	<script src="{{asset('js/helpers.js').'?ver='.rand(56,99999)}}"></script>
	<script src="{{asset('js/mmm.js').'?ver='.rand(56,99999)}}"></script>
	
	<!--SweetAlert--> 
    <link href="{{asset('lib/sweet-alert/sweetalert2.css')}}" rel="stylesheet">
    <script src="{{asset('lib/sweet-alert/sweetalert2.js')}}"></script>
	
	@yield('styles')
	@yield('scripts')
</head>

<body>

<div class="container-fluid">
  <!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 

                 @if($pop != "" && $val != "")
                   @include('session-status',['pop' => $pop, 'val' => $val])
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
				@yield('content')

</div>
</body>
 
</html>
