@include('components.header');

<body ng-controller="manos" class="vh-100" style="background-color: papayawhip;">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-align-center"
        style="background-image: url('{{ asset('images/start.jpeg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; border-radius: 25px;">
        <header class="text-center p-5"
            style="border: 1px solid white; border-radius: 25px; box-shadow: 10px 10px rgba(123, 65, 62, 0.5); background-color: rgba(255, 255, 255, 0.5);">
            <h1 class="fw-bold" style="color: black; font-size: 1.5cm;">
                @{{ title }}
            </h1>
        </header>
        <main class="d-flex flex-column p-3">
            <p class="text-danger fw-bold p-3"
                style="font-size: 1cm; background-color: rgba(255, 255, 255, 0.5); border-radius: 25px; box-shadow: 10px 10px rgba(123, 65, 62, 0.5);">
                @{{ description }} </p>
            <button type="button" ng-repeat="b in buttons" class="btn @{{ b.class }} mb-3"
                style="font-size: .5cm; box-shadow: 10px 10px rgba(123, 65, 62, 0.5);" ng-click="startgame(b.type);">
                @{{ b.type }}
            </button>
        </main>
    </div>

    <div class="modal fade" id="usermodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create your profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="userForm" id="myform" action="{{ route('user.enter') }}" method="POST"
                        ng-submit="submitForm(userForm.$valid)" novalidate>
                        @method('POST')
                        @csrf
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ old('name') }}" placeholder="Your name here..." ng-model="username" required>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="myform" class="btn btn-primary" ng-disabled="userForm.$invalid">Let's
                        Go</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            @if ($errors->has('name'))
                $("#usermodal").modal('show');
            @endif
        });
    </script>
</body>

@include('components.footer');
