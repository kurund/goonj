document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    var container = document.querySelector("#bootstrap-theme > crm-angular-js");

    var resetButton = container
      ? container.querySelector('button[type="reset"]')
      : null;

    if (container && resetButton) {
      resetButton.addEventListener("click", function (event) {
        event.preventDefault();

        var angularElement = angular.element(container);
        var scope = angularElement.scope();
        if (scope) {
          var fields = container.querySelectorAll(
            "input, textarea, select, ul.select2-choices, div.select2-container"
          );

          fields.forEach(function (field) {
            if (
              field.tagName.toLowerCase() === "ul" &&
              field.classList.contains("select2-choices")
            ) {
              var selectedItems = field.querySelectorAll(
                ".select2-search-choice"
              );
              selectedItems.forEach(function (item) {
                item.remove();
              });
            } else if (
              field.tagName.toLowerCase() === "div" &&
              field.classList.contains("select2-container")
            ) {
              var chosenSpan = field.querySelector(".select2-chosen");
              var select2Choice = field.querySelector(".select2-choice");

              if (chosenSpan) {
                chosenSpan.textContent = "Select";
              }
              if (select2Choice) {
                select2Choice.classList.add("select2-default");
              }
              if (field.classList.contains("select2-allowclear")) {
                field.classList.remove("select2-allowclear");
              }
            } else if (
              field.tagName.toLowerCase() === "input" ||
              field.tagName.toLowerCase() === "textarea"
            ) {
              field.value = "";
            } else if (field.tagName.toLowerCase() === "select") {
              field.selectedIndex = 0;
            }
          });

          scope.$apply();
        }
      });
    }
  }, 1000);
});
