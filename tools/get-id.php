<?php
require_once '../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
	die();
}
$title = 'Get ID | KDH Team';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (isset($_POST["link"])){

$url = "https://id.atpsoftware.vn/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "linkCheckUid=".$_POST["link"];

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$idfb=explode("<", explode('padding: 10px 100px 0px 100px;text-transform: uppercase;font-size: 16px;font-weight: 700;outline: none;position: relative;transition: all .3s ease-out;z-index: 0;text-align: center;overflow: hidden;">' , $resp)[1])[0];

}

?>

  
  
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				

	


                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Get ID Facebook</h5>
								</div>
								<div class="card-body">
								    <form action="" method="POST">
									    <input type="text" name="link" class="form-control" placeholder="Link post , Link profile , ..."><br></br>
									    <center><button class="btn btn-primary">Get Now</button></center>
									</form>
								</div>
							</div>
                        </div>

                        
                        <?php
                        
                        if ($idfb){
                        
                        ?>
                        
                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Get ID Successfully</h5>
								</div>
								<div class="card-body">
								    <div class="alert alert-secondary alert-dismissible" role="alert">
											
											<div class="alert-message">
												<?php 
												if ($idfb == "Không tìm thấy, hãy thử lại một lần nữa xem."){
												    $idfb = "Invalid Link";
												}
												?>
												<center><?=$idfb;?></center>
											</div>
										</div>

								</div>
							</div>
                        </div>
                        
                        <?php
                        
                        }else if ($resp){
                        
                        ?>
                        
                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Get ID Failed</h5>
								</div>
								<div class="card-body">
								    <div class="alert alert-danger alert-dismissible" role="alert">
											
											<div class="alert-message">
												<center>Invalid Link</center>
											</div>
										</div>

								</div>
							</div>
                        </div>
                        
                        <?php
                        }
                        ?>
			

            </script>
<?php require_once '../includes/footer.php'; ?>