<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php
    // Assuming you have already set $_SESSION['uname'] when the user logs in.
        if(!empty($_SESSION['uname'])){
            $uname = $_SESSION['uname'];

            $query = "select * from users where uname = '$uname'";
            $result = mysqli_query($conn, $query);
            $fetch = mysqli_fetch_assoc($result);

        } // Fallback to 'Guest' if session is not set

        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            margin-left: 250px; /* Default sidebar width */
            transition: margin-left 0.3s ease;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            padding: 20px 15px;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar .navbar-brand img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        .sidebar .nav-link {
            color: white;
            display: block;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #ffc107;
            color: white;
        }

        .dropdown-menu {
            background-color: #343a40;
            border: none;
        }

        .dropdown-menu a {
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .dropdown-menu a:hover {
            background-color: #495057;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                margin-bottom: 20px;
            }

            body {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar bg-dark">
        <div class="navbar-brand text-center">
            <img src="/bhrm-main/images/logo.png" alt="Logo">
        </div>
        <ul class="nav flex-column">
            <!-- User Info -->
            <li class="nav-item text-center mb-4">
                <img class="rounded-circle mb-2" src="/bhrm-main/<?php echo $fetch['image'] ?? 'default.png'; ?>" alt="Profile" width="60" height="60">
                <span class="d-block text-white">Welcome <?php echo $fetch['fname'] ?? 'Guest'; ?></span>
            </li>
            <!-- Navigation Links -->
            <li class="nav-item">
                <a class="nav-link" href="/bhrm-main/dashboardadmin.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/bhrm-main/index.php">Manage Boarding House</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/bhrm-main/php/bhapplications.php">Applications</a>
            </li>
            <!-- Dropdown Menu -->
            <ul class="nav">
            <li class="nav-item dropdown mt-3 position-relative">
                <a class="nav-link text-white dropdown-toggle" href="#" id="userMenu" role="button">
                    Account
                </a>
                <ul class="dropdown-menu dropdown-menu-dark position-absolute" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                    <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    

    <!-- JavaScript -->
    <script>
        // Add dropdown toggle functionality manually
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.getElementById('userMenu');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            // Toggle the dropdown menu on click
            dropdownToggle.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default anchor behavior
                dropdownMenu.classList.toggle('show'); // Toggle visibility
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function (event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show'); // Hide dropdown
                }
            });
        });
    </script>
     
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
