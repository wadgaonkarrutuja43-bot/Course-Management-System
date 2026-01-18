
<script>

    document.getElementById("adminLoginForm").addEventListener("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch('Admindashboard.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = "Admindashboard.php"; 
            } else {
                document.getElementById("error-msg").textContent = "Invalid username or password";
            }
        })
        .catch(error => console.error('Error:', error));
});

</script>
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">All Rights Reserverd || <a href="#" data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter">Admin Login</a></small>
</footer>

<!-- start Admin Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" 
aria-Labelledby="adminLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content" style="background-image:url('admin.jpg');">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id="adminLoginModalCenterLabel">Admin Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Admin Login Form -->
                <form id="adminLoginForm" method="post" action="Admindashboard.php">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="adminLogEmail" class="pl-2 font-weight-bold text-white">Email</label>
                        <input type="email" class="form-control" id="adminLogEmail" placeholder="Email" " name="username" >
                    </div>
                    <br>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="adminLogPass" class="pl-2 font-weight-bold text-white">Password</label>
                        <input type="password" class="form-control " id="adminLogPass" placeholder="Password" name="password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="adminLoginBtn" name="adminLoginBtn">Login</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
                </form>
        </div>
    </div>
</div>
<!-- End Admin Modal -->
