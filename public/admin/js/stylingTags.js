const colors = [
  "badge-danger",
  "badge-dark",
  "badge-success",
  "badge-primary",
  "badge-warning",
  "badge-info"
];

document.querySelectorAll(".tag").forEach(tag => {
  let i = Math.round(Math.random() * 5);
  if(tag.querySelector('input')) {
    tag.className = colors[i] + ' p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center tag'
    tag.innerHTML = tag.querySelector('input').outerHTML + ' #' + tag.querySelector('label').outerHTML
  } else {
    tag.className = colors[i] + ' p-2 me-2 my-1 badge fw-bold d-flex  align-items-center justify-content-center'
    tag.innerHTML = '#' + tag.innerHTML
  }

  console.log(tag)
});
