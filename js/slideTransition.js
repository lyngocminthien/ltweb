let slider = document.querySelector(".slider .list");
let items = document.querySelectorAll(".slider .list .item");
let next = document.getElementById("next");
let prev = document.getElementById("prev");
let dots = document.querySelectorAll(".slider .dots li");

let lengthItems = items.length - 1;
let active = 0;

// next.onclick = function () {
//   active = active + 1 <= lengthItems ? active + 1 : 0;
//   reloadSlider();
// };
// prev.onclick = function () {
//   active = active - 1 >= 0 ? active - 1 : lengthItems;
//   reloadSlider();
// };

// sau 2 giây thì nút next sẽ tự động được click
let refreshInterval = setInterval(() => {
  next.click();
}, 2000);

function reloadSlider() {
  // offsetLeft sẽ căn từ lề trái đến hết bề ngang của con với thằng cha
  slider.style.left = -items[active].offsetLeft + "px";
  //
  let last_active_dot = document.querySelector(".slider .dots li.active");
  last_active_dot.classList.remove("active");
  dots[active].classList.add("active");

  // để bỏ đi hành động sau 2 giây tự động nút next được click để có thể bắt đầu lại sau 2 giây khi click vào một slider bất kì !
  clearInterval(refreshInterval);
  refreshInterval = setInterval(() => {
    next.click();
  }, 2000);
}

dots.forEach((li, key) => {
  li.addEventListener("click", () => {
    active = key;
    reloadSlider();
  });
});

// window.onresize = function (event) {
//   reloadSlider();
// };
