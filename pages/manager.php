<!DOCTYPE html>
<?php
  session_start();
  require "../php/common.php";
?>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/style2.css" />
    <!-- Boxiocns CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
  <?php
    $result = view_all_requests($conn);
  ?>
    <div class="sidebar close">
      <!-- logo starts here -->
      <div class="logo-details">
        <img src="../assets/logo.png" alt="" class="pl-2" />
      </div>
      <!-- logo stops here -->
      <ul class="nav-links">
        <li>
          <div class="icon-link">
            <i class="bx bx-menu pl-5"></i>
          </div>
        </li>
        <li>
          <!-- <a href="#">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Dashboard</span>
          </a> -->
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Dashboard</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-collection"></i>
              <span class="link_name">Dashboard</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Dashboard</a></li>
            <li><a href="./employee.html">Employee</a></li>
            <li><a href="./human_resources.html">Human Resource</a></li>
            <li><a href="./manager.html">Manager</a></li>
          </ul>
        </li>

        <li>
          <a href="./inventory.html">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Inventory</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./inventory.html">Inventory</a></li>
          </ul>
        </li>

        <li>
          <a href="./request.html">
            <i class="bx bx-compass"></i>
            <span class="link_name">Requests</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./request.html">Requests</a></li>
          </ul>
        </li>

        <li>
          <div class="profile-details">
            <div class="profile-content"></div>
            <div class="name-job">
              <!-- changes start here -->
              <div class="profile_name pl-6">LOG OUT</div>
            </div>
            <a href="../php/manager_logout.php"><i class="bx bx-log-out"></i></a>
            <!-- changes stop here -->
          </div>
        </li>
      </ul>
    </div>

    <section class="home-section p-6">
      <div class="container">
        <section class="main">
          <div class="main-top">
            <h1 class="font-semibold text-3xl">Manager</h1>
            <i class="fas fa-user-cog"></i>
          </div>

          <section class="attendance">
            <div class="attendance-list">
              <h1>Employee Request</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date Created</th>
                    <th>Date Resolved</th>
                    <th>Assets</th>
                    <th>Request Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($requests = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $requests["employee_name"]. "</td>";
                    echo "<td>" . $requests["department_name"]. "</td>";
                    echo "<td>" . $requests["date_created"]. "</td>";
                    echo "<td>" . $requests["date_resolved"]. "</td>";
                    echo "<td>" . $requests["asset_name"]. "</td>";
                    echo "<td>" . $requests["status"]. "</td>";
                    echo '<form action="../php/manager.php" method="post">';
                    echo '<input type="hidden" name="asset_id" value="'.$requests["asset_id"].'">';
                    echo '<input type="hidden" name="emp_id" value="'.$requests["employee_id"].'">';
                    echo '<td><input type="submit" name="action" value="Approve" /></td>';
                    echo '<td><input type="submit" name="action" value="Reject" /></td>';
                    echo '</form>';
                    echo "</tr>";
                  } ?>
                </tbody>
              </table>
            </div>
          </section>
        </section>
      </div>
    </section>
    <script>
      let arrow = document.querySelectorAll(".arrow");
      for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
          let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
          arrowParent.classList.toggle("showMenu");
        });
      }
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".bx-menu");
      console.log(sidebarBtn);
      sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });
    </script>
  </body>
</html>
