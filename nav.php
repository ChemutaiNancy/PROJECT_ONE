<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Bank of Uowa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="customer.php">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="issue.php">Issue Loans</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="outstanding.php">Outstanding Loans</a>
            </li>

            <?php if ($_SESSION["type"]==2):?>

                <li class="nav-item">
                    <a class="nav-link" href="reports.php">Reports</a>
                 </li>

                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>

            <?php endif; ?>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><?=$_SESSION["names"]?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>