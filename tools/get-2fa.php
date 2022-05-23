<?php
require_once '../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
	die();
}
$title = 'Get 2fa | KDH Team';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>
	<div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									
									<h5>Get 2fa</h5>
								</div>
								<div class="card-body">
								    <form action="" method="POST">
									    <input type="text" name="key2fa" class="form-control" placeholder="Enter 2fa Key"><br></br>
									    <center><button  type="submit" name="submit"  class="btn btn-primary">Get Code</button></center>
									</form>
								</div>
							</div>
                        </div>
<?php
if (isset($_POST["submit"])) 
{
    $key = $_POST["key2fa"];
    
require_once 'GoogleAuthenticator.php';
	
	if($key==""){
	   
}else{	
	$ga = new PHPGangsta_GoogleAuthenticator();
	$code = $ga->getCode($key);
	$list = [
	"key"=>$key,
	"code"=>$code
	];
	$daucatmoi = json_encode($list, JSON_PRETTY_PRINT);
	$memay = json_decode($daucatmoi, true);
    echo ' <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Get 2fa Successfully</h5>
								</div>
								<div class="card-body">
								    <div class="alert alert-danger alert-dismissible" role="alert">
											
											<div class="alert-message">
												<center>'.$memay["code"].'</center>
											</div>
										</div>
<center><button  onclick="abc()"  class="btn btn-primary">Copy</button></center>
								</div>
							</div>
                        </div>';
    
    
    
    
 
    
    
}
}
    ?>
                        
                                                
        <script>
        function abc(){
            alert("Copied <?= $memay["code"]; ?>");
            copy('<?= $memay["code"]; ?>');
        }
        
    </script>
    <script>
function copy(text) {
  document.body.insertAdjacentHTML("beforeend","<div id=\"copy\" contenteditable>"+text+"</div>")
  document.getElementById("copy").focus();
  document.execCommand("selectAll");
  document.execCommand("copy");
  document.getElementById("copy").remove();
}
        </script>
<?php require_once '../includes/footer.php'; ?>