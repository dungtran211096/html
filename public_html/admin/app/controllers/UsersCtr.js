vinasem.controller('UsersCtr', function ($scope) {

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