vinasem.controller('_REPLACE_ocCategoriesCtr', function ($scope) {

});
vinasem.controller('List_REPLACE_ocCategoriesCtr', function ($scope) {
    $scope.initList('_REPLACE_o-categories');
});
vinasem.controller('Add_REPLACE_ocCategoryCtr', function ($scope) {
    $scope.initCreate('_REPLACE_o-categories');
    $scope.title = 'Thêm Danh Mục';
    $scope.getCategories();
});

vinasem.controller('Edit_REPLACE_ocCategoryCtr', function ($rootScope, $scope, Api, $stateParams) {
    $scope.initEdit('_REPLACE_o-categories');
    $scope.title = 'Sửa Danh Mục';
    $scope.getCategories();
    $rootScope.beforeSubmit = function () {
        if ($scope.data.parent == $stateParams.id) {
            Api.error('Danh mục không thể thuộc chính nó!');
        } else {
            $scope.submit();
        }
    };
    $rootScope.afterSubmit = function () {
        $scope.getCategories();
    };
});