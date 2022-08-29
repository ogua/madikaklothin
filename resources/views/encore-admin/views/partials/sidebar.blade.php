<aside class="main-sidebar elevation-4 sidebar-{{ config('admin.theme.sidebar') }}">

    <a href="{{ admin_url('/') }}" class="brand-link {{ config('admin.theme.logo') ? 'navbar-'.config('admin.theme.logo') : '' }}">
        <img src="{!! config('admin.logo.image') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{!! config('admin.logo.text', config('admin.name')) !!}</span>
    </a>

    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Admin::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Admin::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                   <a href="http://madikaklodingh.com/admin" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
               <a href="http://madikaklodingh.com/admin/auth/users" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
        {{-- <li class="nav-item">
           <a href="http://madikaklodingh.com/admin/auth/menu" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Menu</p>
        </a>
    </li> --}}
    <li class="nav-item">
       <a href="http://madikaklodingh.com/admin/employees" class="nav-link">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>Employees</p>
    </a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/apprentices" class="nav-link">
    <i class="nav-icon fas fa-user-alt-slash"></i>
    <p>Apprentices</p>
</a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/dress-blouse-skirts" class="nav-link active">
    <i class="nav-icon far fa-hand-scissors"></i>
    <p>Dress / Blouse / Skirt</p>
</a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/bridals-wear" class="nav-link">
    <i class="nav-icon far fa-hand-scissors"></i>
    <p>bridals  wear</p>
</a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/trouser-jumpsuits" class="nav-link">
    <i class="nav-icon far fa-hand-scissors"></i>
    <p>Trouser / Jumpsuit</p>
</a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/make-payment" class="nav-link">
    <i class="nav-icon fas fa-file-invoice-dollar"></i>
    <p>Record Payment</p>
</a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/transactions" class="nav-link">
    <i class="nav-icon fas fa-comment-dollar"></i>
    <p>Transactions</p>
</a>
</li>
<li class="nav-item">
   <a href="http://madikaklodingh.com/admin/backup-restore-database" class="nav-link">
    <i class="nav-icon fas fa-download"></i>
    <p>Backup</p>
</a>
</li>
</ul>
</nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
