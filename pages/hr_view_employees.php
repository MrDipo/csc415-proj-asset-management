<!DOCTYPE html>
<?php
  session_start();
  require "../php/hr.php";
  $result = get_all_employees($conn);
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
        <img src="../emo$employees/logo.png" alt="" class="pl-2" />
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
            <a href="human_resources.php">
              <i class="bx bx-collection"></i>
              <span class="link_name">Dashboard</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Dashboard</a></li>
            <li><a href="./human_resources.php">Human Resources</a></li>
          </ul>
        </li>

        <li>
          <a href="./hr_view_assigned_assets.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Assigned Assets</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./hr_view_assigned_assets.php">Assigned Assets</a></li>
          </ul>
        </li>

        <li>
          <a href="./hr_view_employees.php">
            <i class="bx bx-compass"></i>
            <span class="link_name">Employees</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./hr_view_employees.php">Employees</a></li>
          </ul>
        </li>

        <li>
          <div class="profile-details">
            <div class="profile-content"></div>
            <div class="name-job">
              <!-- changes start here -->
              <div class="profile_name pl-6">LOG OUT</div>
            </div>
            <a href="../php/hr_logout.php"><i class="bx bx-log-out"></i></a>
            <!-- changes stop here -->
          </div>
        </li>
      </ul>
    </div>

    <section class="home-section p-6">
      <div class="container">
        <section class="main">
          <div class="main-top">
            <h1 class="font-semibold text-3xl">Employee List</h1>
            <i class="fas fa-user-cog"></i>
          </div>

          <section class="attendance">
            <div class="attendance-list">
              <!-- <h1>Request List</h1> -->
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Employment Type</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($employees = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $employees["employee_id"]. "</td>";
                    echo "<td>" . $employees["employee_name"]. "</td>";
                    echo "<td>" . $employees["address"]. "</td>";
                    echo "<td>" . $employees["phone"]. "</td>";
                    echo "<td>" . $employees["email"]. "</td>";
                    echo "<td>" . $employees["role"]. "</td>";
                    echo "<td>" . $employees["employment_type"]. "</td>";
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
