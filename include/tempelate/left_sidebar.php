  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="main.php?dir=dashboard&page=dashboard" class="brand-link">
          <span class="brand-text font-weight-light" style="display:block;margin:auto"> موسسة انطفاء
          </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item" id="lnk-customer">
                      <a href="main.php?dir=dashboard&page=dashboard" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              <?php echo $lang['dashboard']; ?>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item" id="lnk-users">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-car color4"></i>
                          <p>
                              صيانة المواقع
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-users">
                              <a href="main.php?dir=company&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة موقع جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-users">
                              <a href="main.php?dir=company&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المواقع </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-sales-company">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-car color3"></i>
                          <p>
                              <?php echo $lang['booking']; ?>
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <!-- 
                          <li class="nav-item">
                              <a href="main.php?dir=rental&page=add_rental" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة حجز جديدة </p>
                              </a>
                          </li>
-->
                          <li class="nav-item" id="lnk-add-sales-company">
                              <a href="main.php?dir=rental&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p><?php echo $lang['watch_booking']; ?></p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <!--
                  <li class="nav-item">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              البانرات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="main.php?dir=banner&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة بانر جديدة </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="main.php?dir=banner&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة البانرات </p>
                              </a>
                          </li>
                      </ul>
                  </li>
-->
                  <li class="nav-item">
                      <a href="signout.php" class="nav-link">
                          <i class="fa-solid fa-arrow-right-from-bracket color11"></i>
                          <p>
                              <?php echo $lang['logout']; ?>
                              <i class=""></i>
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>