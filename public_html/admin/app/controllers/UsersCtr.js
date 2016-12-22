vinasem.controller('UsersCtr', function ($scope, Api) {
    $scope.type = {
        daoduc: 'Đạo Đức',
        hoctap: 'Học Tập',
        theluc: 'Thể Lực',
        tinhnguyen: 'Tình Nguyện',
        hoinhap: 'Hội Nhập'
    };
    $scope.infoType = {};
    function getInfoType(type) {
        Api.get('options/' + type).then(function (rs) {
            $scope.infoType[type] = rs.data;
        }, function () {
            Api.error('Không thể lấy dữ liệu.');
        })
    }

    for (var key in $scope.type) {
        getInfoType(key);
    }

    $scope.beforeSubmit = function () {
        console.log($scope.data);
        // $scope.submit();
    }
});

vinasem.controller('ListUsersCtr', function ($scope) {
    $scope.title = 'Danh Sách';
    $scope.initList('users');
});

vinasem.controller('CreateUserCtr', function ($scope) {
    $scope.title = 'Tạo Mới';
    $scope.initCreate('users');
});

vinasem.controller('UpdateUserCtr', function ($scope) {
    $scope.title = 'Chỉnh Sửa';
    $scope.initEdit('users');
});