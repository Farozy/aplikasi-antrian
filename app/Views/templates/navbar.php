<style>
  .form-check-input {
    color-adjust: exact;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: #e1e3ea;
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: contain;
    border: 3px solid #e1e3ea;
    height: 1.2em;
    margin-top: 0.15em;
    margin-right: -10px;
    -webkit-print-color-adjust: exact;
    transition: background-color 0.15s ease-in-out,
      background-position 0.15s ease-in-out, border-color 0.15s ease-in-out,
      box-shadow 0.15s ease-in-out;
    vertical-align: top;
    width: 1.2em;
  }

  @media (prefers-reduced-motion: reduce) {
    .form-check-input {
      transition: none;
    }
  }

  .form-check-input[type="checkbox"] {
    border-radius: 0.3em;
  }

  .form-check-input[type="radio"] {
    border-radius: 50%;
  }

  .form-check-input:active {
    filter: brightness(90%);
  }

  .form-check-input:focus {
    border-color: #a1afdf;
    box-shadow: 0 0 0 0.25rem rgba(67, 94, 190, 0.25);
    outline: 0;
  }

  .form-check-input:checked {
    background-color: #435ebe;
    border-color: #435ebe;
  }

  .form-check-input:checked[type="checkbox"] {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3E%3C/svg%3E");
  }

  .form-check-input:checked[type="radio"] {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='2' fill='%23fff'/%3E%3C/svg%3E");
  }

  .form-check-input[type="checkbox"]:indeterminate {
    background-color: #435ebe;
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10h8'/%3E%3C/svg%3E");
    border-color: #435ebe;
  }

  .form-check-input:disabled {
    filter: none;
    opacity: 0.5;
    pointer-events: none;
  }

  .form-check-input:disabled~.form-check-label,
  .form-check-input[disabled]~.form-check-label {
    opacity: 0.5;
  }

  .form-switch {
    padding-left: 2.5em;
  }

  .form-switch .form-check-input {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='rgba(0, 0, 0, 0.25)'/%3E%3C/svg%3E");
    background-position: 0;
    border-radius: 2em;
    margin-left: -2.5em;
    transition: background-position 0.15s ease-in-out;
    width: 2em;
  }

  @media (prefers-reduced-motion: reduce) {
    .form-switch .form-check-input {
      transition: none;
    }
  }

  .form-switch .form-check-input:focus {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23a1afdf'/%3E%3C/svg%3E");
  }

  .form-switch .form-check-input:checked {
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23fff'/%3E%3C/svg%3E");
    background-position: 100%;
  }

  .form-check-inline {
    display: inline-block;
    margin-right: 1rem;
  }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li> -->
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto mr-4">
    <!-- Navbar Search -->
    <li class="nav-item" style="margin-right: -13px">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi text-light" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
          <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
          </path>
        </svg>
        <div class="form-check form-switch fs-6 ml-2">
          <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
          <label class="form-check-label"></label>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons text-light" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
          <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
            <g transform="translate(-210 -1)">
              <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
              <circle cx="220.5" cy="11.5" r="4"></circle>
              <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
            </g>
          </g>
        </svg>
      </div>
      <div class="sidebar-toggler  x">
        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->