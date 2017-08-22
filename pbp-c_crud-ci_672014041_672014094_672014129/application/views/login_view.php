<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ajax CRUD with Bootstrap modals and Datatables</title>
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap/css/signin.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
 
</head>
<body>
    <div class="container">
    <center><h1 class="form-signin-heading">Form Login</h1></center>
    <form action="<?php echo site_url('login/aksi_login')?>" method="post" class="form-signin">       
        <label for="inputEmail" class="sr-only">Username</label></td>
            <input type="text" name="username" required class="form-control" placeholder="Username"></td>
        <label for="inputEmail" class="sr-only">Password</label>
            <input type="password" name="password" required class="form-control" placeholder="Password"></td>
            <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block"></td>
    </form>
    </div>
</body>
</html>