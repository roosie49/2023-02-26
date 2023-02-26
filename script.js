
// Prevent form submission if required fields are empty
document.querySelector('form').addEventListener('submit', function(event) {
  var jobtitle = document.querySelector('#jobtitle').value.trim();
  var month = document.querySelector('#month').value.trim();
  var day = document.querySelector('#day').value.trim();
  var year = document.querySelector('#year').value.trim();
  var email = document.querySelector('#email').value.trim();
  var phone = document.querySelector('#phone').value.trim();

  if (!jobtitle || !month || !day || !year) {
    alert('Please fill in all required fields.');
    event.preventDefault(); // Prevent form submission
  }
});

//Sets an empty email field to an empty string
const anEmail = document.getElementById("email");

anEmail.addEventListener("blur", function() {
	if (anEmail.value === "") {
		anEmail.value="";
	}
});

//Sets an empty phone field to an empty string
const aPhone = document.getElementById("phone");

aPhone.addEventListener("blur", function() {
	if (aPhone.value === "") {
		aPhone.value="";
	}
});

// Disables the submit button after the user clicks it to submit the form
document.addEventListener('DOMContentLoaded', function() {
// Gets the submit button element
  const submitBtn = document.getElementById("submitBtn");

// Adds a click event listener to the submit button
submitBtn.addEventListener('click', function() {
// Disables the submit button after form is submitted
    submitBtn.disabled = true;
  });
});