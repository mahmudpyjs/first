var feedbackform_url = 'tetrisconfig.php';
var feedbackform_emailsubject = 'Feedback Form';

var feedbackform_fc = document.getElementById('feedbackcontainer');
var feedbackform_fb = document.getElementById('feedbackbutton');
var feedbackform_ff = document.getElementById('feedbackform');
var feedbackform_fe = document.getElementById('feedbackemail');
var feedbackform_fm = document.getElementById('feedbackmessage');
function extendFeedback() {
	feedbackform_fc.style.width = '320px';
	feedbackform_fc.style.height = '240px';
	feedbackform_fc.style.bottom = '5px';
	feedbackform_fb.style.marginRight = '272px'
	feedbackform_ff.style.display = 'block';
	feedbackform_fb.onclick = function() { closeFeedback(); }
}
function closeFeedback() {
	feedbackform_fc.style.width = '40px';
	feedbackform_fc.style.height = '120px';
	feedbackform_fc.style.bottom = '80px';
	feedbackform_fb.style.marginRight = '-45px'
	feedbackform_ff.style.display = 'none';
	feedbackform_fb.onclick = function() { extendFeedback(); }
}
function submitFeedback() {
	if (feedbackform_fe.value.indexOf('@') == -1) { alert('You need to enter a valid email address'); return; }
	feedbackform_ff.innerHTML = '<p style="text-align: center; font-size: 16px; margin-top: 20px;">Message Sent</p>';
	setTimeout(function() { closeFeedback(); }, 2000);

	// Ajax Post
	var feedbackform_lookup = "email=" + encodeURIComponent(feedbackform_fe.value) + '&subject=' + encodeURIComponent(feedbackform_emailsubject) + '&message=' + encodeURIComponent(feedbackform_fm.value); // $_POST['email']
	if (window.XMLHttpRequest) { feedbackform_xmlhttp=new XMLHttpRequest(); } else { feedbackform_xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
	feedbackform_xmlhttp.onreadystatechange=function() {
		if (feedbackform_xmlhttp.readyState==4 && feedbackform_xmlhttp.status==200) {
			console.log(feedbackform_xmlhttp.responseText);
		}
	}
	feedbackform_xmlhttp.open("POST",feedbackform_url,true);
	feedbackform_xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	feedbackform_xmlhttp.setRequestHeader("Content-length", feedbackform_lookup.length);
	feedbackform_xmlhttp.setRequestHeader("Connection", "close");
	feedbackform_xmlhttp.send(feedbackform_lookup);
}