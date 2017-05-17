angular.module('starter.controllers', [])

    .controller('DashCtrl', function($scope) {})

    .controller('ChatsCtrl', function($scope, Chats) {
        $scope.chats = Chats.all();
        $scope.remove = function(chat) {
            Chats.remove(chat);
        };
    })

    .controller('LoginCtrl', ['$scope', 'userService', '$state', '$stateParams', '$http',function ($scope, userService, $state, $stateParams, $http) 
    {
        $scope.data = {};
        $scope.user = [];
        $scope.userService = userService;
        var login = {
          username: $scope.data.username,
          password: $scope.data.password
        };
        $scope.$on("$ionicView.loaded", function() {
      //viet javascript here
    

        });

        $scope.login = function() {
            $http.get("http://qlpth.dev/api/login/"+ $scope.data.username+"/"+$scope.data.password, { //tao thich tao de day
            
            })
            .success(function(data, status, headers, config){
                $scope.mydata = [];
                $scope.user = JSON.parse(data['user']);
                $scope.roles = data['roles'];

                var user = $scope.user;                 
                //console.log($scope.roles);
                //$scope.mydata.push (user);
                if (data['status'] == 'OK')
                {
                    $scope.userService.id = user.id;
                    $scope.userService.roles = $scope.roles;
                    for (i = 0; i < $scope.roles.length; i++)
                    {
                        $scope.userService.roles[i] = $scope.roles[i];
                    }
                    $state.go('giangvien');
                }
                else
                {
                  alert('Mật khẩu hoặc tài khoản không đúng!');
                }
            })
            .error(function(){
                alert("Error");
            })

            //console.log("LOGIN user: " + $scope.userService.id);
        }
        //console.log($scope.user);

        $scope.dangkylich = function ()
        {
            var user = $scope.user;
            var mes = [];

            for (var key in $scope.data.idTuan)
            {
                if ($scope.data.idTuan[key] == true)
                {
                    for (var key2 in $scope.data.idThu)
                    {
                        if ($scope.data.idThu[key2] == true)
                        {
                            for (var key3 in $scope.data.idBuoi)
                            {
                                if ($scope.data.idBuoi[key3] == true)
                                {
                                    var link = $scope.userService.id+"/"+key +"/"+ key2 +"/"+ key3 +"/"+ $scope.data.idMH +"/"+ $scope.data.nhom;
                                    //console.log(link);
                                    $http.get ("http://qlpth.dev/api/dangky/"+ link, {

                                    }).success( function(data){
                                        alert (data);
                                    }).error(function(){
                                        alert("Error");
                                    })
                                }
                            }
                        }
                    }                    
                }
            }
            // console.log("id "+ $scope.userService.id);
            // console.log($scope.data.idTuan + $scope.data.idThu + $scope.data.idBuoi + $scope.data.idMH + $scope.data.nhom);
            //var link = $scope.userService.id+"/"+$scope.data.idTuan +"/"+ $scope.data.idThu +"/"+ $scope.data.idBuoi +"/"+ $scope.data.idMH +"/"+ $scope.data.nhom;
            //console.log(link);
            // $http.get ("http://qlpth.dev/api/dangky/"+ link, {

            // }).success( function(data){
            //     alert(data);
            // }).error(function(){
            //     alert("Error");
            // })
        }
    }]) //controller('LoginCtrl')

