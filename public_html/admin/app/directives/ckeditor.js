vinasem.directive('ckeditor', function () {
    return {
        require: '?ngModel',
        scope: {
            ckeditor: '='
        },
        priority: 1,
        link: function (scope, elm, attr, ngModel) {
            if (scope.ckeditor == 'mini') {
                scope.ckeditor = {
                    height: 100,
                    toolbar: [
                        ['Styles', 'Format', 'Font', 'FontSize'],
                        ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', '-', 'Outdent', 'Indent']
                    ]
                };
            }
            var ck = CKEDITOR.replace(elm[0], scope.ckeditor);
            if (!ngModel) return;
            ck.on('pasteState', function () {
                scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            });
            ck.on('instanceReady', function () {
                ck.setData(ngModel.$viewValue);
            });
            ngModel.$render = function (value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    };
});