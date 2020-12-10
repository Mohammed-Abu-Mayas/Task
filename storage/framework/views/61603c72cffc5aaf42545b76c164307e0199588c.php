<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
       <div class="main-menu-content">
           <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
   
               <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                   class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
               </li>

               <li class="nav-item"><a href=""><i class="la la-shopping-cart"></i>
                   <span class="menu-title" data-i18n="nav.dash.main">المتاجر </span>
                   <span
                       class="badge badge badge-danger badge-pill float-right mr-2"><?php echo e(App\Models\Store::count()); ?></span>
               </a>
                   <ul class="menu-content">
                       <li class="active"><a class="menu-item" href="<?php echo e(route('admin.store')); ?>"
                                             data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                       </li>
                     <li><a class="menu-item" href="<?php echo e(route('admin.store.create')); ?>" data-i18n="nav.dash.crypto">أضافة
                           متجر جديد </a>
                       </li>
                   </ul>
               </li>

               <li class="nav-item"><a href=""><i class="la la-shopping-cart"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الأصناف </span>
                <span
                    class="badge badge badge-success badge-pill float-right mr-2"><?php echo e(App\Models\Category::count()); ?></span>
            </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="<?php echo e(route('admin.category')); ?>"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                  <li><a class="menu-item" href="<?php echo e(route('admin.category.create')); ?>" data-i18n="nav.dash.crypto">أضافة
                        صنف جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-shopping-cart"></i>
                <span class="menu-title" data-i18n="nav.dash.main">المنتجات </span>
                <span
                    class="badge badge badge-warning badge-pill float-right mr-2"><?php echo e(App\Models\Product::count()); ?></span>
            </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="<?php echo e(route('admin.product')); ?>"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                  <li><a class="menu-item" href="<?php echo e(route('admin.product.create')); ?>" data-i18n="nav.dash.crypto">أضافة
                        منتج جديد </a>
                    </li>
                </ul>
            </li>
               
           </ul>
       </div>
   </div><?php /**PATH C:\xampp\htdocs\lezzoo_task\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>