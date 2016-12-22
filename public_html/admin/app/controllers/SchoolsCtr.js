vinasem.controller('SchoolsCtr', function ($scope) {

});

vinasem.controller('ListSchoolsCtr', function ($scope) {
    $scope.title = 'Danh Sách';
    $scope.initList('schools');
});

vinasem.controller('CreateSchoolCtr', function ($scope) {
    $scope.title = 'Tạo Mới';
    $scope.initCreate('schools');
});

vinasem.controller('UpdateSchoolCtr', function ($scope) {
    $scope.title = 'Chỉnh Sửa';
    $scope.initEdit('schools');
});