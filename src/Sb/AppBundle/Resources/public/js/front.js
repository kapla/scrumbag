//App module declaration

angular.module('scrumbag', []).config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    }
);

function SprintController($scope, $filter) {
    var str = {
        omni : {
            search: 'Search',
            create: 'Create'
        }
    };

    $scope.omnibar = {
        type: str.omni.search,
        status: 'search',
        value: ''
    };

    $scope.tasks = [
        {
            id: 0,
            title: "exemple task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            id: 2,
            title: "test task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            id: 3,
            title: "mook task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            id: 4,
            title: "mook task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            id: 5,
            title: "mook task 1 sprint",
            description: "description",
            position: "sprint1",
            duration: 4,
            status: ''
        }
    ];

    $scope.onmibarChange = function() {
        if ($filter('filter')($scope.tasks, $scope.omnibar.value).length) {
            $scope.omnibar.type = str.omni.search;
            $scope.omnibar.status = 'search';
        } else {
            $scope.omnibar.type = str.omni.create;
            $scope.omnibar.status = 'create';
        }
    };

    $scope.omnibarSubmit = function() {
        if ($scope.omnibar.status == 'create') {

        }
    };

    $scope.deleteTask = function(task) {
        task.status = 'deleted';
    };
}

SprintController.$inject = ['$scope', '$filter'];
