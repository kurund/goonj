document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    var container = document.querySelector("#bootstrap-theme > crm-angular-js");

    if (container) {
      var resetButton = container.querySelector(
        'button.af-button[type="reset"]'
      );

      if (resetButton) {
        resetButton.addEventListener("click", function (event) {
          event.preventDefault();

          var angularElement = angular.element(container);

          var baseURI = angularElement[0].baseURI;

          if (baseURI) {
            window.location.href = baseURI;
          } else {
            console.warn("Base URI not found.");
          }
        });
      } else {
        console.warn("Reset button not found.");
      }
    } else {
      console.warn("Container element not found.");
    }
  }, 1000);
});
