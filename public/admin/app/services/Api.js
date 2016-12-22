vinasem.factory('Api', function ($http, ApiUrl, ngToast) {
    function getParam(data) {
        return data ? jQuery.param(data) : '';
    }

    return {
        get: function (link, data) {
            return $http.get(ApiUrl + link + '?' + getParam(data));
        },
        post: function (link, data) {
            return $http.post(ApiUrl + link, data);
        },
        delete: function (link, data) {
            return $http.delete(ApiUrl + link + '?' + getParam(data));
        },
        active: function (link, data) {
            return $http.get(ApiUrl + link + '/actives?' + getParam(data));
        },
        put: function (link, data) {
            return $http.put(ApiUrl + link, data);
        },
        validateError: function (rs) {
            angular.forEach(rs.data, function (error) {
                angular.forEach(error, function (message) {
                    ngToast.create({
                        className: 'danger',
                        content: '<span class="fa fa-times-circle-o"></span> ' + message
                    });
                });
            });
        },
        error: function (message) {
            ngToast.create({
                className: 'danger',
                content: '<span class="fa fa-times-circle-o"></span> ' + message
            });
        },
        warning: function (message) {
            ngToast.create({
                className: 'warning',
                content: '<span class="fa fa-times-circle-o"></span> ' + message
            });
        },
        success: function (message) {
            ngToast.create({
                className: 'success',
                content: message + ' <span class="fa fa-check-circle-o"></span>'
            });
        }
    }
});