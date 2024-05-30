var trina = angular.module("trina", []);
const baseUrl = window.location.origin;
trina.controller("manos", ($scope) => {
    $scope.baseUrl = baseUrl;
    $scope.title = "Welcome to GMO World";
    $scope.description = "Do you want to enter?";
    $scope.buttons = [
        { type: "Yes", class: "btn-danger" },
        { type: "No", class: "btn-secondary" },
    ];
    $scope.username = "";

    $scope.startgame = (type) => {
        if (type === "Yes") {
            $("#usermodal").modal("show");
        } else {
            Swal.fire({
                title: "Next Please! :(",
                timer: 1500,
                showConfirmButton: false,
                icon: "info",
            });
        }
    };
});

trina.controller("gamestart", function ($scope, $compile, $http) {
    let narate1 =
        `Genetic engineering (also called genetic modification) is a process that uses laboratory-based technologies to alter the DNA makeup of an organism. This may involve changing a single base pair (A-T or C-G), deleting a region of DNA or adding a new segment of DNA.`.split(
            ""
        );
    $scope.narator = true;
    $scope.countdown;
    $scope.intervals;
    $scope.choicesLetter = ["A.", "B.", "C.", "D."];
    $scope.currentLives = 2;
    $scope.level = 1;
    $scope.questions = [];
    $scope.choices = [];
    $scope.currentQuestion;
    $scope.currentChoices;
    $scope.buttonDisabler = false;
    $scope.score = 0;
    $scope.answer = (id) => {
        clearInterval($scope.intervals);
        if (id == $scope.currentQuestion.answer_key) {
            $scope.isAnswer = "text-light";
            $scope.score++;
        } else if (!id || id != $scope.currentQuestion.answer_key) {
            $scope.isAnswer = "text-warning";
            $scope.currentLives--;
        }
        $scope.narator = true;
        narate1 = $scope.currentQuestion.explanation.split("");
        $scope.narateFunction();
        if ($scope.currentLives < 0) {
            setTimeout(() => {
                Swal.fire({
                    icon: "info",
                    title: "Game Over!",
                    confirmButtonText: "Back to main menu",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http
                            .get(
                                `${baseUrl}/users/${$scope.level}/${$scope.score}/fail`
                            )
                            .then((response) => {
                                // console.log(response);
                                if (response.data) {
                                    window.location.href = `${baseUrl}${response.data.goto}`;
                                }
                            });
                    }
                });
            }, 3000);
        }
    };
    $scope.answer2 = () => {
        clearInterval($scope.intervals);
        $scope.isAnswer = "text-warning";
        $scope.currentLives--;
        $scope.narator = true;
        narate1 = $scope.currentQuestion.explanation.split("");
        $scope.narateFunction();
        if ($scope.currentLives < 0) {
            setTimeout(() => {
                Swal.fire({
                    icon: "info",
                    title: "Game Over!",
                    confirmButtonText: "Back to main menu",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http
                            .get(
                                `${baseUrl}/users/${$scope.level}/${$scope.score}/fail`
                            )
                            .then((response) => {
                                // console.log(response);
                                if (response.data) {
                                    window.location.href = `${baseUrl}${response.data.goto}`;
                                }
                            });
                    }
                });
            }, 3000);
        }
    };
    $scope.intervalStart = () => {
        $scope.intervals = setInterval(() => {
            $scope.$apply(() => {
                if ($scope.countdown < 0) {
                    console.log("Countdown finished. Calling answer2...");
                    $scope.answer2();
                } else {
                    if ($scope.countdown <= 5) {
                        if ($("#countdown").hasClass("text-success")) {
                            $("#countdown").removeClass("text-success");
                            $("#countdown").addClass("text-danger");
                        }
                    } else {
                        if ($("#countdown").hasClass("text-danger")) {
                            $("#countdown").removeClass("text-danger");
                            $("#countdown").addClass("text-success");
                        }
                    }
                    $("#countdown").html($scope.countdown);
                    console.log("Countdown: ", $scope.countdown);
                    $scope.countdown--;
                }
            });
        }, 1000);
    };

    // introduction for levels
    $scope.startLevel = () => {
        $http
            .get(`${baseUrl}/api/questions/${$scope.level}`)
            .then((response) => {
                $scope.questions = response.data.questions;
                // $scope.getQuestion();
            });
    };

    // getting questions
    $scope.getQuestion = () => {
        $scope.narator = false;
        if ($scope.currentLives >= 0) {
            if ($scope.questions.length > 0) {
                $scope.currentQuestion = $scope.questions.shift();
                $scope.countdown = 15;
                $scope.buttonDisabler = false;
                $http
                    .get(`${baseUrl}/api/choices/${$scope.currentQuestion.id}`)
                    .then((response) => {
                        $scope.currentChoices = response.data.choices;
                    });
                $scope.intervalStart();
            } else {
                // alert("You passed level 1");
                Swal.fire({
                    icon: "success",
                    showConfirmButton: true,
                    title: "You passed level 1",
                    confirmButtonText: `Proceed Level 2`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http
                            .get(
                                `${baseUrl}/users/${$scope.level}/${$scope.score}/success`
                            )
                            .then((response) => {
                                if (response.data) {
                                    window.location.href = `${baseUrl}${response.data.goto}`;
                                }
                            });
                    }
                });
            }
        }
    };
    $scope.isAnswer = "text-light";

    // if a user clicks an answer
    $scope.narateStart;
    $scope.narateCount = 0;
    $scope.done = false;

    $scope.starter = true;
    // if a user clicks the naration
    $scope.doneTrigger = () => {
        $scope.getQuestion();
        if ($scope.starter) {
            $scope.starter = false;
        }
    };

    $scope.humana = () => {
        $scope.buttonIkuzu = `<button class="btn btn-sm btn-outline-light" ng-click="doneTrigger();">${
            $scope.starter ? "Let's Go" : "Next Question"
        }</button>`;
        var compiledTrigger = $compile($scope.buttonIkuzu)($scope);
        if ($scope.currentLives >= 0) {
            setTimeout(() => {
                $("#narate").append(compiledTrigger);
            }, 700);
        }
    };

    $scope.narateFunction = () => {
        $("#narate").html(`<p class="${$scope.isAnswer} h5 mb-3"></p>`);
        $scope.narateStart = setInterval(() => {
            $("#narate p").append(narate1[$scope.narateCount]);
            if ($scope.narateCount === narate1.length - 1) {
                $scope.humana();
                $scope.narateCount = 0;
                clearInterval($scope.narateStart);
            } else {
                $scope.narateCount++;
            }
        }, 10);
    };

    $(document).ready(function () {
        $scope.narateFunction();
        $scope.startLevel($scope.level);
    });
});

