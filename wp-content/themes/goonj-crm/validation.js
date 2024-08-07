document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const emailInput = document.getElementById("email");
  const phoneInput = document.getElementById("phone");

  form.addEventListener("submit", function (event) {
    let valid = true;

    document
      .querySelectorAll(".errorMessage")
      .forEach((error) => error.remove());

    // Validate email
    const emailValue = emailInput.value;
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
      valid = false;
      showError(emailInput, "The e-mail address entered is invalid.");
    }

    // Validate phone number
    const phoneValue = phoneInput.value;
    if (!/^\d{10}$/.test(phoneValue)) {
      valid = false;
      showError(phoneInput, "Phone number must be exactly 10 digits.");
    }

    if (!valid) {
      event.preventDefault();
    }
  });

  emailInput.addEventListener("input", function () {
    if (emailInput.value === "") {
      clearError(emailInput);
    }
  });

  phoneInput.addEventListener("input", function () {
    if (phoneInput.value === "") {
      clearError(phoneInput);
    }
  });

  function showError(input, message) {
    const existingError = input.parentElement.querySelector(".errorMessage");
    if (existingError) {
      existingError.remove();
    }

    const error = document.createElement("div");
    error.className = "errorMessage";
    error.innerText = message;

    error.style.color = "#D64631";
    error.style.marginTop = "2px";
    error.style.fontSize = "0.875rem";
    input.parentElement.appendChild(error);

    input.style.setProperty("border-color", "#D64631", "important");
  }

  function clearError(input) {
    const error = input.parentElement.querySelector(".errorMessage");
    if (error) {
      error.remove();
    }
    input.style.removeProperty("border-color");
  }
});
