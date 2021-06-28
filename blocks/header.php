<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white
    border-bottom shadow-sm">
        <h4 class="my-0 mr-md-auto font-weight-normal">PHP course</h4>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Main</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="about.php">Contacts</a>
        </nav>
        <?php
            error_reporting(0);
            if($_COOKIE['user'] == 'true'):
        ?>
        <a class="btn btn-outline-primary" href="auth.php">User account</a>
        <?php else: ?>
        <a class="btn btn-outline-primary" href="auth.php">Sign in</a>
        <?php endif; ?>
    </div>
</header>
