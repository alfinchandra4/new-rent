<div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
    <form class="input-group m-2 my-lg-0 ">
        <div class="input-group-prepend">
            <button type="button" class="btn no-shadow no-bg px-0">
                <i data-feather="search"></i>
            </button>
        </div>
        <input type="text" class="form-control no-border no-shadow no-bg typeahead" placeholder="Search components..."
            data-plugin="typeahead" data-api="../assets/api/menu.json">
    </form>
</div>
<ul class="nav navbar-menu order-1 order-lg-2">
    <li class="nav-item dropdown">
        <a class="nav-link px-2" data-toggle="dropdown">
            <i data-feather="settings"></i>
        </a>
        <!-- ############ Setting START-->
        <div class="dropdown-menu dropdown-menu-center mt-3 w animate fadeIn">
            <div class="setting px-3">
                <div class="mb-2 text-muted">
                    <strong>Setting:</strong>
                </div>
                <div class="mb-3" id="settingLayout">
                    <label class="ui-check ui-check-rounded my-1 d-block">
                        <input type="checkbox" name="stickyHeader" checked="checked">
                        <i></i>
                        <small>Sticky header</small>
                    </label>
                    <label class="ui-check ui-check-rounded my-1 d-block">
                        <input type="checkbox" name="stickyAside" checked="checked">
                        <i></i>
                        <small>Sticky aside</small>
                    </label>
                    <label class="ui-check ui-check-rounded my-1 d-block">
                        <input type="checkbox" name="foldedAside">
                        <i></i>
                        <small>Folded Aside</small>
                    </label>
                    <label class="ui-check ui-check-rounded my-1 d-block">
                        <input type="checkbox" name="hideAside">
                        <i></i>
                        <small>Hide Aside</small>
                    </label>
                </div>
                <div class="mb-2 text-muted">
                    <strong>Color:</strong>
                </div>
                <div class="mb-2">
                    <label class="radio radio-inline ui-check ui-check-md">
                        <input type="radio" name="bg" value="">
                        <i></i>
                    </label>
                    <label class="radio radio-inline ui-check ui-check-color ui-check-md">
                        <input type="radio" name="bg" value="bg-dark">
                        <i class="bg-dark"></i>
                    </label>
                </div>
            </div>
        </div>
        <!-- ############ Setting END-->
    </li>


    <!-- User dropdown menu -->
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color">
            <span>{{ auth()->user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn">
            <a class="dropdown-item" href="/logout">Sign out</a>
        </div>
    </li>
    <!-- Navarbar toggle btn -->
    <li class="nav-item d-lg-none">
        <a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class data-target="#navbarToggler">
            <i data-feather="search"></i>
        </a>
    </li>
    <li class="nav-item d-lg-none">
        <a class="nav-link px-1" data-toggle="modal" data-target="#aside">
            <i data-feather="menu"></i>
        </a>
    </li>
</ul>
