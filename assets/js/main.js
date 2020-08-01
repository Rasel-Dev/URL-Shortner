function copyDivToClipboard(data) {
    var range = document.createRange();
    range.selectNode(document.getElementById("short_link"));
    window.getSelection().removeAllRanges(); // clear current selection
    window.getSelection().addRange(range); // to select text
    document.execCommand("copy");
    window.getSelection().removeAllRanges();// to deselect
    data.innerHTML = 'Copied';
}
function _(el){
	return document.getElementById(el);
}
//generate short link
$("#shortener_form_content").on('submit', function(e){
	e.preventDefault();
	let url = $('#url').val();
	$.ajax({
		url:'app/link.php',
		type: 'POST',
		data: {url:url},
		cache: false,
		beforeSend: function(){
			$('#url_submit').val('Link Shorting...');
		},
		success: function(data){

			if (data == 'exist') {

                alert('Link Already Exist!');
                $('#url_submit').val('Submit');

			} else {

				$('#url_submit').val('Submit');
				$('#short_link_gen').append(data.link);
                $("#shortener_form_content")[0].reset();

			}
			
		}
	});
});
//generate link view
function loadView(){
	$.ajax({
		url:'app/view.php',
		type: 'post',
		proccessData:false,
		cache:false
	});
}
//Login 
var login_modal = _("login-modal");
var login_btn = _("login-btn");
var span = document.getElementsByClassName("login-close")[0];
login_btn.onclick = function() { login_modal.style.display = "block"; }
span.onclick = function() { login_modal.style.display = "none"; }
window.onclick = function(event) {
	if (event.target == login_modal) {
		login_modal.style.display = "none";
	}
}

//Registration 
var reg_modal = _("reg-modal");
var reg_btn = _("reg-btn");
var span = document.getElementsByClassName("reg-close")[0];
reg_btn.onclick = function() { reg_modal.style.display = "block"; }
span.onclick = function() { reg_modal.style.display = "none"; }
window.onclick = function(event) {
	if (event.target == reg_modal) {
		reg_modal.style.display = "none";
	}
}

$('#fullName').on('keyup', function(){
	if ($(this).val().trim().length >= 6) {
		$(this).css('background', '#d5ffd5');
	} else {
		$(this).css('background', '#ffdcdc');
	}
});
$('#email').on('keyup', function(){

	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email').val().trim())) {
		$('#email').css('background', '#d5ffd5');
	} else {
		$('#email').css('background', '#ffdcdc');
	}
});
$('#c_pass').on('keyup', function(){
	if ($('#n_pass').val() === $('#c_pass').val()) {
		$('#n_pass').css('background', '#d5ffd5');
		$('#c_pass').css('background', '#d5ffd5');
	} else {
		$('#n_pass').css('background', '#ffdcdc');
		$('#c_pass').css('background', '#ffdcdc');
	}
});
$('#reg_form').on('submit', function(e){
	e.preventDefault();
	let name = $('#fullName').val();
	let email = $('#email').val();
	let new_pass = $('#n_pass').val();
	let con_pass = $('#c_pass').val();
	let submit = $('#reg_submit_btn');
	let message = $('#message');
	let data = {name:name,email:email,pass:new_pass};
	if (name != '' || email != '' || new_pass != '' || con_pass != '') {

		if (name.length >= 6) {
			
			if (new_pass === con_pass) {
				$.ajax({
					url:'app/userauth.php',
					type:'POST',
					data:data,
					cache:false,
					beforeSend: function(){
						submit.text("Processing...");
					},
					success: function(data){
						switch(data) {
							case 'register_complete':
								message.css('color','green');
								message.text('Register Successfully!');
								$(this)[0].reset();
								break;
							case 'register_incomplete':
								message.css('color','orange');
								message.text('Register Fail...!');
								break;
						}
					}
				});
			} else {
				message.css('color','red');
				message.text('Password not matched!');
			}

		} else {
			message.css('color','red');
			message.text('Name at last 6 Character!');
		}

	} else {
		message.css('color','red');
		message.text('All fields are Required!');
	}
});