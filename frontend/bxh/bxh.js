document.addEventListener("DOMContentLoaded", function() {
  var rankingContainer = document.querySelector(".ranking-container");
  var rankingItems = Array.prototype.slice.call(document.querySelectorAll(".ranking-item"));

  // Hàm để cập nhật thứ tự xếp hạng
  function updateRanking() {
      // Sắp xếp các phần tử theo lượt xem (data-views)
      rankingItems.sort(function(a, b) {
          var viewsA = parseInt(a.getAttribute("data-views"), 10);
          var viewsB = parseInt(b.getAttribute("data-views"), 10);
          return viewsB - viewsA;
      });

      // Xóa tất cả các phần tử hiện tại trong container
      rankingContainer.innerHTML = "";

      // Thêm các phần tử đã sắp xếp vào container
      rankingItems.forEach(function(item) {
          rankingContainer.appendChild(item);
      });
  }

  // Duyệt qua từng phần tử xếp hạng
  rankingItems.forEach(function(item) {
      var itemId = item.getAttribute("data-id"); // Lấy id của phần tử
      var views = parseInt(localStorage.getItem("views" + itemId), 10); // Lấy số lượt xem từ localStorage

      if (isNaN(views)) { // Nếu không có trong localStorage, lấy từ thuộc tính data-views
          views = parseInt(item.getAttribute("data-views"), 10);
      }

      item.setAttribute("data-views", views); // Cập nhật thuộc tính data-views của phần tử
      var viewCountElement = item.querySelector(".view-count"); // Chọn phần tử hiển thị số lượt xem
      viewCountElement.textContent = views.toLocaleString() + " lượt xem"; // Cập nhật nội dung hiển thị

      item.addEventListener("click", function() {
          views += 1;
          item.setAttribute("data-views", views); // Cập nhật thuộc tính data-views của phần tử
          localStorage.setItem("views" + itemId, views); // Lưu số lượt xem vào localStorage
          viewCountElement.textContent = views.toLocaleString() + " lượt xem"; // Cập nhật nội dung hiển thị
          updateRanking();
      });
  });
  updateRanking();
});
