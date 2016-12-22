vinasem.controller('ConfigCtr', function ($rootScope, $scope, Api) {
    $scope.title = 'Cấu Hình';
    $rootScope.data = {};
    $scope.editorType = 'mini';
    $scope.getOptions = function () {
        Api.get('options').success(function (rs) {
            if (rs.data) {
                $rootScope.data = rs.data;
            }
        });
    };
    $scope.getOptions();
    $scope.beforeSubmit = function () {
        console.log($scope.data);
        Api.post('options/save', JSON.stringify($scope.data)).then(function () {
            Api.success('Đã Sửa!');
            //$scope.getOptions();
        }, function () {
            Api.error('Lỗi hệ thống, vui lòng tải lại trang!');
        });
    }
});