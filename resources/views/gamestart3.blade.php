@include('components.header')

<body ng-controller="gamestart3" class="vh-100" style="background-color: papayawhip;">
    <div ng-show="!narator"
        class="container position-relative h-100 d-flex flex-column justify-content-center align-items-center text-align-center"
        style="background-image: url('{{ asset('images/start.jpeg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; border-radius: 25px;">
        <div ng-show="(level == 3)" class="mt-5">
            <div class="d-flex justify-content-evenly mb-5">
                <div class="p-3 text-dark"
                    style="background-color: rgba(255, 255, 255, 0.4); border-radius: 25px; box-shadow: 4px 4px rgba(255, 255, 255, 0.2);">
                    <h1>
                        Level @{{ level }}
                    </h1>

                </div>
                <div id="countdown" class="text-success h3 p-4"
                    style="background-color: rgba(255, 255, 255, 0.4); border-radius: 20px;">

                </div>
                <div class="d-flex flex-column justify-content-evenly p-3"
                    style="background-color: rgba(255, 255, 255, 0.4); border-radius: 20px; box-shadow:rgba(0, 0, 0, 0.2);">
                    <h5>
                        Points: @{{ score }}
                    </h5>
                    <h5 class="text-light">
                        <span class="text-danger">♥</span>&nbsp;x@{{ currentLives + 1 }}
                    </h5>
                </div>
            </div>

            <div>
                <div class="mb-3">
                    <section class="d-flex flex-column justify-content-center align-items-center text-align-center">
                        <h5 class="p-3"
                            style="background-color: rgba(255, 255, 255, 0.4); border-radius: 25px; box-shadow: 4px 4px rgba(255, 255, 255, 0.2);">
                            @{{ currentQuestion.question }}</h5>
                        <button ng-repeat="c in currentChoices track by $index" ng-click="answer(c.id)"
                            ng-disabled="buttonDisabler" class="btn btn-dark w-75 mt-3">@{{ choicesLetter[$index] }}
                            @{{ c.answer }}</button>
                    </section>

                </div>
                <div id="explanations">

                </div>
            </div>
        </div>
    </div>
    <div class="container position-relative h-75" ng-show="narator">
        {{-- <img src="{{ asset('images/frame.png') }}" alt="" class="position-absolute h-75"> --}}
        <div style="background: url('{{ asset('images/frame.png') }}') no-repeat center; background-size: contain; padding: 230px; padding-top: 260px;"
            class="h-75 d-flex flex-column justify-content-center align-items-center text-align-center" id="narate">

        </div>

    </div>
</body>
@include('components.footer')
