vinasem.filter('groupByParent', function () {
    return function (input) {
        var a = [];
        var key = 0;
        if (input) {
            for (var i = 1; i < input.length; i++) {
                if ((input[i]).parent == 0 || i == input.length - 1) {
                    var b = [];
                    for (var j = key; j < i; j++) {
                        b.push(input[j]);
                    }
                    if (i == input.length - 1) {
                        b.push(input[i]);
                    }
                    key = i;
                    a.push(b);
                }
            }
        }
        return a;
    }
});