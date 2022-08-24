// $(document).ready(function (e) {
// 	$("button[type='button'], input[type='button'], a.btn").on('click', function () {
// 		$(this).find('.defaultbtnicon').removeClass('d-inline-block');
// 		$(this).find('.defaultbtnicon').addClass('d-none');
// 		$(this).find('.loadingbtnicon').removeClass('d-none');
// 		$(this).find('.loadingbtnicon').addClass('d-inline-block');
// 	});
// });
// End of Document Ready

var t,lt,cdinterval;

window.onload = resetTimer;
document.onkeypress = resetTimer;

window.addEventListener('mousemove', e=> {
	resetTimer();
});

function logout() {

	//console.log('logout called');

	lt = setTimeout(function () { 
		window.location.href = '/admin/auth/logout';
	}, 30000);

	cdinterval = setInterval(function () {
		var oldtime = 30;
		var newtime = oldtime - 1;
	}, 1000);

}

function resetTimer() {
	clearTimeout(t);
	t = setTimeout(logout, 1800000) //logs out in 30 minutes
	clearTimeout(lt);
	clearInterval(cdinterval);
}


// document.querySelector("button type='submit'").click(function(){
// 	alert('working');
// });