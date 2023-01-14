const menuToggle = document.querySelector(".menu-toggle input");
const nav = document.querySelector("nav ul");

menuToggle.addEventListener("click", function () {
	nav.classList.toggle("slide");
});

// OTP
document.addEventListener("DOMContentLoaded", function (event) {
	function OTPInput() {
		const inputs = document.querySelectorAll("#otp > *[id]");
		for (let i = 0; i < inputs.length; i++) {
			inputs[i].addEventListener("keydown", function (event) {
				if (event.key === "Backspace") {
					inputs[i].value = "";
					if (i !== 0) inputs[i - 1].focus();
				} else {
					if (i === inputs.length - 1 && inputs[i].value !== "") {
						return true;
					} else if (event.keyCode > 47 && event.keyCode < 58) {
						inputs[i].value = event.key;
						if (i !== inputs.length - 1) inputs[i + 1].focus();
						event.preventDefault();
					} else if (event.keyCode > 64 && event.keyCode < 91) {
						inputs[i].value = String.fromCharCode(event.keyCode);
						if (i !== inputs.length - 1) inputs[i + 1].focus();
						event.preventDefault();
					}
				}
			});
		}
	}
	OTPInput();
});

// Scroll Navbar
document.onreadystatechange = function () {
	let lastScrollPosition = 0;
	const navbar = document.querySelector(".nav-bar");
	window.addEventListener("scroll", function (e) {
		lastScrollPosition = window.scrollY;

		if (lastScrollPosition > 100) navbar.classList.add("navbar-shadow");
		else navbar.classList.remove("navbar-shadow");
	});
};

// My Alert display none with setTimeOut
setTimeout(() => {
	let myAlert = document.querySelector(".alert");
	myAlert.classList.toggle("hide-myalert");
	setTimeout(() => {
		myAlert.classList.toggle("d-none");
	}, 3000);
}, 5000);

// Edit responsive via js
let rowLayout = document.getElementById("row-layout");
let columnLayout = document.getElementById("column-layout");
let outerWidth = window.outerWidth;
