@if(session()->has('flash_message'))
	<script>
		swal({
			title: "{{ session('flash_message.title') }}",   
			text: "{{ session('flash_message.message') }}",   
			type: "{{ session('flash_message.level') }}",  
			 timer: 5000,   
			 confirmButtonText: 'close',
			 showConfirmButton: true
		});
	</script>
@endif


@if(session()->has('flash_message_overlay'))
	<script>
		swal({
			title: "{{session('flash_message_overlay.title')}}",   
			text: "{!!session('flash_message_overlay.message')!!}",   
			type: "{{session('flash_message_overlay.level')}}",  
			 confirmButtonText: 'Okay'
		});
	</script> 
@endif

@if(session()->has('flash_message_overlayWithTimer'))
	<script>
		swal({
			title: "{{session('flash_message_overlayWithTimer.title')}}",   
			text: "{!!session('flash_message_overlayWithTimer.message')!!}"+"<br><br><p style='font-size:10px'><i>"+" This message will close in <span style='color:#F8BB86'>10 second<span>.</i></p>",   
			type: "{{session('flash_message_overlayWithTimer.level')}}",
			html:true,
			timer: 10000, 
			confirmButtonText: 'Okay'
		});
	</script> 
@endif

@if(session()->has('flash_message_loginPrompt'))
	<script>
		swal({
			title: "{{session('flash_message_loginPrompt.title')}}",   
			text: /*"<h3>{!!session('flash_message_loginPrompt.message')!!}</h3>"+*/"<br><br><p style='font-size:10px'><i>"+" This message will close in <span style='color:#F8BB86'>5 second<span>.</i></p>",
			type: "{{session('flash_message_loginPrompt.level')}}",
			html:true,
			timer: 5000, 
			confirmButtonText: 'Okay'
		});
	</script> 
@endif


@if(session()->has('flash_message_errorNotConfirm'))
	<script>
		swal({
  			  title: "{{session('flash_message_errorNotConfirm.title')}}",
  			  text: "{!!session('flash_message_errorNotConfirm.message')!!}",   
			  type:  "{{session('flash_message_errorNotConfirm.level')}}",
			  html:true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Close",
			});
	</script> 
@endif