.controller('GiangVienCtrl', ['$scope', 'userService', '$state', '$stateParams', '$http',function ($scope, userService, $state, $stateParams, $http) {
    $scope.data = {};
    $scope.userService = userService;
    $scope.roles = [];
    $scope.roles = $scope.userService.roles;
    console.log($scope.roles);
    


    var tempObj = [];
    var arrRole = [];
    for (var key in $scope.roles)
    {
        if ($scope.roles[key].role_id == 2)
        {
            $('.manager').removeClass('hidden');
        }
    }
    //console.log (arrRole);

    $scope.xuly = function ()
    {
      $state.go('duyetlich');
    }
    
    $scope.dangky = function ()
    {
      $state.go('dangky');
    }

    $scope.xemlich = function ()
    {
      $state.go('xemlich');
    }
}])

    .controller('QuanLyCtrl', ['$scope', 'lichCDBM', '$state', '$stateParams', '$http',function ($scope, lichCDBM, $state, $stateParams, $http) {
        $scope.data = {};
        $scope.lichCDBM = lichCDBM;
        
        $scope.duyetlich = function ()
        {
            $state.go('duyetlich');            
        }

        $scope.dieuchinh = function ()
        {
          $state.go('dieuchinh');
        }
    }])

    .controller('DuyetLichCtrl', ['$scope', 'userService', 'lichCDBM', '$state', '$stateParams', '$http',function ($scope, userService, lichCDBM, $state, $stateParams, $http) {
        $scope.data = {};  
        $scope.lichCDBM = lichCDBM;
        $scope.lichs = [];
        $scope.lichBMKs = [];
        $scope.userService = userService;

        $http.get("http://qlpth.dev/api/cacyeucau/"+$scope.userService.id, { //tao thich tao de day
                
                })
                .success(function(data, status, headers, config){  
                    $scope.lichCDBM.lich = data[0]; 
                    $scope.lichCDBM.lichBMKhac = data[1];   
                    $scope.lichs = $scope.lichCDBM.lich;
                    $scope.lichBMKs = $scope.lichCDBM.lichBMKhac;
                })
                .error(function(){
                    alert("Error");
                })
        
        $scope.tuchoi = function (idLichCD)
        {
            // alert("aaa " + idLichCD);
            $http.get("http://qlpth.dev/api/tuchoixeplich/"+idLichCD, { //tao thich tao de day
                
                })
                .success(function(data, status, headers, config){  
                    alert("Đã từ chối xếp phong cho lịch");
                    $('#idLCD'+idLichCD).remove();
                    $state.go('duyetlich');    
                    
                })
                .error(function(){
                    alert("Error");
                })
        }

        $scope.xepphong = function (idLichCD)
        {
            $state.go ('xepphong', {idLCD: idLichCD, idGV: 1});
        }

        $scope.chuyen = function ()
        {
            console.log($stateParams.idLCD+ '-' +$scope.data.idBoMon);
            $http.get("http://qlpth.dev/api/chuyenyc/"+$stateParams.idLCD+"/"+$scope.data.idBoMon, { //tao thich tao de day
                
            })
            .success(function(data, status, headers, config){  
                alert(data);
                $state.go('duyetlich');    
                
            })
            .error(function(){
                alert("Error");
            })
        }

        $scope.trave = function (idLichCD)
        {
            $http.get("http://qlpth.dev/api/travebm/"+idLichCD, { //tao thich tao de day
                
                })
                .success(function(data, status, headers, config){  
                    alert("Đã trả yêu cầu về bộ môn chủ quản");
                    $('#idLCDK'+idLichCD).remove();
                    $state.go('duyetlich');    
                    
                })
                .error(function(){
                    alert("Error");
                })
        }
    }])

    .controller('XepPhongCtrl', ['$scope', 'lichCDBM', '$state', '$stateParams', '$http',function ($scope, lichCDBM, $state, $stateParams, $http) {
        $scope.data = {};  
        $scope.phongs = [];

        $http.get("http://qlpth.dev/api/layphongtrongBM/"+$scope.userService.id+"/"+$stateParams.idLCD, { //tao thich tao de day
                
            })
            .success(function(data, status, headers, config){  
                $scope.phongs = data[0];
                console.log(data[0]);

                if ($scope.phongs.length == 0)
                {
                    $("#mes").html ("Không còn phòng trống!");
                    $("#btn-dangky").attr('disabled', 'disabled');
                    //console.log ("Không còn phòng trống!");
                }
                else
                {
                    $("#mes").html ("Vui lòng chọn phòng muốn xếp");
                    $scope.phongs = data[0];
                }
            })
            .error(function(){
                alert("Error");
            })
        console.log($stateParams.idLCD);

        $scope.dangky = function ()
        {
            // console.log('idLCD '+$stateParams.idLCD);
            // console.log ('idPhong '+$scope.data.idPhong);
            $http.get("http://qlpth.dev/api/xepphong/"+$stateParams.idLCD+"/"+$scope.data.idPhong, { //tao thich tao de day
                
            })
            .success(function(data, status, headers, config){  
                alert("Đã xếp phòng cho yêu cầu thành công");
                $state.go('duyetlich');    
                
            })
            .error(function(){
                alert("Error");
            })
        }

        $scope.chuyen = function ()
        {
            $state.go('chuyenyc', {idLCD: $stateParams.idLCD});
        }
    }])



    .controller('XemLichCtrl', ['$scope', 'userService', 'lichSangService', '$state', '$stateParams', '$http',function ($scope, userService, lichSangService, $state, $stateParams, $http) {
        $scope.data = {};   
        $scope.userService = userService;
        $scope.lichSangService = lichSangService;
        $scope.mydata = []; 
        console.log ($scope.userService.id);
        $scope.xemchitiet = function ()
        {
            var idTuan = $scope.data.idTuan;
            console.log('idTuan  '+idTuan);
          
            $http.get("http://qlpth.dev/api/xemchitiet/" + idTuan +"/"+$scope.userService.id, { //tao thich tao de day
            
            })
            .success(function(data, status, headers, config){
                $scope.lichSangService.lich = data;
                $state.go ("xemchitiet");
            })
            .error(function(){
                alert("Error");
            })      
            
        }
    }])

    .controller('XemLichChitietCtrl', ['$scope', 'lichSangService', '$state', '$stateParams', '$http',function ($scope, lichSangService, $state, $stateParams, $http) {
        $scope.data = {};  
        $scope.lichSangService = lichSangService;
        //console.log($scope.lichSangService.lich);



        $scope.$on("$ionicView.loaded", function() //viet javascript here
        {
            //console.log($scope.lichSangService.lich[0]);
                  
            var tempObj = [];
            for (var key in $scope.lichSangService.lich)
            {
                var inputObj = $scope.lichSangService.lich[key];            
                for (var key2 in inputObj) {
                    tempObj[key2] = inputObj[key2];
                }
                console.log (tempObj);
                $('#'+tempObj['idThu']+tempObj['idBuoi']).append("<span>"+tempObj['idMonHoc']+"-"+tempObj['idPhong']+"</span><br>");
            }

        });
    }])

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})

.controller('AccountCtrl', function($scope) {
  $scope.settings = {
    enableFriends: true
  };
});


