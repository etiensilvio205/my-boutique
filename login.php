
<!DOCTYPE html>
<html>
<div class="w3-row" >
					<div class="w3-quarter w3-container "></div>
  
					<div class="w3-half w3-container" >
									<div id="content" class="w3-container w3-card-4" style="background-color:#c2ffff;padding:8px;">

										<div class="w3-container" style="background-color:#192438;text-align:center;color:#c2ffff;">
										  <h2>myBoutique</h2>
										</div>

										<form class="w3-container" style="text-align:center;" >

										
										<div class="w3-row w3-section">
										  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
											<div class="w3-rest">
											  <input class="w3-input w3-border" name="username" type="text" placeholder="Username" ng-model="user.username" required>
											</div>
										</div>
										<div class="w3-row w3-section">
										  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
											<div class="w3-rest">
											  <input class="w3-input w3-border" name="password" type="password" placeholder="Password" ng-model="user.pwd" required>
											</div>
										</div>
										<div class="w3-row w3-section">
										<button class="w3-btn w3-white w3-border" ng-click="validate()" ng-disabled="!user.username||!user.pwd">Login</button></br>
										</div>
										<div class="w3-row w3-section">
										<span ng-hide="access"><font color="red">Your credentials are not correct!</font></span></br>
										<i ng-hide="load" class="fa fa-spinner w3-spin" style="font-size:64px"></i>
										</div>
										</form>

									</div>
		
					</div>
	
					<div class="w3-quarter w3-container"></div>
		</div></html>