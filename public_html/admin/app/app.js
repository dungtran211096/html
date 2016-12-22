var vinasem = angular.module('vinasem', [
    'ui.router',
    'ngAnimate',
    'angular-loading-bar',
    'ngToast',
    'ui.bootstrap',
    'ng-nestable',
    'ngStorage'
]);

vinasem.config(function ($stateProvider, $urlRouterProvider, $locationProvider) {
    // $locationProvider.html5Mode(true);
    $urlRouterProvider.otherwise("/");
    $stateProvider
        .state('home', {
            templateUrl: 'app/views/config/index.html',
            url: '/',
            controller: 'ConfigCtr'
        })
        .state('filemanager', {
            templateUrl: 'app/views/file-manager/index.html',
            url: '/quan-ly-file'
        })
        .state('config', {
            template: '<div ui-view></div>',
            url: '/config',
            controller: 'ConfigCtr'
        })
        .state('config.userInfo', {
            templateUrl: 'app/views/config/user-info.html',
            url: '/thong-tin-thanh-vien'
        })
        .state('config.general', {
            templateUrl: 'app/views/config/index.html',
            url: '/cau-hinh-chung'
        })
        /*
         Users Route
         */
        .state('users', {
            abstract: true,
            template: '<div ui-view></div>',
            url: '/thanh-vien',
            controller: 'UsersCtr'
        })
        .state('users.list', {
            templateUrl: 'app/views/users/index.html',
            url: '',
            controller: 'ListUsersCtr'
        })
        .state('users.create', {
            templateUrl: 'app/views/users/create.html',
            url: '/tao-moi',
            controller: 'CreateUserCtr'
        })
        .state('users.update', {
            templateUrl: 'app/views/users/create.html',
            url: '/:id/chinh-sua',
            controller: 'UpdateUserCtr'
        })
        // Articles Route
        .state('articles', {
            abstract: true,
            template: '<div ui-view></div>',
            url: '/article',
            controller: 'ArticlesCtr'
        })
        /*
         Categories Route
         */
        .state('articles.cat', {
            templateUrl: 'app/views/article-categories/index.html',
            url: '/danh-muc',
            controller: 'ArticleCategoriesCtr'
        })
        .state('articles.cat.list', {
            templateUrl: 'app/views/article-categories/index.html',
            url: '/',
            controller: 'ListArticleCategoriesCtr'
        })
        .state('articles.cat.create', {
            templateUrl: 'app/views/article-categories/create.html',
            url: '/tao-moi',
            controller: 'AddArticleCategoryCtr'
        })
        .state('articles.cat.edit', {
            templateUrl: 'app/views/article-categories/create.html',
            url: '/:id/chinh-sua',
            controller: 'EditArticleCategoryCtr'
        })
        /*
         Articles Route
         */
        .state('articles.list', {
            templateUrl: 'app/views/articles/index.html',
            url: '',
            controller: 'ListArticlesCtr'
        })
        .state('articles.create', {
            templateUrl: 'app/views/articles/create.html',
            url: '/tao-moi',
            controller: 'AddArticleCtr'
        })
        .state('articles.edit', {
            templateUrl: 'app/views/articles/create.html',
            url: '/:id/chinh-sua',
            controller: 'EditArticleCtr'
        })
        /*
         Questions Route
         */
        .state('questions', {
            abstract: true,
            template: '<div ui-view></div>',
            url: '/question',
            controller: 'QuestionsCtr'
        })
        .state('questions.list', {
            templateUrl: 'app/views/questions/index.html',
            url: '',
            controller: 'ListQuestionsCtr'
        })
        .state('questions.create', {
            templateUrl: 'app/views/questions/create.html',
            url: '/tao-moi',
            controller: 'CreateQuestionCtr'
        })
        .state('questions.update', {
            templateUrl: 'app/views/questions/create.html',
            url: '/:id/chinh-sua',
            controller: 'UpdateQuestionCtr'
        })
        /*
         Schools Route
         */
        .state('schools', {
            abstract: true,
            template: '<div ui-view></div>',
            url: '/school',
            controller: 'SchoolsCtr'
        })
        .state('schools.list', {
            templateUrl: 'app/views/schools/index.html',
            url: '',
            controller: 'ListSchoolsCtr'
        })
        .state('schools.create', {
            templateUrl: 'app/views/schools/create.html',
            url: '/tao-moi',
            controller: 'CreateSchoolCtr'
        })
        .state('schools.update', {
            templateUrl: 'app/views/schools/create.html',
            url: '/:id/chinh-sua',
            controller: 'UpdateSchoolCtr'
        })
    //Add_Here
});

vinasem.constant('ApiUrl', API_URL);
vinasem.constant('Url', SITE_URL);
vinasem.constant('WebUrl', SITE_URL);

vinasem.config(['ngToastProvider', function (ngToastProvider) {
    ngToastProvider.configure({
        animation: 'slide', // or 'fade'
        horizontalPosition: 'right'
    });
}]);

vinasem.run(['$rootScope', '$localStorage', '$http', '$window', function ($rootScope, $localStorage, $http, $window) {
    $rootScope.currentUser = null;
    if (localStorage.getItem('currentUser')) {
        $rootScope.currentUser = JSON.parse(localStorage.getItem('currentUser'));
    }

    $rootScope.logout = function () {
        $http.post('/logout').success(function () {
            delete $localStorage.auth_token;
            delete $localStorage.currentUser;
            $window.location = './login';
        });
    };

}]);

vinasem.run(['$http', function ($http) {
    var token = localStorage.getItem('auth_token');
    if (token) {
        $http.defaults.headers.common.Authorization = 'Bearer ' + token;
    }
}]);

vinasem.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.interceptors.push('responseObserver');
}]);

vinasem.factory('responseObserver', ['$q', '$window', function responseObserver($q, $window) {
    return {
        'responseError': function (errorResponse) {
            switch (errorResponse.status) {
                case 401:
                    $window.location = './login.php';
                    break;
                case 400:
                    $window.location = './login.php';
                    break;
                case 403:
                    $window.location = './403';
                    break;
            }
            return $q.reject(errorResponse);
        }
    };
}]);