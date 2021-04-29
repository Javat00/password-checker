function copyText() {
/* Get the text field */
  var copyText = document.getElementById("suggested");
  /* Select the text field */
  copyText.focus();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  // now the focus is in another element
  var check = document.getElementById("randPass");
  check.focus();
  // change the button text to copied when clicked
  document.getElementById("copy").innerHTML = "Copied!";
  }
