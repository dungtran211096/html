vinasem.controller('ConfigCtr', function ($rootScope, $scope, Api) {
    $scope.title = 'Cấu Hình';
    $scope.infoType = {
        daoduc: 'Đạo Đức',
        hoctap: 'Học Tập',
        theluc: 'Thể Lực',
        tinhnguyen: 'Tình Nguyện',
        hoinhap: 'Hội Nhập'
    };
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
        Api.post('options/save', JSON.stringify($scope.data)).then(function () {
            Api.success('Đã Sửa!');
            //$scope.getOptions();
        }, function () {
            Api.error('Lỗi hệ thống, vui lòng tải lại trang!');
        });
    };
    function getUniqueId(type) {
        var i = 'key' + 1;
        for (i in $scope.data[type]) {
        }
        var a = Number(i.substr(3));
        while (typeof $scope.data[type]['key' + a] !== 'undefined') {
            a++;
        }
        return 'key' + a;
    }

    $scope.add = function (input, type) {
        if (typeof $scope.data[type] === 'undefined') {
            $scope.data[type] = {};
        }
        var i = getUniqueId(type);
        $scope.data[type][i] = input;
    };
    $scope.remove = function (key, type) {
        delete $scope.data[type][key];
    }
});