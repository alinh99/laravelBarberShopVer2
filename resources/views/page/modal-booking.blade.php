<div class="container">
        @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
</div>


<div class="container my-4">
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <form action="{{ url('/modal-booking') }}" method="POST" class="modal-content">
                @csrf

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Hair cut order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="form3" class="form-control validate" name="name">
                        <label data-error="wrong" data-success="right" for="form3" >Your name</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" id="form2" class="form-control validate" name="email">
                        <label data-error="wrong" data-success="right" for="form2">Your email</label>
                    </div>

                    <div class="md-form mb-3">
                        <i class="fas fa-phone prefix grey-text"></i>
                        <input type="text" id="form2" class="form-control validate" name="phone">
                        <label data-error="wrong" data-success="right" for="form2">Your Phone number</label>
                    </div>

                    <div class="md-form mb-2">
                        <i class="far fa-calendar prefix grey-text"></i>
                        <input type="date" id="form2" class="form-control validate" name="date">
                        <label data-error="wrong" data-success="right" for="form2">Date</label>
                    </div>

                    <div class="md-form mb-1">
                        <i class="far fa-clock prefix grey-text"></i>
                        <input type="time" id="form2" class="form-control validate" name="time">
                        <label data-error="wrong" data-success="right" for="form2">Time</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-customized">Send<i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-right et_pb_button_module_wrapper et_pb_modulue">
        <a href="{{ url('/modal-booking') }}"
            class="et_pb_button et_pb_custom_button_icon et_animated et_pb_button_0 et_pb_button_0 et_pb_bg_layout_dark zoom infinite"
            id="modal-booking"
            style="animation-duration: 1000ms; animation-delay: 0ms; opacity: 1; animation-timing-function: ease-in-out; transform: scale3d(0.97, 0.97, 0.97)"
            data-toggle="modal" data-target="#modalSubscriptionForm">Hair cut order</a>
    </div>
