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
											<div class="w3-col" style="height:45px;">
											<h4>Find Customer</h4>
											</div>
											</div>
										</div>	
										
										<form class="w3-container" style="text-align:center;" >
												
												
				
												
												<div class="w3-row w3-section" ng-hide="input">
												  <input class="w3-input w3-border" type="text" placeholder="Customer" ng-model="Customer" />
												</div>
												
												<div class="w3-row w3-container w3-section" style="height:45px;display:block;" ng-hide="Name">
													<div class="w3-col s12 m6 l6 w3-center">
														<h3 ng-hide="Name">{{selection.Name}}</h3>
													</div>
													<div class="w3-col s12 m6 l6 w3-center">
														<h3 ng-hide="Name">Balance: Rs {{selection.Balance}}</h3>
													</div>
												</div>
												
												<div class="w3-row w3-section">
												  
												  <table class="w3-table w3-bordered w3-centered" ng-hide="table">
												  <th>Name</th><th>Details</th>
												    <tr ng-repeat="x in customers|filter:Customer">
													<td>{{x.Name}}</td>
													<td class="w3-btn" ng-click="playTable(x)">View Details</td>
													</tr>
												
												  </table>
												  
												</div>
												
												<div class="w3-row w3-section w3-responsive">
												  
												  <table class="w3-table w3-bordered w3-centered" ng-hide="tableCustomer">
												  <th>Product</th><th>Cost</th><th>Granter</th><th>Date</th>
												    <tr ng-repeat="X in choice" ng-if="X.Product=='PAID'">
													    <td colspan="3" class="w3-grey">{{X.Product}}&nbsp; &nbsp; Rs{{X.Cost}}</td>
														<td class="w3-grey">{{X.Date}}</td>
													</tr>
													
													<tr ng-repeat="X in choice" ng-hide="X.Product=='PAID'">
													    <td>{{X.Product}}</td>
														<td>{{X.Cost}}</td>
														<td>{{X.Granter}}</td>
														<td>{{X.Date}}</td>
		
													</tr>
													
												  </table>
												  
												</div>
												
	
												
												

								
										</form>
											
									
									
									
									</div>
									
									<div class="w3-quarter w3-container"></div>
				</div>
</html>