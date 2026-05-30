 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">

         <a href="#" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img src="{{ asset('assets/img/logo.png') }}" alt="Library Logo" style="max-height: 40px;">
             </span>
             <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">Event Planner</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>
     <ul class="menu-inner py-1">

         <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
             <a href="{{ route('admin.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div>Dashboard</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.banner.*') ? 'active' : '' }}">
             <a href="{{ route('admin.banner.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Banner</div>
             </a>
         </li>

        <li class="menu-item {{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
             <a href="{{ route('admin.service.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Service</div>
             </a>
         </li>

          <li class="menu-item {{ request()->routeIs('admin.service-details.*') ? 'active' : '' }}">
             <a href="{{ route('admin.service-details.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Service Details</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
             <a href="{{ route('admin.categories.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Gallery Categories</div>
             </a>
         </li>

          <li class="menu-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
             <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Galleries Images</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.cms.*') ? 'active' : '' }}">
             <a href="{{ route('admin.cms.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>CMS</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs('admin.faq.*') ? 'active' : '' }}">
             <a href="{{ route('admin.faq.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>FAQ</div>
             </a>
         </li>

          <li class="menu-item {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
             <a href="{{ route('admin.inquiries.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-save"></i>
                 <div>Inquiries</div>
             </a>
         </li>

     </ul>
 </aside>
