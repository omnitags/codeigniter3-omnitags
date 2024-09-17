<!-- sidebar.php -->
<nav id="sidebar" class="d-lg-block bg-light sidebar collapse">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Settings</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Logout</a>
    </div>
</nav>

<style>
  #sidebar {
    position: fixed;
    top: 56px; /* Adjust according to your navbar height */
    left: 0;
    width: 250px;
    height: 100%;
    z-index: 1000;
    background-color: #f8f9fa;
    padding-top: 1rem;
    overflow-x: hidden;
    overflow-y: auto;
  }

  #konten {
    margin-left: 250px; /* Adjust according to the sidebar width */
  }

  @media (max-width: 992px) {
    #sidebar {
      margin-left: -250px;
      transition: margin 0.25s ease-in-out;
    }

    #sidebar.show {
      margin-left: 0;
    }

    #konten {
      margin-left: 0;
    }
  }
</style>

<!-- Toggle button for small screens -->
<button class="btn btn-primary d-lg-none" type="button" data-toggle="collapse" data-target="#sidebar">
    Toggle Sidebar
</button>
