<!-- Sidebar -->
<ul class="sidebar navbar-nav ">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'clients' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Clients</span>
        </a>
        <div class="dropdown-menu animate-menu slideIn-menu" aria-labelledby="pagesDropdown">
            <?php if($this->fungsi->user_login()->role == "admin") { ?>
            <a class="dropdown-item" href="<?php echo site_url('admin/clients/add') ?>">New Client</a>
            <?php } ?>
            <a class="dropdown-item" href="<?php echo site_url('admin/clients') ?>">List Client</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'projects' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Projects</span>
        </a>
        <div class="dropdown-menu animate-menu slideIn-menu" aria-labelledby="pagesDropdown">
            <?php if($this->fungsi->user_login()->role == "admin") { ?>
            <a class="dropdown-item" href="<?php echo site_url('admin/projects/add') ?>">New Project</a>
            <?php } ?>
            <a class="dropdown-item" href="<?php echo site_url('admin/projects') ?>">List Project</a>
        </div>
    </li>
    <?php if($this->fungsi->user_login()->role == "admin") { ?>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'tasks' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Tasks</span>
        </a>
        <div class="dropdown-menu animate-menu slideIn-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/tasks/add') ?>">New Task</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/tasks') ?>">List Task</a>
        </div>
    </li>
    <?php } ?>
    <?php if(($this->fungsi->user_login()->role == "employee")||($this->fungsi->user_login()->role == "freelance")) { ?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'tasksfu' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/tasksfu') ?>">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Tasks</span>
        </a>
    </li>
    <?php } ?>
    <?php if($this->fungsi->user_login()->role == "admin") { ?>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'users' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div class="dropdown-menu animate-menu slideIn-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/users/add') ?>">New User</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/users') ?>">List User</a>
        </div>
    </li>
    <?php } ?>
    <?php if($this->fungsi->user_login()->role == "admin") { ?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'file' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/file') ?>">
            <i class="fa fa-archive"></i>
            <span>File Tasks</span>
        </a>
    </li>
    <?php } ?>
    <?php if($this->fungsi->user_login()->role == "admin") { ?>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'email' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
        <div class="dropdown-menu animate-menu slideIn-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/email') ?>">Email Company</a>
        </div>
    </li>
    <?php } ?>
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li> -->
    
</ul>