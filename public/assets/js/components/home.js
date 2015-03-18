module.exports = function(){
    /**
     * home controller
     */
    angular.module('home')
        .controller('homeController', homeController);

    /**
     * @ngInject
     */
    function homeController($scope) {
        console.log('YEaah');
    }
    homeController.$inject = ['$scope'];
}