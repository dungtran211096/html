vinasem.controller('_REPLACE_mcCtr', function ($scope) {

});

vinasem.controller('List_REPLACE_mcCtr', function ($scope) {
    $scope.title = 'Danh Sách';
    $scope.initList('_REPLACE_m');
});

vinasem.controller('Create_REPLACE_ocCtr', function ($scope) {
    $scope.title = 'Tạo Mới';
    $scope.initCreate('_REPLACE_m');
});

vinasem.controller('Update_REPLACE_ocCtr', function ($scope) {
    $scope.title = 'Chỉnh Sửa';
    $scope.initEdit('_REPLACE_m');
});