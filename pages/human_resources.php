<!DOCTYPE html>
<?php
  session_start();
  require "../php/hr.php";
  $result = view_all_pending_requests($conn);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles//style2.css" />
    <link rel="stylesheet" href="modal.css" />
    <!-- Boxiocns CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <!-- modal -->
    <div id="my-modal" class="modal">
      <span class="close bg-red-500 rounded-md py-1 px-2">&times;</span>

      <!-- Font Awesome Cdn Link -->
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      />

      <div class="wrapper">
        <h1 class="pb-6 font-light text-2xl">Add Employee</h1>

        <form method="POST" action="../php/hr.php">
        <input type="text" name="department" placeholder="Enter department" />
          <input type="text" name="employee_name" placeholder="Enter name" />
          <input type="text" name="address" placeholder="Address" />
          <input type="text" name="phone" placeholder="Enter Phone" />
          <input type="email" name="email" placeholder="Enter Email" />
          <input type="text" name="password" placeholder="Password" />
          <input type="text" name="role" placeholder="Enter Role" />
          <div class="flex w-1/2 justify-content ml-7">
            <label for="full-time">Full-Time</label>
            <input
              class="w-10 mt-1"
              type="radio"
              name="employment_type"
              value="full-time"
            />
          </div>
          <div class="flex w-1/2 justify-content ml-7">
            <label for="part-time">Part-Time</label>
            <input
              class="w-10 mt-1"
              type="radio"
              name="employment_type"
              value="part-time"
            />
          </div>
          <div class="flex w-1/2 justify-content ml-7">
            <label for="intern">Intern</label>
            <input
              class="w-10 mt-1"
              type="radio"
              name="employment_type"
              value="intern"
            />
          </div>
          <div class="flex w-1/2 justify-content ml-7">
            <label for="contract">Contract</label>
            <input
              class="w-10 mt-1"
              type="radio"
              name="employment_type"
              value="contract"
            />
          </div>

          <closeform></closeform>
          <input type="submit" name="submit" value="Submit" class="w-1/2 mt-5" />
        </form>
      </div>
    </div>
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
            <li><a href="./human_resources.php">Human Resource</a></li>
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
            <h1 class="font-semibold text-3xl">Human Resources</h1>
          </div>
          <div class="right-0 w-1/4 mt-5">
            <button class="employment_type" id="modal-btn">Add employee</button>
            <button class="employment_type" id="modal-btn"><a href="./hr_view_assigned_assets.php">View Assigned Assets</a></button>
            <button class="employment_type" id="modal-btn"><a href="./hr_view_employees.php">View All Employees</a></button>
          </div>

          <section class="attendance">
            <div class="attendance-list">
              <h1>Pending Employee Requests</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date Created</th>
                    <th>Date Resolved</th>
                    <th>Assets</th>
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
                    echo '<form action="../php/redirect_request.php" method="post">';
                    echo '<input type="hidden" name="asset_id" value="'.$requests["asset_id"].'">';
                    echo '<input type="hidden" name="emp_id" value="'.$requests["employee_id"].'">';
                    echo '<td><input type="submit" name="submit" value="Redirect" /></td>';
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
    <script src="./modal.js"></script>
  </body>
</html>
