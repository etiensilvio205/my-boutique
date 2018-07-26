var app=angular.module("root",["ngRoute"]);



app.config(function($routeProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "login.php"
  })
  .when("/menu", {
    templateUrl : "menu.php"
  })
  .when("/sale", {
  templateUrl : "sale.php"
  })
  .when("/search", {
  templateUrl : "search.php"
  })
  .when("/payment", {
  templateUrl : "payment.php"
  })
  .when("/addCustomer", {
  templateUrl : "addCustomer.php"
  });
});


app.controller("ctrlroot",function($scope,$http,$location,getBalance){
	$scope.rq=true;
	$scope.load=true;
	$scope.access=true;
	$scope.access1=true;
	$scope.user={};
	$scope.appear=false;
	$scope.customerSale={};
	$scope.bal=true;
	$scope.table=false;
	$scope.tableCustomer=true;
	$scope.input=false;
	$scope.Name=true;
	$scope.dummy=false;
	
	
	
	
	$scope.hideMsg=function(){
		
	$scope.added=true;
    $scope.errorAdd=true;	
	}
	
	$scope.errorAdd=true;
	$scope.added=true;
	$scope.newUser={};
	$scope.newUser.balance=0;
	$scope.add=function(){
		$scope.load=false;
		$http({
          method  : 'POST',
          url     : 'processAdd.php',
          data    : $scope.newUser,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function(response){
			 $scope.load=true;
			 $scope.newUser={};
			 
			 if (response.data=="true"){
				 
				 $scope.added=false;
				 $scope.errorAdd=true;
			 }else{
				 
				 $scope.added=true;
				 $scope.errorAdd=false;
			 }
			 
			 
			 
		 });
		
		
	}
	
	
	$scope.playTable=function(x){
		$scope.dummy=true;
		$scope.table=true;
		$scope.input=true;
		$scope.Name=false;
		$scope.selection=x;
		
		
			$http({
          method  : 'POST',
          url     : 'fetchAll.php',
          data    : $scope.selection,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function(response){
			
			 $scope.choice=response.data.transactions;
			 
		 });
		 
		 
		$scope.tableCustomer=false;
	
		 
		
	}
	$scope.balP=true;
	$scope.error=true;
	$scope.success=true;
	$scope.payment={};
	$scope.remove=true;
	$scope.pay=function(){
		$scope.load=false;
		$http({
          method  : 'POST',
          url     : 'paymentProcess.php',
          data    : $scope.payment,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function(response){
				$scope.load=true;
				$scope.payment.amount="";
				$scope.payment.name="";
				if(response.data=="false"){
					
					$scope.error=false;
					
				}else if(response.data=="trueEnd"){
					$scope.error=true;
					$scope.remove=false;
					$http.get("fetchCustomers.php")
    .then(function (response){
		$scope.customers = response.data.records;
		});
				}
				else{
					$scope.error=true;
					$scope.success=false;
					$http.get("fetchCustomers.php")
    .then(function (response){
		$scope.customers = response.data.records;
		});
					}
			 
			 
		 });
		 
		 	
		 
			
		
		
	}

	
	
	$scope.hideBal=function(){
		
		if ($scope.customerSale.name){
		$scope.bal=!$scope.bal;
		$http.get("fetchCustomers.php")
		.then(function (response){
		$scope.customers = response.data.records;
		});
		$scope.balance=getBalance.myFunc($scope.customerSale.name,$scope.customers);
		}
		
		if ($scope.payment.name){
			$scope.balP=!$scope.balP;
		}
	}
	
	$scope.clearP=function(){
		$scope.error=true;
		
		$scope.balance=getBalance.myFunc($scope.payment.name,$scope.customers);
		if ($scope.payment.name){
		$scope.balP=false;
		$scope.success=true;
		$scope.remove=true;
		
		
		}
		else{
		$scope.balP=true;	
		}
	}
	
	$scope.clear=function(){
		$scope.balance=getBalance.myFunc($scope.customerSale.name,$scope.customers);
		$scope.error=true;
		$scope.access=true;
		$scope.access1=true;
		$http.get("fetchCustomers.php")
		.then(function (response){
		$scope.customers = response.data.records;
		});
		$scope.balance=getBalance.myFunc($scope.customerSale.name,$scope.customers);
		
		if ($scope.customerSale.name){
		$scope.bal=false;
		}
		else{
		$scope.bal=true;		
		}
	}
	
	$scope.grant=function(){
		
		$scope.load=false;
		 $http({
          method  : 'POST',
          url     : 'newtransaction.php',
          data    : $scope.customerSale,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function(response){
			 
			 
			 $scope.load=true;
			 $scope.sent=response.data;
			 if (response.data=="false"){
				 
				 $scope.access=false;
				 $scope.access1=true;
			 }
			 else {
				 $scope.access1=false;
				 $scope.access=true;
				 $http.get("fetchCustomers.php")
		.then(function (response){
		$scope.customers = response.data.records;
		});
		
		$http.get("fetchRecents.php")
    .then(function (response){
		$scope.recents = response.data.recents;
		});
		
		
				 $scope.customerSale={};
				 
			 }
			 
			 
		 });
		
	}
	
	$scope.press=false;
	$scope.hideButton=function(){
	
		$scope.press=!$scope.press;


	}
	
	
	$http.get("fetchCustomers.php")
    .then(function (response){
		$scope.customers = response.data.records;
		});
	
	$http.get("fetchRecents.php")
    .then(function (response){
		$scope.recents = response.data.recents;
		});
		
	$scope.toHome=function(){
		$scope.press=false;
		$http.get("fetchRecents.php")
    .then(function (response){
		$scope.recents = response.data.recents;
		});
	
		$http.get("fetchCustomers.php")
		.then(function (response){
		$scope.customers = response.data.records;
		});
		
		if($scope.dummy==true){
		$scope.tableCustomer=true;
		$scope.input=false;
		$scope.table=false;
		$scope.Name=!$scope.Name;
		$scope.dummy=false;
		$location.path('/search');
		}
		else{
		$location.path('/menu')	
		}
		
		
		
	}
	
	$scope.addToSale=function(R){
		$scope.balance=getBalance.myFunc($scope.customerSale.name,$scope.customers);
		$scope.customerSale.name=R;
		
	}
	
	
	$scope.showAddCustomer=function(){
		$scope.newUser={};
		$scope.errorAdd=true;
		$scope.added=true;
		$location.path('/addCustomer');
		
	}
	
	$scope.showSearch=function(){
		
		$location.path('/search');
		$http.get("fetchCustomers.php")
        .then(function (response){
		$scope.customers = response.data.records;
		});
		
	}
	
	$scope.showPayment=function(){
		$scope.payment={};
		$scope.remove=true;
		$scope.success=true;
		$scope.error=true;
		$location.path('/payment');
		
		if(!$scope.payment.name){
			$scope.balP=true;
		}
	}
	
	$scope.showSale=function(){
		$scope.access=true;
		$scope.access1=true;
		$location.path('/sale');
		
	}

	$scope.validate=function(){
		
		 $scope.load=false;
		 $http({
          method  : 'POST',
          url     : 'checkuser.php',
          data    : $scope.user,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function(response){
			 
			 
			 $scope.load=true;
			 if (response.data=="false"){
				 
				 $scope.access=false;
				 
			 }
			 else {
				 $scope.access=true;
				 $location.path('/menu');
				 
				 
			 }
			 
			 
		 });
		
		
		
	}
	
	
});

app.service('getBalance', function() {
    this.myFunc = function (x,y) {
				var obj = y;
				var length = Object.keys(obj).length;
			
			for (var i=0;i<length;i++){
				
				if (x==obj[i].Name){
					
					return obj[i].Balance;
				
				}
				
			}
			
    }
});

