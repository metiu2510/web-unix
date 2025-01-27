<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Alert</title>
    <link rel = "icon" type = "image/png" href = "assets/img/unix.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Features-Centered-Icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<style>
pre {
    text-align: left;
    white-space: pre-line;
    height: 400px
}
.loader {
  display: none;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
}

.loading {
  border: 2px solid #ccc;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border-top-color: #1ecd97;
  border-left-color: #1ecd97;
  animation: spin 1s infinite ease-in;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
div.container {
  overflow: auto;
  white-space: nowrap;
}

div.container div.column {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu div.column:hover {
  background-color: #777;
}
</style>

<body id="page-top">
    <?php
        $function= $_POST['alert-type'];
        $name = $_POST['name'];
        $output = shell_exec('ansible-playbook -i '.$name.', playbook/uptime-agenthealth.yml --vault-password-file playbook/.vault --extra-vars "function='.$function.' hostname='.$name.'"|grep -A 9 -E "Pengecekan|Notes"|tr -d "*,],},[,{,\t,\v,\f,\b"|sed "s/PLAY//g"|sed "s/RECAP//g"|sed "/top/d"');
    ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: var(--bs-dark);">
            <div class="container-fluid d-flex flex-column p-0"><a href="index.html" class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><i class="fas fa-server"></i>
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>Unix</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.html"><i class="fas fa-home"></i><span>Home</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="alert.html"><i class="fas fa-exclamation-triangle"></i><span>Alert&nbsp;</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="connection.html"><i class="fas fa-wifi"></i><span>Connection</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="--bs-body-bg: #ffffff;background: url(&quot;assets/img/Blue-and-purple-abstract-background_1600x900.jpg&quot;), var(--bs-indigo);filter: brightness(109%) contrast(87%);">
                    <div class="container-fluid"><a href="index.html" class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><i class="fas fa-server" style="color: var(--bs-light);"></i>
                            <div class="sidebar-brand-icon rotate-n-15"></div>
                            <div class="sidebar-brand-text mx-3"><span style="font-weight: bold;font-size: 20px;color: var(--bs-light);">UNIX</span></div>
                        </a></div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-dark mb-4">Check Alert Channel SOL (UNIX Team)</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-3" style="width: 442.725px;">
                                <div class="card-header py-3" style="height: 45px;margin-top: 0px;letter-spacing: 0px;line-height: 14px;width: 439.725px;"><label class="form-label" for="name" style="color: var(--bs-purple);line-height: 24px;"><strong>Check Alert Channel SOL (UNIX Team)</strong></label></div>
                                <div class="card-body" style="width: 428.725px;height: 400px">
                                <form name="myform" id="myform" action="action.php" method="post" >
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <div class="mb-3"><label class="form-label" for="company"><strong>Hostname</strong><br></label><input class="form-control" type="text" id="name" placeholder="Enter hostname from alert" name="name"required value="<?php echo $name; ?>"></div><label class="form-label" for="alert-type"><strong>Alert Type</strong><br></label>
                                                <select name="alert-type" id="select" class="form-control">
                                                    <option value="agent-health">Agent Health</option>
                                                    <option value="high-cpu">High CPU</option>
                                                    <option value="high-mem">High Memory</option>
                                                    <option value="find-ip">Find IP</option>
                                                </select>
                                                <div id="floating-label-1" class="form-floating mb-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" style="color: var(--bs-body-bg);background: var(--bs-purple);"onclick="spinner()">Submit</button></div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-3" style="width: 728.875px;">
                                <div class="card-header py-3" style="height: 45px;width: 726.875px;"><label class="form-label" for="username" style="color: var(--bs-purple);line-height: 24px;"><strong>Hasil Pengecheckan Alert</strong></label></div>
                                <div class="card-body" style="height: 400px;width: 726.875px;">
                                <form  action=action.php method="post" >
                                    <div class="mb-3">
                                        <pre id="hasil" style="height: 350px;">
                                            <?php
                                                if(isset($output)){
                                                    echo "$output";
                                                }
                                                else{
                                                    echo "Hostname does not exist";
                                                }
                                            ?>
                                        </pre>
                                        <div class="loader">
                                            <div class="loading">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer" style="background: var(--bs-body-bg);">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © UNIX 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
<script type="text/javascript">
        function spinner() {
            var empt = document.forms["myform"]["name"].value;
            var x = document.getElementById("hasil");
            if(empt==""){
                return false
            }
            else{
                document.getElementsByClassName("loader")[0].style.display = "block";
                x.style.display = "none";
                return true
            }
        }
</script>
</html>