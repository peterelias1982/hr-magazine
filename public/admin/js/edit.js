function edit(obj) {
    //  get next tr from object
    tr = obj.parentNode;

    while (true) {
      if (tr.tagName.toLowerCase() == "tr") {
        break;
      }
      tr = tr.parentNode;
    }

    let allInputs = document.querySelectorAll("table input");
    let allButtons = document.querySelectorAll("table button:not(.delete)");

    let trInputs = tr.querySelectorAll("input");
    let trButtons = tr.querySelectorAll("button:not(.delete)");

    allInputs.forEach((node) => {
      node.disabled = true;
    });

    allButtons.forEach((button) => {
      button.classList.add("invisible");
    });

    trInputs.forEach((node) => {
      node.disabled = false;
      if (node.type.toLowerCase() == "text") {
        node.focus();
      }
    });

    trButtons.forEach((button) => {
      button.classList.remove("invisible");
    });

}
