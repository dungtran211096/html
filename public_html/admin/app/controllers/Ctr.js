vinasem.controller('Ctr', function ($rootScope, $scope, $window, $state, Api, $stateParams, Url, WebUrl) {
    /*
     Static Variable
     */
    $scope.expand = function (event) {
        var e = jQuery(event.currentTarget).parents('li');

        e.hasClass('m-expanded') || e.hasClass('expanded') ? e.removeClass('m-expanded expanded') : e.addClass('m-expanded');
    };
    $rootScope.WebUrl = WebUrl;
    if ($window.outerWidth <= 768) {
        $rootScope.$on('$stateChangeSuccess', function () {
            $rootScope.asideClass = '';
        });
    } else {
        $rootScope.asideClass = localStorage.getItem('_menuToggle');
    }
    $rootScope.$on('$stateChangeSuccess', function () {
        angular.element($window).bind('scroll', function () {
            var actionClass = this.pageYOffset >= 50 ? 'fixed' : '';
            jQuery('ul#action').attr('class', actionClass);
        });
        $rootScope.$state = $state;
    });
    $rootScope.menuToggle = function () {
        $rootScope.asideClass = $rootScope.asideClass ? '' : 'mini';
        localStorage.setItem('_menuToggle', $rootScope.asideClass);
    };
    $scope.editor = [];
    $scope.finder = function (type, id) {
        var path = angular.element('#' + id).val();
        var a = '';
        if (typeof path !== 'undefined') {
            a = path.replace('/upload/' + type.toLowerCase() + '/', '');
        }
        $scope.chooseFile(type + ':/' + a, function (fileUrl) {
            $rootScope.$apply(function () {
                $rootScope.data[id] = fileUrl;
            });
        });
    };
    $scope.chooseFile = function ($path, callback) {
        CKFinder.config.language = 'vi';
        CKFinder.config.skin = 'bootstrap';
        var finder = new CKFinder();
        finder.basePath = '../';
        finder.startupPath = $path;
        finder.selectActionFunction = callback;
        var options = {
            popupTitle: 'Chọn File',
            popupFeatures: 'menubar=yes,modal=no'
        };
        finder.popup(options);
    };
    $scope.createEditor = function (id, height) {
        $scope.editor[id] = CKEDITOR.replace(id, {
            filebrowserBrowseUrl: Url + 'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: Url + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        });
        CKEDITOR.config.height = height ? height : 300;
        CKEDITOR.config.width = 'auto';
        //CKFinder.setupCKEditor($scope.editor[id]);
    };
    $rootScope.beforeSubmit = function () {
        $scope.submit();
    };
    $scope.subName = function (category) {
        var str = '';
        for (var i = 1; i < category.subLength; i++) {
            str += '&nbsp;&nbsp;&nbsp;';
        }
        if (category.subLength) {
            str += '∟';
        }
        var e = document.createElement('span');
        e.innerHTML = str + category.name;
        return e.childNodes[0].nodeValue;
    };
    $rootScope.afterSubmit = function () {
    };
    $scope.initList = function (name) {
        $scope.pagination = {
            currentPage: 1
        };
        $rootScope.params = {
            page: $scope.pagination.currentPage
        };
        $scope.getRecords = function () {
            Api.get(name, $rootScope.params).then(function (rs) {
                if (rs.data.meta) {
                    $scope.records = rs.data.data;
                    $scope.totalItems = rs.data.meta.total;
                } else {
                    $scope.records = rs.data;
                }
            });
        };
        $scope.$watch('records', function () {
            if ($scope.records) {
                $scope.check = [];
                for (var i = 0; i < $scope.records.length; i++) {
                    $scope.check[i] = false;
                }
                $scope.isCheckAll = false;
            }
        });
        $scope.active = function (index) {
            var id = $scope.records[index].id;
            Api.get(name + '/' + id + '/active').then(function () {
                var x = $scope.records[index].active;
                $scope.records[index].active = !x;
                if (!x) {
                    Api.success('Kích Hoạt Thành Công #' + (index + 1));
                } else {
                    Api.warning('Đã Hủy Kích Hoạt #' + (index + 1));
                }
            }, function () {
                Api.error('Lỗi Hệ Thống');
            });
        };
        $scope.delete = function (index) {
            var record = $scope.records[index];
            if (confirm("#" + (index + 1) + ' Sẽ Bị Xóa!') == true) {
                Api.delete(name + '/' + record.id).then(function () {
                    $scope.records.splice(index, 1);
                    $scope.check.splice(index, 1);
                    Api.success('Đã Xóa #' + (index + 1));
                }, function () {
                    Api.error('Không Thể Xóa #' + (index + 1));
                });
            }
        };
        $scope.checkAll = function () {
            $scope.isCheckAll = !$scope.isCheckAll;
            for (var i = 0; i < $scope.check.length; i++) {
                $scope.check[i] = $scope.isCheckAll;
            }
        };
        $scope.activeMany = function (active) {
            var ids = [];
            for (var i = 0; i < $scope.check.length; i++) {
                if ($scope.check[i] && $scope.records[i].active != active) {
                    $scope.records[i].active = active;
                    ids.push($scope.records[i].id);
                }
            }
            Api.active(name, {ids: ids}).then(function () {
                if (active) {
                    Api.success('Kích Hoạt Thành Công.')
                } else {
                    Api.warning('Đã Hủy Kích Hoạt');
                }
            }, function () {
                Api.error('Lỗi Hệ Thống Vui Lòng Tải Lại Trang.');
            });
        };
        $scope.deleteMany = function () {
            var ids = [];
            for (var i = 0; $scope.check.length && i < $scope.check.length; i++) {
                if ($scope.check[i]) {
                    ids.push($scope.records[i].id);
                    $scope.records.splice(i, 1);
                    $scope.check.splice(i, 1);
                    i--;
                }
            }
            Api.delete(name, {ids: ids}).then(function () {
                Api.success('Đã Xóa ' + ids.length + ' Dòng');
            }, function () {
                Api.error('Lỗi Hệ Thống, Vui Lòng Tải Lại Trang. ');
            });
        };
        $scope.getRecords();
    };
    $scope.initEdit = function (name) {
        $scope.getRecord = function () {
            Api.get(name + '/' + $stateParams.id).then(function (rs) {
                $rootScope.data = rs.data;
            }, function () {
                Api.error('Không thể lấy dữ liệu.');
            })
        };
        $scope.reset = function () {
            $scope.getRecord();
        };
        $scope.getRecord();
        $scope.submit = function () {
            var data = $rootScope.data;
            Api.put(name + '/' + data.id, data).then(function () {
                Api.success('Đã Sửa Thành Công!');
                $rootScope.afterSubmit();
            }, function (rs) {
                Api.validateError(rs);
            });
        };
    };
    $scope.initCreate = function (name) {
        $scope.submit = function () {
            Api.post(name, $rootScope.data).then(function () {
                Api.success('Đã Thêm');
                $scope.reset();
            }, function (rs) {
                Api.validateError(rs);
            });
        };
        $scope.reset = function () {
            $rootScope.data = {
                active: true
            };
        };
        $scope.reset();
    }
});