<!DOCTYPE html>
<?php 
  session_start();
  require "../php/db_connect.php";
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
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
        <h1 class="pb-6 font-light text-2xl">Create Request</h1>

        <form method="POST" action="../php/employee.php">
          <input type="text" name = "employee_id" placeholder="<?php echo $_SESSION['data']['employee_id']; ?>" class="text-grey"/><br/>
          <select name="asset" id="asset" class="bg-[#dfe9f5] text-[grey] w-[85%] py-2 rounded-md pl-3">
          <?php
              $query = "SELECT asset_name FROM asset;";
              $result = mysqli_query($conn, $query);
              while($rows=$result->fetch_assoc())
              {
            ?>
            <option value="<?php echo $rows['asset_name'];?>"><?php echo $rows['asset_name'];?></option>
            <?php
              }
            ?>
          </select> 
          <closeform></closeform>
          <input type="submit" class="w-1/2 mt-5" value="Submit" />
        </form>
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
              <div class="profile_name">LOG OUT</div>
            </div>
            <i class="bx bx-log-out"></i>
          </div>
        </li>
      </ul>

      <li>
          <div class="profile-details">
            <div class="profile-content"></div>
            <div class="name-job">
              <div class="profile_name pl-6">LOG OUT</div>
            </div>
            <a href="../php/employee_logout.php"><i class="bx bx-log-out"></i></a>
          </div>
        </li>
      </ul>
    </div>
    </div>

    <section class="home-section p-6">
      <div class="container">
        <section class="main">
          <div class="main-top">
            
          </div>
          <div class="flex right-0 space-x-4 w-1/2">
          <?php echo "<h1 class=font-semibold text-3xl>WELCOME," .htmlspecialchars($_SESSION['username']) . "</h1>"; ?>
            <button class="add-employee" id="modal-btn">
              <a href="#"> Create Request</a>
            </button>
            <button class="add-employee">
              <a href="./request.php">View Request</a>
            </button>
            <button class="add-employee">
              <a href="./asset.php"> View Assets</a>
            </button>
          </div>

          <!-- <section class="attendance">
            <div class="attendance-list">
              <h1>Employee List</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Equipment</th>
                    <th>Request Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>01</td>
                    <td>Sam David</td>
                    <td>Design</td>
                    <td>03-24-22</td>
                    <td>Laptop</td>
                    <td>Approved</td>
                  </tr>
                  <tr>
                    <td>02</td>
                    <td>Balbina Kherr</td>
                    <td>Coding</td>
                    <td>03-24-22</td>
                    <td>Monitor</td>
                    <td>Pending</td>
                  </tr>
                  <tr>
                    <td>03</td>
                    <td>Badan John</td>
                    <td>testing</td>
                    <td>03-24-22</td>
                    <td>Printer</td>
                    <td>Declined</td>
                  </tr>
                  <tr>
                    <td>04</td>
                    <td>Sara David</td>
                    <td>Design</td>
                    <td>03-24-22</td>
                    <td>Printer</td>
                    <td>Approved</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section> -->
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
    <script src="modal.js"></script>
  </body>
</html>
