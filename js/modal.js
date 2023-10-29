// Add
const btnAccount = document.querySelector(".btnAccount");
const modal = document.querySelector(".js-modal");
const modalContainer = document.querySelector(".js-modal-container");
const modalClose = document.querySelector(".js-modal-close");

// Hàm hiển thị modal (thêm class open vào modal)
function showModal() {
  modal.classList.add("open");
}

// Hàm ẩn modal (gỡ bỏ class open của modal)
function hideModal() {
  modal.classList.remove("open");
}

// Nghe hành vi click
btnAccount.addEventListener("click", showModal);

// Nghe hành vi click vào button close
modalClose.addEventListener("click", hideModal);

// Hành vi nhấn ra bên ngoài container sẽ close đi
modal.addEventListener("click", hideModal);

// Hàm ngăn chặn hành vi close của thẻ cha (thuật ngữ sủi bọt nước trong js)
modalContainer.addEventListener("click", function (event) {
  event.stopPropagation();
});
