/*
false=type (password) true=type (text)
*/
var state = false; 
function toggle() {
	if (state==false) {
		document.getElementById("password").setAttribute("type", "text");
		document.getElementById("eye").style.color = '#7a797e';
		state = true;
	}
	else {
		document.getElementById("password").setAttribute("type", "password");
		document.getElementById("eye").style.color = 'black';
		state = false;
	}
}

var state = false; 
function toggle2() {
	if (state==false) {
		document.getElementById("confmpass").setAttribute("type", "text");
		document.getElementById("eye2").style.color = '#7a797e';
		state = true;
	}
	else {
		document.getElementById("confmpass").setAttribute("type", "password");
		document.getElementById("eye2").style.color = 'black';
		state = false;
	}
}
