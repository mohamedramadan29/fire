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
                              صيانة المصانع
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-users">
                              <a href="main.php?dir=company&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة مصنع جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-users">
                              <a href="main.php?dir=company&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المصانع </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-fire">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-car color4"></i>
                          <p>
                              صيانة الطفايات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-fire">
                              <a href="main.php?dir=fire&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة صيانة جديده </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-fire">
                              <a href="main.php?dir=fire&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة الطفايات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-reports">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa fa-chart-area color4"></i>
                          <p>
                              التقارير
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                           
                          <li class="nav-item" id="lnk-rep-report">
                              <a href="main.php?dir=reports&page=fire_report" class="nav-link">
                                  <i class="fa fa-chart-area nav-icon color3"></i>
                                  <p>  تقارير زيارة صيانة  الطفايات</p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-report_company">
                              <a href="main.php?dir=reports&page=company_report" class="nav-link">
                                  <i class="fa fa-chart-area nav-icon color3"></i>
                                  <p>  تقارير زيارة صيانة  الشركات</p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-report_end_company">
                              <a href="main.php?dir=reports&page=end_date_company" class="nav-link">
                                  <i class="fa fa-chart-area nav-icon color3"></i>
                                  <p>  تقارير نهاية عقود الشركات</p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-report_end_fire">
                              <a href="main.php?dir=reports&page=end_date_fire" class="nav-link">
                                  <i class="fa fa-chart-area nav-icon color3"></i>
                                  <p>  تقارير نهاية عقود  الطفايات</p>
                              </a>
                          </li>
                      </ul>
                  </li>
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