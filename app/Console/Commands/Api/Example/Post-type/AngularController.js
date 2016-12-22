vinasem.controller('_REPLACE_mcCtr', function ($rootScope, $scope, Api, groupByParentFilter) {
    $scope.getCategories = function () {
        Api.get('_REPLACE_o-categories').then(function (rs) {
            $scope.categories = rs.data;
            $scope.categoriesGroup = groupByParentFilter($scope.categories);
        });
    };
    $scope.excerptConfig = 'mini';
    $scope.selectCategory = function (id) {
        var index = $rootScope.data.categories.indexOf(id);
        if (index == -1) {
            $rootScope.data.categories.push(id);
        } else {
            $rootScope.data.categories.splice(index, 1);
        }
    }

});

vinasem.controller('List_REPLACE_mcCtr', function ($scope, Api) {
    $scope.initList('_REPLACE_m');
});

vinasem.controller('Add_REPLACE_ocCtr', function ($scope, $rootScope) {
    $scope.initCreate('_REPLACE_m');
    $scope.title = 'Thêm Bài Viết';
    $rootScope.data.categories = [];
    $scope.getCategories();
});

vinasem.controller('Edit_REPLACE_ocCtr', function ($scope) {
    $scope.initEdit('_REPLACE_m');
    $scope.title = 'Sửa Bài Viết';
    $scope.getCategories();
});