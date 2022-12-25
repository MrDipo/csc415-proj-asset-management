<!DOCTYPE html>
<?php
  session_start();
  require "../php/employee.php";
  $result = view_made_requests($_SESSION['data']['employee_id'], $conn);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles//style2.css" />
    <!-- Boxiocns CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
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
            <li><a href="./employee.php">Employee</a></li>
          </ul>
        </li>

        <li>
          <a href="./asset.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Assets</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./asset.php">Assets</a></li>
          </ul>
        </li>

        <li>
          <a href="./request.php">
            <i class="bx bx-compass"></i>
            <span class="link_name">Requests</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./request.php">Requests</a></li>
          </ul>
        </li>

        <li>
          <div class="profile-details">
            <div class="profile-content"></div>
            <div class="name-job">
              <!-- changes start here -->
              <div class="profile_name pl-6">LOG OUT</div>
            </div>
            <a href="../php/employee_logout.php"><i class="bx bx-log-out"></i></a>
            <!-- changes stop here -->
          </div>
        </li>
      </ul>
    </div>

    <section class="home-section p-6">
      <div class="container">
        <section class="main">
          <div class="main-top">
            <h1 class="font-semibold text-3xl">My Request</h1>
            <i class="fas fa-user-cog"></i>
          </div>

          <section class="attendance">
            <div class="attendance-list">
              <!-- <h1>Request List</h1> -->
              <table class="table">
                <thead>
                  <tr>
                    <th>Assets</th>
                    <th>Date Created</th>
                    <th>Date Resolved</th>
                    <th>Request Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($requests = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $requests["asset_name"]. "</td>";
                    echo "<td>" . $requests["date_created"]. "</td>";
                    echo "<td>" . $requests["date_resolved"]. "</td>";
                    echo "<td>" . $requests["status"]. "</td>";
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
