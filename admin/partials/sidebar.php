<div class="sidebar">
  <div class="icon-container">
    <div class="arrow-sidebar">
      <p></p>
      <i id="toggle-icon" class="fa-solid fa-arrow-right"></i>
    </div>
  </div>
  <div class="icon-container">
    <a href="../pages/index.php">
      <p>Dashboard</p><i class="fa-solid fa-chart-line"></i>
    </a>
  </div>
  <div class="icon-container">
    <a href="../pages/new_product.php">
      <p>New Product</p><i class="fa-solid fa-plus"></i>
    </a>
  </div>
  <div class="icon-container">
    <a href="../pages/display.php">
      <p>List Product</p><i class="fa-solid fa-list"></i>
    </a>
  </div>
  <div class="icon-container">
    <a href="../pages/order_list.php">
      <p>List Order</p><i class="fa-solid fa-cart-shopping"></i>
    </a>
  </div>
</div>


<script>
  const sidebar = document.querySelector(".sidebar");
  const arrow = document.querySelector(".arrow-sidebar");
  const icon = document.getElementById("toggle-icon");
  arrow.addEventListener("click", () => {
    sidebar.classList.toggle("sidebar-toggle");

    // Check if the current icon has the "fa-arrow-right" class
    if (icon.classList.contains("fa-arrow-right")) {
      // If it does, remove that class and add the "fa-arrow-left" class
      icon.classList.remove("fa-arrow-right");
      icon.classList.add("fa-arrow-left");
    } else {
      // If it doesn't, remove the "fa-arrow-left" class and add the "fa-arrow-right" class
      icon.classList.remove("fa-arrow-left");
      icon.classList.add("fa-arrow-right");
    }
  })
</script>