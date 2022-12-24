<!DOCTYPE html>
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
    <div class="sidebar close">
      <!-- <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">CodingLab</span>
      </div> -->

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
            <li><a href="./employee.php">Employee</a></li>
            <li><a href="./human_resources.php">Human Resource</a></li>
            <li><a href="./manager.php">Manager</a></li>
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
            <a href="../php/logout.php"><i class="bx bx-log-out"></i></a>
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
              <h1>Employee Requests</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Asset</th>
                    <th>Request Status</th>
                    <th>Accept</th>
                    <th>Decline</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $row = view_all_requests($conn);
                while($rows=$row->fetch_assoc())
                {
                ?>
                <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                  <td><?php echo $rows['employee_name'];?></td>
                  <td><?php echo $rows['department_name'];?></td>
                  <td><?php echo $rows['date_created'];?></td>
                  <td><?php echo $rows['asset_name'];?></td>
                  <td><?php echo $rows['status'];?></td>
                  <td>
                  <form method="POST">
                    <input type="submit" name="accept" value="Accept">
                  </form>
                  </td>
                  <td>
                  <form method="POST">
                  <input type="submit" name="reject" value="Reject">
                  </form>
                  </td>
                  <!-- <td><button >Accept</button></td>
                  <td><button onclick="<?php reject_request($rows['employee_id'], $rows['asset_id'], $conn)?>">Decline</button></td> -->
                  </form>
                </tr>
                <?php
                }
                ?>
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
