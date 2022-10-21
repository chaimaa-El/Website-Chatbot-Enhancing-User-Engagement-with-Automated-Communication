const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

var $select = $("#ville");

$.getJSON("ville.json", function (data) {
  console.log(data);
  $select.html("");

  for (var i = 0; i < data.length; i++) {
    $select.append(
      '<option   id="' + data[i]["id"] + '">' + data[i]["ville"] + "</option>"
    );
  }
});
