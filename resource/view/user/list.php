<?php resource("layouts/portion/header.php") ?>
<div id="main">
    <!-- begin::navigation -->
    <div class="navigation">
        <div class="navigation-menu-tab">
            <div>
                <div class="navigation-menu-tab-header" data-toggle="tooltip" title="" data-placement="right" data-original-title="Roxana Roussell">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                        <figure class="avatar avatar-sm">
                            <img src="<?php echo asset("assets/media/image/user/women_avatar1.jpg") ?>" class="rounded-circle" alt="avatar">
                        </figure>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-3 text-center" data-backround-image="<?php echo asset("assets/media/image/image1.jpg") ?>" style="background: url(&quot;http://htc.test:8000/assets/admin/media/image/image1.jpg&quot;);">
                            <figure class="avatar mb-3">
                                <img src="<?php echo asset("assets/media/image/user/women_avatar1.jpg"); ?>" class="rounded-circle" alt="image">
                            </figure>
                            <h6 class="d-flex align-items-center justify-content-center">
                                Roxana Roussell
                                <a href="#" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="" data-original-title="Edit profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                </a>
                            </h6>
                            <small>Balance: <strong>$105</strong></small>
                        </div>
                        <div class="dropdown-menu-body">
                            <div class="border-bottom p-4">
                                <h6 class="text-uppercase font-size-11 d-flex justify-content-between">
                                    Storage
                                    <span>%25</span>
                                </h6>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Profile</a>
                                <a href="#" class="list-group-item d-flex">
                                    Followers <span class="text-muted ml-auto">214</span>
                                </a>
                                <a href="#" class="list-group-item d-flex">
                                    Inbox <span class="text-muted ml-auto">18</span>
                                </a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Billing</a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Need help?</a>
                                <a href="#" class="list-group-item text-danger" data-sidebar-target="#settings">Sign Out!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <ul>
                    <li>
                        <a class="" style="font-size: 20px" href="http://localhost/MVC-PROJECT-STRUCTURE-WITH-PHP/home" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboards">
                            <i class="fa fa-dashboard"></i>
                        </a>
                    </li>
                    <li>
                        <a class="" style="font-size: 20px" href="#" data-toggle="tooltip" data-placement="right" title="" data-nav-target="#web" data-original-title="Web">
                            <i class="fa fa-desktop"></i>
                        </a>
                    </li>
                    <li>
                        <a class="" style="font-size: 20px" href="#" data-toggle="tooltip" data-placement="right" title="" data-nav-target="#shopping" data-original-title="Shopping">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li>
                        <a class="" style="font-size: 20px" href="#" data-toggle="tooltip" data-placement="right" title="" data-nav-target="#defination" data-original-title="Defination">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </a>
                    </li>
                    <li>
                        <a class="" style="font-size: 20px" href="#" data-toggle="tooltip" data-placement="right" title="" data-nav-target="#pages" data-original-title="Pages">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <a class="" style="font-size: 20px" href="#" data-toggle="tooltip" data-placement="right" title="" data-nav-target="#settings" data-original-title="Settings">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a class="" href="" data-toggle="tooltip" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-placement="right" title="" data-original-title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        </a>
                        <form action="http://htc.test:8000/admin/adminLogout" id="logout-form" method="POST" class="d-none">
                            <input type="hidden" name="_token" value="y1Dq9Am13zHthpRFHGNRN44YU8UY2jYlfzlak2r3">    </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- begin::navigation menu -->
        <div class="navigation-menu-body" tabindex="3" style="overflow: hidden; outline: none;">
            <!-- begin::navigation-logo -->
            <div>
                <div id="navigation-logo">
                    <a href="index.html">
                        <img class="logo" src="<?php echo asset("assets/media/image/garantibarter.png"); ?>" alt="logo">
                    </a>
                </div>
            </div>
            <!-- end::navigation-logo -->
            <div class="navigation-menu-group">
                <div  id="dashboards">
                    <ul>
                        <h5 class="ml-3"><a href="http://localhost/MVC-PROJECT-STRUCTURE-WITH-PHP/home">Dashboards</a></h5>
                    </ul>
                </div>
                <div id="web">
                    <ul>
                        <h5 class="ml-3">Web</h5>
                        <li><a href="http://localhost/MVC-PROJECT-STRUCTURE-WITH-PHP/home">Menu</a></li>

                        <li><a href="http://htc.test:8000/admin/page">Page</a></li>

                        <li><a href="">Slider</a></li>

                        <li>
                            <a href="">Banner<i class="sub-menu-arrow ti-angle-up"></i></a>
                            <ul>
                                <li>
                                    <a href="banner">Banner Top</a>
                                </li>
                                <li>
                                    <a href="banner">Banner Middle</a>
                                </li>
                                <li>
                                    <a href="banner">Banner Lower</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div id="shopping">
                    <ul>
                        <h5 class="ml-3">Shopping</h5>
                        <li><a href="http://htc.test:8000/admin/category">Category</a></li>

                        <li><a href="http://htc.test:8000/admin/category">Brand</a></li>

                        <li><a href="http://htc.test:8000/admin/category">Product</a></li>

                    </ul>
                </div>
                <div id="defination">
                    <ul>
                        <h5 class="ml-3">Defination</h5>
                        <li><a href="http://htc.test:8000/admin/language">Language</a></li>

                    </ul>
                </div>
                <div id="pages">
                    <ul>
                        <h5 class="ml-3">Pages</h5>
                    </ul>
                </div>
                <div id="settings">
                    <ul>
                        <h5 class="ml-3">Settings</h5>
                    </ul>
                </div>
                <div id="logout">
                    <ul>
                        <h5 class="ml-3">Logout</h5>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end::navigation menu -->
        <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr" style="width: 8px; z-index: 4; cursor: default; position: absolute; top: 0px; left: 167px; height: 102px; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 8px; z-index: 4; top: 94px; left: 0px; position: absolute; cursor: default; display: none;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div></div>
    <!-- end::navigation -->

    <!-- begin::main-content -->
    <div class="main-content">
        <div style="min-height: 820px">
            <!-- begin::page-header -->
            <div class="page-header">
                <div class="container-fluid d-sm-flex justify-content-between">
                    <div class="">
                        <h5></h5>
                        <br>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-list mr-2"></i>
                                    <a href="" class="text-primary">Kullanıcı Listesi</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a class="btn btn-dark text-white" href=""> <i class="ti-back-left font-weight-bold mr-1"></i><span class="line">Geri Dön</span></a>
                        <button class="btn btn-primary" id="button-getForm" data-action="<?php echo "user/create" ?>"><i class="fa fa-plus mr-1 text-white"></i><span class="line"> Ekle</span></button>
                    </div>
                </div>
            </div>
            <!-- end::page-header -->
            <!-- begin::page content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover table-list mb-0">
                                                <thead>
                                                <tr>
                                                    <th class="text-left font-weight-bold" width="20"><input type="checkbox"></th>
                                                    <th class="text-left font-weight-bold" width="100">First Name</th>
                                                    <th class="text-left font-weight-bold" width="200">Last Name</th>
                                                    <th class="text-left font-weight-bold" width="200">Identification number</th>
                                                    <th class="text-left font-weight-bold" width="200">Email</th>
                                                    <th class="text-left font-weight-bold" width="100">Phone number</th>
                                                    <th class="text-right font-weight-bold" width="100">Settings</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(count($data["users"]) > 0 ): ?>
                                                <?php foreach ($data["users"] as $user): ?>
                                                <tr>
                                                    <td class="text-left"><input type="checkbox" name="select[]" value=""></td>
                                                    <td class="text-left"><?php echo $user->first_name; ?></td>
                                                    <td class="text-left"><?php echo $user->last_name; ?></td>
                                                    <td class="text-left"><?php echo $user->identification_number; ?></td>
                                                    <td class="text-left"><?php echo $user->email; ?></td>
                                                    <td class="text-left"><?php echo $user->phone; ?></td>
                                                    <td class="text-right">
                                                        <div class="ml-auto">
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                                </button>
<!--                                                                <div class="dropdown-menu dropdown-menu-right m-r-0-minus">
                                                                    <a href="" class="dropdown-item"><i class="fa fa-window-restore font-weight-bold text-dark mr-2"></i></a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a id="button-getForm" data-action="{{route('admin.web.category.editOnlyTrash', $category->category_id)}}" class="dropdown-item"><i class="fa fa-edit font-weight-bold text-dark mr-2"></i></a>
                                                                    <a id="button-getForm" data-action="{{route('admin.web.category.create')}}" class="dropdown-item"><i class="fa fa-plus font-weight-bold text-dark mr-2"></i></a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="" class="dropdown-item"><i class="ti-back-left font-weight-bold text-dark mr-2"></i></a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="" class="dropdown-item"><i class="fa fa-trash font-weight-bold text-dark mr-2"></i></a>
                                                                    <form action="" id="deleted-form" method="delete">

                                                                    </form>
                                                                </div>-->

                                                                <div class="dropdown-menu dropdown-menu-right m-r-0-minus">
                                                                    <button id="button-getForm" data-action="<?php echo "user/edit/"; echo $user->id ;?>" class="dropdown-item"><i class="fa fa-edit font-weight-bold text-dark mr-2">Edit</i></button>
                                                                    <div class="dropdown-divider"></div>
<!--                                                                    <a id="button-getForm" data-action="{{route('admin.web.category.create')}}" class="dropdown-item"><i class="fa fa-plus font-weight-bold text-dark mr-2"></i></a>-->
<!--                                                                    <div class="dropdown-divider"></div>-->
                                                                    <button href="{{route('admin.home.dashboard')}}" class="dropdown-item"><i class="ti-back-left font-weight-bold text-dark mr-2">Rollback</i></button>
                                                                    <div class="dropdown-divider"></div>
                                                                    <button href="" id="button-deleteFrom" data-action="<?php echo "user/delete/"; echo $user->id; ?>" class="dropdown-item"><i class="fa fa-trash font-weight-bold text-dark mr-2">Delete</i></button>
                                                                    <?php endforeach; ?>
                                                                    <form action="" id="deleted-form" method="delete">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php else:  ?>
                                                <tr>
                                                    <td  class="text-center" colspan="7">
                                                        <h1 style="font-size: 70px">
                                                            <i class="fa fa-database"></i>
                                                        </h1>
                                                        <h4>NOT DATA FOUND</h4>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end::page content -->
        </div>
        <!-- begin::footer -->
        <?php resource("layouts/portion/footer.php"); ?>
        <!-- end::main-content -->
