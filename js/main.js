$(function(){
	// For User Registration
	$("#regsubmit").click(function(){
		var name        = $('#name').val();
		var username    = $('#username').val();
		var password    = $('#password').val();
		var email       = $('#email').val();
		var dataString  = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
		$.ajax({
			type: "POST",
			url: "ajax/getregister.php",
			data: dataString,
			success: function(data){
                $('#status').html(data);
                $('#status').delay(2000).fadeOut('slow');
			}
		});
		return false;
	});

	// For User Login
	$("#login").click(function(){
		var email       = $('#email').val();
		var password    = $('#password').val();
		var dataString  = 'email='+email+'&password='+password;
		$.ajax({
			type: "POST",
			url: "ajax/getlogin.php",
			data: dataString,
			success: function(data){
                if($.trim(data) == 'empty'){
                    $('.empty').show();
                    // $('.empty').delay(2000).fadeOut('slow');
                    setTimeout(function(){
                        $('.empty').fadeOut();
                    }, 2000);
                }else if($.trim(data) == 'error'){
                    $('.error').show();
                    //$('.error').delay(2000).fadeOut('slow');
                    setTimeout(function(){
                        $('.error').fadeOut();
                    }, 2000);
                }else if($.trim(data) == 'desable'){
                    $('.desable').show();
                    //$('.desable').delay(2000).fadeOut('slow');
                    setTimeout(function(){
                        $('.desable').fadeOut();
                    }, 2000);
                }else{
                    window.location = 'exam.php';
                }
			}
		});
		return false;
	});


});