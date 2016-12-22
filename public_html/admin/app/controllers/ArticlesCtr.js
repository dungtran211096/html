vinasem.controller('ArticlesCtr', function ($rootScope, $scope, Api, groupByParentFilter) {
    $scope.getCategories = function () {
        Api.get('article-categories').then(function (rs) {
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

vinasem.controller('ListArticlesCtr', function ($scope, Api) {
    $scope.initList('articles');
});

vinasem.controller('AddArticleCtr', function ($scope, $rootScope) {
    $scope.initCreate('articles');
    $scope.title = 'Thêm Bài Viết';
    $rootScope.data.categories = [];
    $scope.getCategories();
});

vinasem.controller('EditArticleCtr', function ($scope) {
    $scope.initEdit('articles');
    $scope.title = 'Sửa Bài Viết';
    $scope.getCategories();
});