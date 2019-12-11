
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(to top, #E6E6FA, #4B0082);">
    <!-- Brand Logo -->

    <a href="index3.html" class="brand-link ml-5">
    <img class="img-profile" width="140" height="70" src="<?= base_url('assets/dist/img/rs2.png')?>" >
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
          <!-- <img src="<?= base_url('assets/dist/img/profile/') . $dd_user['foto'];?>" class="img-circle elevation-2" alt="User Image"> -->
          <img class="img-profile rounded-circle" src="<?= base_url('assets/dist/img/profile/') . $dd_user['foto']; ?>">
        </div>
        <div class="info">
          <a href="<?= site_url('profile/index'); ?>" class="d-block"><?= $dd_user['name']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`,`menu`
                                FROM `user_menu` JOIN `user_access_menu` 
                                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                               WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
                                 ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

           <?php foreach ($menu as $m) : ?>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link active" style="background-color: #8A2BE2">
            <i class="nav-icon fas fa-angle-right"></i>
              <p>
                <?= $m['menu']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <?php
              $menuId = $m['id'];
              $querySubMenu = "SELECT *
                        FROM `user_sub_menu` JOIN `user_menu` 
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                       WHERE `user_sub_menu`.`menu_id` = $menuId
                       AND `user_sub_menu`.`id_active` = 1
                         
                      ";
               $subMenu =$this->db->query($querySubMenu)->result_array();
              ?>

              <?php foreach($subMenu as $sm):?>
            <ul class="nav nav-treeview ml-3">
               <li class="nav-item">
                <?php $sm['title'];?> 
                  <a href="<?= base_url($sm['url']);?>" class="nav-link">
                  <i class="<?= $sm ['icon'];?>"></i>
                  <p><?=$sm['title'];?></p>
                </a>
              </li>
            </ul>
            <?php endforeach; ?>
          </li>
          <?php endforeach; ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    
    <!-- /.sidebar -->
  </aside>
 
  <?php
                


            