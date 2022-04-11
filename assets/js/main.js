// Edit responsive via js
let rowLayout = document.getElementById("row-layout");
let columnLayout = document.getElementById("column-layout");
let rowPassword = document.getElementById("row-password");
let columnPassword = document.getElementById("column-password");
let outerWidth = window.outerWidth;

if (outerWidth <= 576) {
	rowLayout.classList.remove("row");
	rowPassword.classList.remove("row");
	columnLayout.classList.add("mb-3");
	columnPassword.classList.add("mb-3");
}

// My Alert display none with setTimeOut
setTimeout(() => {
	let myAlert = document.querySelector(".alert");
	myAlert.classList.toggle("hide-myalert");
	setTimeout(() => {
		myAlert.classList.toggle("d-none");
	}, 2000);
}, 4000);
