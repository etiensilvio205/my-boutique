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
									<div class="w3-quarter w3-container"></div>
									
									<div class="w3-half w3-container w3-card-4 " style="background-color:#c2ffff;">
									
										<div class="w3-container">
										    <div class="w3-row w3-section" style="color:#192438;height:12px">
											<div class="w3-col">
											<i class="w3-xlarge fa fa-arrow-left" ng-click="toHome()"></i>
											</div>
											</div>
											<div class="w3-row w3-section " style="background-color:#192438;text-align:center;color:#c2ffff;">
											<div class="w3-col">
											<h4>New Sale</h4>
											</div>
											</div>
										</div>	
										<div id="recentPanel" class="w3-row w3-panel w3-card-4 w3-round-xlarge w3-container w3-section w3-center w3-animate-top" ng-hide="press">
											<table class="w3-table w3-centered" ng-model="recents">
											<th colspan="4">Most Recent</th><tr >
										<td class="w3-col s12 m6 l3 w3-animate-top" style=""><button class="w3-btn w3-circle" ng-click="addToSale(recents[0].Name)" style="background-color:#192438;outline:0;">
													
														<span class="w3-badge w3-large" style="background-color:#192438;text-align:center;color:#c2ffff;">{{recents[0].Name}}</span></br>
															<span class="w3-badge w3-red w3-tiny w3-animate-left" ng-if="recents[0].Balance>500">Rs{{recents[0].Balance}}</span>
															<span class="w3-badge w3-green w3-tiny w3-animate-right" ng-if="recents[0].Balance<500">Rs{{recents[0].Balance}}</span>
													</button>
												</td>
												<td class="w3-col s12 m6 l3 w3-animate-top">
													<button class="w3-btn w3-circle" style="background-color:#192438;outline:0;" ng-click="addToSale(recents[1].Name)">
														<span class="w3-badge w3-large" style="background-color:#192438;text-align:center;color:#c2ffff;">{{recents[1].Name}}</span></br>
															<span class="w3-badge w3-red w3-tiny w3-animate-left" ng-if="recents[1].Balance>500">Rs{{recents[1].Balance}}</span>
															<span class="w3-badge w3-green w3-tiny w3-animate-right" ng-if="recents[1].Balance<500">Rs{{recents[1].Balance}}</span>
													</button>
												</td>
												<td class="w3-col s12 m6 l3 w3-animate-top">
													<button class="w3-btn w3-circle" style="background-color:#192438;outline:0;" ng-click="addToSale(recents[2].Name)">
														<span class="w3-badge w3-large" style="background-color:#192438;text-align:center;color:#c2ffff;">{{recents[2].Name}}</span></br>
															<span class="w3-badge w3-red w3-tiny w3-animate-left" ng-if="recents[2].Balance>500">Rs{{recents[2].Balance}}</span>
															<span class="w3-badge w3-green w3-tiny w3-animate-right" ng-if="recents[2].Balance<500">Rs{{recents[2].Balance}}</span>
													</button>
												</td>
												<td class="w3-col s12 m6 l3 w3-animate-top">
													<button class="w3-btn w3-circle" style="background-color:#192438;outline:0;" ng-click="addToSale(recents[3].Name)">
														<span class="w3-badge w3-large" style="background-color:#192438;text-align:center;color:#c2ffff;">{{recents[3].Name}}</span></br>
															<span class="w3-badge w3-red w3-tiny w3-animate-left" ng-if="recents[3].Balance>500">Rs{{recents[3].Balance}}</span>
															<span class="w3-badge w3-green w3-tiny w3-animate-right" ng-if="recents[3].Balance<500">Rs{{recents[3].Balance}}</span>
													</button>
												</td>
											</tr></table>
											
										</div>
										<div class="w3-row w3-container w3-center">
										<div class="w3-col s12 m12 l12">
										<button class="w3-circle w3-btn" style="outline:0;" ng-click="hideButton()"><b>^</b></button>
										</div>
										</div>
										<form class="w3-container" style="text-align:center;" >
												
												
												
												<div class="w3-row w3-section">
														<select class="w3-select w3-border" ng-model="customerSale.name" ng-required="!customerSale.name" ng-change="clear()">
														<option value="" selected disabled>Customer</option>
														<option ng-repeat="x in customers" ng-model="option">{{x.Name}}</option>
														</select>
												</div>
												
												<div class="w3-row w3-section w3-animate-top" ng-hide="bal">
												  <span>Balance:{{balance}}</span>
												</div>
												
												<div class="w3-row w3-section">
												  <input class="w3-input w3-border" type="text" placeholder="Product" ng-model="customerSale.product" ng-required="!customerSale.product" ng-click="hideBal()"/>
												</div>
												
												<div class="w3-row w3-section">
												  <input class="w3-input w3-border" type="text" placeholder="Cost(Rs)" ng-model="customerSale.cost" ng-required="!customerSale.cost" />
												</div>
												
												<div class="w3-row w3-section">
												  <button class="w3-btn w3-border" ng-click="grant()" style="max-width:120px;" ng-disabled="!customerSale.name||!customerSale.product||!customerSale.cost">GRANT</button>
												</div>
												
												<div class="w3-row w3-section">
				
													<span ng-hide="access"><font color="red">Transaction Failed!</font></span></br>
													<span ng-hide="access1"><font color="green">Transaction Successful!</font></span></br>
													<i ng-hide="load" class="fa fa-spinner w3-spin" style="font-size:64px"></i>
												</div>
												

								
										</form>
											
									
									
									
									</div>
									
									<div class="w3-quarter w3-container"></div>
				</div>
</html>