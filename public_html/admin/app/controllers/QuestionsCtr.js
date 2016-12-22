vinasem.controller('QuestionsCtr', function ($scope) {

});

vinasem.controller('ListQuestionsCtr', function ($scope) {
    $scope.title = 'Danh Sách';
    $scope.initList('questions');
});

vinasem.controller('CreateQuestionCtr', function ($scope) {
    $scope.title = 'Tạo Mới';
    $scope.initCreate('questions');
});

vinasem.controller('UpdateQuestionCtr', function ($scope) {
    $scope.title = 'Chỉnh Sửa';
    $scope.initEdit('questions');
});