<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('app.dashboard')); ?>" class="brand-link">
      <img x-data="{}" x-ref="username" src="<?php echo e(auth()->user()->avatar_url); ?>" alt="afmsd logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AFMSD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="<?php echo e(route('app.dashboard')); ?>" class="nav-link <?php echo e(request()->is('app/dashboard') ? 'active' : ''); ?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              
              <?php $__currentLoopData = getSidebar(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  @permission($mainMenu->slug.'-index')
              <li class="nav-item has-treeview <?php echo e(request()->segment(2) == $mainMenu->url ? 'menu-open' : ''); ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon <?php echo e($mainMenu->icon); ?>"></i>
                  <p>
                    <?php echo e($mainMenu->name); ?>

                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview ml-3">
                  <?php $__currentLoopData = $mainMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  @permission($submenu->slug.'-index')
                  <li class="nav-item">
                    <a href="<?php echo e(route('app.'.$submenu->url)); ?>" class="nav-link <?php echo e(request()->is('app/'.$submenu->url) ? 'active' : ''); ?>">
                      <i class="<?php echo e($submenu->icon); ?> nav-icon"></i>
                      <p><?php echo e($submenu->name); ?></p>
                    </a>
                  </li>
                  @endpermission
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </li>
                  @endpermission
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php /**PATH D:\laragon\www\larave-livewire3\resources\views/backend/layouts/partials/sidebar.blade.php ENDPATH**/ ?>