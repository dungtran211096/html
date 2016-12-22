vinasem.controller('ArticleCategoriesCtr', function ($scope) {

});
vinasem.controller('ListArticleCategoriesCtr', function ($scope) {
    $scope.initList('article-categories');
});
vinasem.controller('AddArticleCategoryCtr', function ($scope) {
    $scope.initCreate('article-categories');
    $scope.title = 'Thêm Danh Mục';
    $scope.getCategories();
});

vinasem.controller('EditArticleCategoryCtr', function ($rootScope, $scope, Api, $stateParams) {
    $scope.initEdit('article-categories');
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