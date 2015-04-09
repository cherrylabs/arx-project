/**
 * @ngInject
 */
function homeController($scope) {

    $scope.items = [];

    $scope.addItem = function(){
        $scope.items.push({
            title : $scope.item.title,
            author : $scope.name
        })
    }
}