<?php
session_start();
if( !isset($_SESSION['username']) ){
    header("location:login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>


		<div class="w3-row">
					<div class="w3-quarter w3-container "></div>
  
					<div class="w3-half w3-container" style="text-align:center;">
									<div class="w3-container w3-card-4 w3-center" style="background-color:#c2ffff;padding:8px;">

										<div class="w3-container" style="background-color:#192438;text-align:center;color:#c2ffff;">
										  <h2>myBoutique</h2>
										  
												<div class="w3-row w3-container w3-center">
												  <div class="w3-col s12 m6 l6 w3-center">
												     <?php  echo "<p>USER: ".$_SESSION['username']."</p>"; ?>
												  </div>
												  <div class="w3-col s12 m6 l6 w3-center">
												     <form action="logout.php" method="post"><button class="w3-btn w3-border" type="submit" value="0">Logout</button></form>
												  </div>
												</div>
										</div>
								
											<div class="w3-row w3-center w3-container" style="padding:9px;">
												
											
												
												<div class="w3-col s6 m6 l3 w3-center" >
												<button  class="w3-btn" style="max-width:50px;min-width:75px;" ng-click="showSearch()"><img src="icons/search.png" class="w3-image" ></button>
												</div>
												
													<div class="w3-col s6 m6 l3 w3-center" >
												<button class="w3-btn" style="max-width:50px;min-width:75px;" ng-click="showSale()"><img src="icons/sale2.png" class="w3-image"  ></button>
												</div> 
												
												<div class="w3-col s6 m6 l3 w3-center">
												<button  class="w3-btn" style="max-width:50px;min-width:75px;" ng-click="showAddCustomer()"><img src="icons/addcustomer.png" class="w3-image" ></button>
												</div>
												
												<div class="w3-col s6 m6 l3 w3-center" >
												<button  class="w3-btn" style="max-width:50px;min-width:75px;" ng-click="showPayment()"><img src="icons/payment.png" class="w3-image" ></button>
												</div>
												
												
												
											</div>
										
									</div>
		
					</div>
	
					<div class="w3-quarter w3-container"></div>
					
					
	
    


</div>
</html>