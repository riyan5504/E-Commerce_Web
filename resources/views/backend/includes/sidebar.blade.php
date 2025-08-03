<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="{{url('/admin/dashboard')}}" class="brand-link">
                    <!--begin::Brand Image-->
                    <img src="{{asset('/backend/dist/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">Ponnoo</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->

                    {{-- Add Category Menu --}}
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item open-menu">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-collection"></i>
                                <p>
                                    Category
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ms-3">
                                <li class="nav-item">
                                    <a href="{{url('/category/create')}}" class="nav-link">
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/category/list')}}" class="nav-link">
                                        <i class="nav-icon bi bi-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                    </ul>

                    {{-- Add Sub Category Menu --}}
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-chevron-double-right"></i>
                                <p>
                                    Sub Category
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ms-3">
                                <li class="nav-item">
                                    <a href="{{url('/sub-category/create')}}" class="nav-link">
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/sub-category/list')}}" class="nav-link">
                                        <i class="nav-icon bi bi-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                    </ul>

                    {{-- Add Product Menu --}}
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-bag"></i>
                                <p>
                                    Product
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ms-3">
                                <li class="nav-item">
                                    <a href="{{url('/product/create')}}" class="nav-link">
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/product/list')}}" class="nav-link">
                                        <i class="nav-icon bi bi-list"></i>
                                        <p>List</p>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>