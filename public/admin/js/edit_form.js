let inputs = document.querySelectorAll("input");
let selects = document.querySelectorAll('select');
let textareas = document.querySelectorAll('textarea');
let userPicIcon = document.getElementById("user_pic_change_icon");
let companyPicIcon = document.getElementById("company_pic_change_icon");
let articlePicIcon = document.getElementById("article_change_icon");
let eventPicIcon = document.getElementById("event_change_icon");
let socialMediaForm = document.getElementById("social_media");
let paddingPic = document.getElementById("padding_pic");
let submitPannel = document.getElementById("submit_pannel");
let userPic = document.getElementById("user-pic");
let companyPic = document.getElementById("company_pic");
let articlePic = document.getElementById("article_pic");
let eventPic = document.getElementById("event_pic");
let userPicInput = document.getElementById("user_pic_input");
let companyCard = document.getElementById("companyCard");
let userCVInput = document.getElementById("user_cv_input");
let articlePicInput = document.getElementById("article_pic_input");
let eventPicInput = document.getElementById("event_pic_input");
let tagDivs = document.querySelectorAll('.tag')

let form_edit = false;

editForm()

document
  .getElementById("edit_user_button")
  .addEventListener("click", function() {
    form_edit = !form_edit;
    editForm()
  });

  function editForm() {
    inputs.forEach((input) => {
      if (form_edit) {
        input.classList.remove("border-0");
        input.disabled = false;
      } else {
        input.classList.add("border-0");
        input.disabled = true;
      }
    });

    selects.forEach((select) => {
      if (form_edit) {
        select.style.outline = '0.1px solid darkgray';
        select.disabled = false;
      } else {
        select.style.outline = 'none';
        select.disabled = true;
      }
    });

    textareas.forEach((textarea) => {
      if (form_edit) {
        textarea.classList.remove("border-0");
        textarea.disabled = false;
      } else {
        textarea.classList.add("border-0");
        textarea.disabled = true;
      }
    });

    if (form_edit) {
      if (userPicInput) {
        userPicIcon.classList.remove("d-none");

        // user pic
        document
          .getElementById("change-pic")
          .addEventListener("click", function () {
            userPicInput.click();
          });
        userPicInput.addEventListener("change", function () {
          let file = this.files[0];
          const reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function (e) {
            console.log("uploaded");
            userPic.src = e.target.result;
          };
        });
      }
      if (companyCard) {
        companyPicIcon.classList.remove("d-none");

        // company pic
        document
          .getElementById("change_company_pic")
          .addEventListener("click", function () {
            document.getElementById("company_pic_input").click();
          });

        document
          .getElementById("company_pic_input")
          .addEventListener("change", function () {
            let companyFile = this.files[0];
            const comapnyReader = new FileReader();
            comapnyReader.readAsDataURL(companyFile);

            comapnyReader.onload = function (e) {
              companyPic.src = e.target.result;
            };
          });
      }

      if (socialMediaForm) {
        socialMediaForm.classList.remove("d-none");
      }

      if (userCVInput) {
        // user cv
        document
          .getElementById("user_cv_button")
          .addEventListener("click", function () {
            userCVInput.click();
          });

        userCVInput.addEventListener("change", function () {
          document.getElementById("cv_text").innerHTML = this.files[0].name;
        });
      }

      if (paddingPic) {
        paddingPic.classList.add("d-none");
      }

      if (eventPicInput) {
        eventPicIcon.classList.remove("d-none");

        // user pic
        document
          .getElementById("change-pic")
          .addEventListener("click", function () {
            eventPicInput.click();
          });
        eventPicInput.addEventListener("change", function () {
          let file = this.files[0];
          const reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function (e) {
            eventPic.src = e.target.result;
          };
        });
      }

      if (articlePicInput) {
        articlePicIcon.classList.remove("d-none");

        // user pic
        document
          .getElementById("change-pic")
          .addEventListener("click", function () {
            articlePicInput.click();
          });
          articlePicInput.addEventListener("change", function () {
          let file = this.files[0];
          const reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function (e) {
            console.log("uploaded");
            articlePic.src = e.target.result;
          };
        });
      }

      if(tagDivs) {
        tagDivs.forEach(div => {
          div.classList.remove('d-none')
        })
      }

      submitPannel.classList.remove("d-none");
    } else {
      if (userPicInput) {
        userPicIcon.classList.add("d-none");
      }

      if (eventPicInput) {
        eventPicIcon.classList.add("d-none");
      }

      if (companyCard) {
        companyPicIcon.classList.add("d-none");
      }

      if (articlePicInput) {
        articlePicIcon.classList.add("d-none");
      }

      if (socialMediaForm) {
        socialMediaForm.classList.add("d-none");
      }

      submitPannel.classList.add("d-none");
      
      if (paddingPic) {
        paddingPic.classList.remove("d-none");
      }

      if(tagDivs) {
        tagDivs.forEach(div => {
          checkbox = div.querySelector('.tag-checkbox')
          console.log(checkbox)
          console.log(checkbox.checked)
          if(checkbox.checked) {
            div.classList.remove('d-none')
          } else {
            div.classList.add('d-none')
          }
        })
      }
    }
  }