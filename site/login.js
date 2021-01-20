function login(){
	console.log("hjkh")
	$.ajax({
		type:'post',
		url:'http://site/basa.php',
		data:{
			'req':'login',
			'username':document.getElementById("username").value,
			'passwordd':document.getElementById('passwordd').value,
		},
		success:function(resp){
		console.log(resp)
		document.body.innerHTML=resp;
		}
	})
}
function registr(){
	console.log("hesgh")
	$.ajax({
		type:'post',
		url:'http://site/basa.php',
		data:{
			'req':'registration',
			'login':document.getElementById("login").value,
			'password':document.getElementById("password").value,
		},
		success:function(resp){
		console.log(resp)
		document.body.innerHTML=resp;
		}
	})
}
function openbox(id) {
	console.log("hjkh")
		var all = document.querySelectorAll(".block-of-text");
		for (var i = 0; i < all.length; i++) {
		if (all[i].id == id) {
			all[i].style.display = (all[i].style.display == 'none')? 'block' : 'none';
		} else {
			all[i].style.display = 'none';
		}
	}
}
function newhorse() {
	console.log("hjkh")
	$.ajax({
		type:'post',
		url:'http://site/info.php',
		data:{
			'req':'newhorse',
			'name':document.getElementById("name").value,
			'age':document.getElementById("age").value,
			'data':document.getElementById("data").value,
			'height':document.getElementById("height").value,
			'species':document.getElementById("species").value,
			'some':document.getElementById("some").value,
		},
		success:function(resp){
		console.log(resp)
		document.body.innerHTML=resp;
		}
	})
}
