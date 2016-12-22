vinasem.directive('formInput', function () {
    return {
        template: function (elem, attr) {
            var label_col = 2;
            var input_col = 6;
            var inputClass = attr.inputClass ? attr.inputClass : '';
            var lower = attr.label.toLowerCase();
            var model = attr.model ? attr.model : lower;
            var type = '<input class="d-input" type="text" ng-model="data.' + model + '">';
            switch (attr.type) {
                case 'textarea':
                    type = '<textarea class="d-input" cols="10" ng-model="data.' + model + '"></textarea>';
                    break;
                case 'checkbox':
                    input_col = 1;
                    type = '<input type="checkbox" ng-model="data.' + model + '">';
                    break;

            }
            var html = '<div class="form-input ' + inputClass + '">';
            html += '<div class="col-md-' + label_col + '">';
            html += '<label for="' + lower + '">' + attr.label + '</label>';
            html += '</div>';
            html += '<div class="col-md-' + input_col + '">';
            html += type;
            html += '</div>';
            html += '</div>';
            return html;
        }
    }
});