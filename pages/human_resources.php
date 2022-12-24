<!DOCTYPE html>
<?php
  require "../php/check_login.php";
  require "../php/manager.php";
  require "../php/common_hr_manager.php";
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

        <form>
          <input type="text" placeholder="Enter username" />
          <input type="password" placeholder="Password" />
          <input type="text" placeholder="Address" />
          <input type="email" placeholder="Enter Email" />
          <input type="text" placeholder="Enter Phone" />
          <input type="text" placeholder="Enter Role" />
          <input type="text" placeholder="Employment_type" />

          <closeform></closeform>
        </form>
        <button class="add-employee w-1/2 mt-5">Submit</button>
      </div>
    </div>
    <div class="sidebar close">
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
            <li><a href="./human_resources.php">Human Resource</a></li>
            <li><a href="./manager.php">Manager</a></li>
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Inventory</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="./inventory.html">Inventory</a></li>
          </ul>
        </li>

        <li>
          <a href="#">
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
            <h1 class="font-semibold text-3xl">Human Resources</h1>
          </div>
          <div class="right-0 w-1/4 mt-5">
            <button class="add-employee" id="modal-btn">Add employee</button>
          </div>

          <section class="attendance">
            <div class="attendance-list">
              <h1>Employee Requests</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date Created</th>
                    <th>Equipment</th>
                    <th>Request Status</th>
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
    <script src="./modal.js"></script>
  </body>
</html>
