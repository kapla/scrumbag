//App module declaration

angular.module('scrumbag', ['ui.keypress']).config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    }
);

function SprintController($scope, $element, $filter) {
    var str = {
        omnibar : {
            search: 'Search',
            create: 'Create'
        }
    };

    $scope.omnibar = {
        type: str.omnibar.search,
        create: false,
        value: ''
    };

    $scope.createTaskForm = {
        active: false,
        master: {
            title: '',
            description: '',
            time: ''
        }
    };

    $scope.tasks = [
        {
            title: "exemple task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "aefez task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "efcz task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "exaefeafzemple task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "test task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "mook task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "mook last task 1",
            description: "description",
            position: "backlog",
            duration: 4,
            status: ''
        },
        {
            title: "mook task 1 sprint",
            description: "description",
            position: "sprint1",
            duration: 4,
            status: ''
        }
    ];

    $scope.actors = ['administrator'];

    $scope.userStories = {
        1 : {
            actor: $scope.actors[0],
            goal: 'I want to do...'
        }
    };

    $scope.onmibarChange = function() {
        if ($filter('filter')($scope.tasks, $scope.omnibar.value).length) {
            $scope.omnibar.create = false;
        } else {
            $scope.omnibar.create = true;
        }
    };

    $scope.deleteTask = function(task) {
        task.status = 'deleted';
    };

    $scope.omnibarSubmit = function() {
        if ($scope.omnibar.create) {
            $scope.createTask();
        }
    };

    $scope.escapePressed = function (event){
        if ($scope.createTaskForm.active) {
            $scope.dismissCreateTask();
        }
    };

    $scope.dismissCreateTask = function () {
        $scope.createTaskForm.active = false;

        toastr.options.onFadeOut = function() {
            console.log($element.find('#create-task-modal').css('visibility'));
            if ($element.find('#create-task-modal').css('visibility') === 'hidden') {
                $scope.resetCreateTaskForm();
            }
        };

        var dismissButton = document.createElement('button');
        console.log($(dismissButton));

        dismissButton.onclick = function () {
            dismissAlert('create-task');
        };

        dismissButton.innerHTML = 'coucou';

        toastr.info(dismissButton);
    };

    $scope.cancelDismissCreateTask = function() {
        $scope.showCreateTaskForm();
    };

    $scope.createTask = function () {
        $scope.resetCreateTaskForm();
        $scope.showCreateTaskForm();

        $scope.createTaskForm.form.title  = $scope.omnibar.value;

        setTimeout(function() {
            $element.find('#create-task-title').focus();
        }, 500);
    };

    $scope.showCreateTaskForm = function() {
        $scope.createTaskForm.active = true;
    };

    $scope.resetCreateTaskForm = function() {
        $scope.createTaskForm.form = $scope.createTaskForm.master;
    };

    document.addEventListener('create-task-dismiss', function(event) {
        $scope.cancelDismissCreateTask();
    });

    $element.find('#omnibar').focus();
}

SprintController.$inject = ['$scope', '$element', '$filter'];

dismissAlert = function(alertType) {
    var event;
    event = document.createEvent("HTMLEvents");
    event.initEvent(alertType + '-dismiss', true, true);
    document.dispatchEvent(event);
};