trina.controller("gamestart2", ($scope, $compile, $http) => {
    $scope.buying = true;
});

trina.controller("gamestart3", function ($scope, $compile, $http) {
    let narate1 = `Got impressed you still managed to proceed level 3.`.split(
        ""
    );
    $scope.narator = true;
    $scope.countdown;
    $scope.intervals;
    $scope.choicesLetter = ["A.", "B.", "C.", "D."];
    $scope.currentLives = 2;
    $scope.level = 3;
    $scope.questions = [];
    $scope.choices = [];
    $scope.currentQuestion;
    $scope.currentChoices;
    $scope.buttonDisabler = false;
    $scope.score = 0;
    $scope.answer = (id) => {
        clearInterval($scope.intervals);
        if (id == $scope.currentQuestion.answer_key) {
            $scope.isAnswer = "text-light";
            $scope.score++;
        } else if (!id || id != $scope.currentQuestion.answer_key) {
            $scope.isAnswer = "text-warning";
            $scope.currentLives--;
        }
        $scope.narator = true;
        narate1 = $scope.currentQuestion.explanation.split("");
        $scope.narateFunction();
        if ($scope.currentLives < 0) {
            setTimeout(() => {
                Swal.fire({
                    icon: "info",
                    title: "Game Over!",
                    confirmButtonText: "Back to main menu",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http
                            .get(
                                `${baseUrl}/users/${$scope.level}/${$scope.score}/fail`
                            )
                            .then((response) => {
                                // console.log(response);
                                if (response.data) {
                                    window.location.href = `${baseUrl}${response.data.goto}`;
                                }
                            });
                    }
                });
            }, 3000);
        }
    };
    $scope.answer2 = () => {
        clearInterval($scope.intervals);
        $scope.isAnswer = "text-warning";
        $scope.currentLives--;
        $scope.narator = true;
        narate1 = $scope.currentQuestion.explanation.split("");
        $scope.narateFunction();
        if ($scope.currentLives < 0) {
            setTimeout(() => {
                Swal.fire({
                    icon: "info",
                    title: "Game Over!",
                    confirmButtonText: "Back to main menu",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http
                            .get(
                                `${baseUrl}/users/${$scope.level}/${$scope.score}/fail`
                            )
                            .then((response) => {
                                // console.log(response);
                                if (response.data) {
                                    window.location.href = `${baseUrl}${response.data.goto}`;
                                }
                            });
                    }
                });
            }, 3000);
        }
    };
    $scope.intervalStart = () => {
        $scope.intervals = setInterval(() => {
            $scope.$apply(() => {
                if ($scope.countdown < 0) {
                    console.log("Countdown finished. Calling answer2...");
                    $scope.answer2();
                } else {
                    if ($scope.countdown <= 5) {
                        if ($("#countdown").hasClass("text-success")) {
                            $("#countdown").removeClass("text-success");
                            $("#countdown").addClass("text-danger");
                        }
                    } else {
                        if ($("#countdown").hasClass("text-danger")) {
                            $("#countdown").removeClass("text-danger");
                            $("#countdown").addClass("text-success");
                        }
                    }
                    $("#countdown").html($scope.countdown);
                    console.log("Countdown: ", $scope.countdown);
                    $scope.countdown--;
                }
            });
        }, 1000);
    };

    // introduction for levels
    $scope.startLevel = () => {
        $http
            .get(`${baseUrl}/api/questions/${$scope.level}`)
            .then((response) => {
                $scope.questions = response.data.questions;
                // $scope.getQuestion();
            });
    };

    // getting questions
    $scope.getQuestion = () => {
        $scope.narator = false;
        if ($scope.currentLives >= 0) {
            if ($scope.questions.length > 0) {
                $scope.currentQuestion = $scope.questions.shift();
                $scope.countdown = 15;
                $scope.buttonDisabler = false;
                $http
                    .get(`${baseUrl}/api/choices/${$scope.currentQuestion.id}`)
                    .then((response) => {
                        $scope.currentChoices = response.data.choices;
                    });
                $scope.intervalStart();
            } else {
                // alert("You passed level 1");
                Swal.fire({
                    icon: "success",
                    showConfirmButton: true,
                    title: "You passed level 3",
                    confirmButtonText: `Go to leaderboards`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http
                            .get(
                                `${baseUrl}/users/${$scope.level}/${$scope.score}/success`
                            )
                            .then((response) => {
                                if (response.data) {
                                    window.location.href = `${baseUrl}${response.data.goto}`;
                                }
                            });
                    }
                });
            }
        }
    };
    $scope.isAnswer = "text-light";

    // if a user clicks an answer
    $scope.narateStart;
    $scope.narateCount = 0;
    $scope.done = false;

    $scope.starter = true;
    // if a user clicks the naration
    $scope.doneTrigger = () => {
        $scope.getQuestion();
        if ($scope.starter) {
            $scope.starter = false;
        }
    };

    $scope.humana = () => {
        $scope.buttonIkuzu = `<button class="btn btn-sm btn-outline-light" ng-click="doneTrigger();">${
            $scope.starter ? "Let's Go" : "Next Question"
        }</button>`;
        var compiledTrigger = $compile($scope.buttonIkuzu)($scope);
        if ($scope.currentLives >= 0) {
            setTimeout(() => {
                $("#narate").append(compiledTrigger);
            }, 700);
        }
    };

    $scope.narateFunction = () => {
        $("#narate").html(`<p class="${$scope.isAnswer} h5 mb-3"></p>`);
        $scope.narateStart = setInterval(() => {
            $("#narate p").append(narate1[$scope.narateCount]);
            if ($scope.narateCount === narate1.length - 1) {
                $scope.humana();
                $scope.narateCount = 0;
                clearInterval($scope.narateStart);
            } else {
                $scope.narateCount++;
            }
        }, 10);
    };

    $(document).ready(function () {
        $scope.narateFunction();
        $scope.startLevel($scope.level);
    });
});
