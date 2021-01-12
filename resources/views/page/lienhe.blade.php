@extends('master')
@section('content')
@include('page\modal-booking')
    <div class="container">
      <!-- Start: Contatti+gmap -->
      <div id="page" class="page">
        <section
          class="padding-110px-tb bg-white builder-bg xs-padding-60px-tb border-none"
          id="contact-section17"
        >
          <div class="container">
            <div class="row">
              <!-- section title -->
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h2
                  class="section-title-large sm-section-title-medium xs-section-title-large text-black font-weight-600 alt-font tz-text margin-ten-bottom xs-margin-fifteen-bottom"
                >
                  Liên hệ
                </h2>
              </div>
              <!-- end section title -->
            </div>
            <div class="row">
              <!-- contact detail -->
              <div
                class="col-md-12 col-sm-12 col-xs-12 no-padding text-center center-col clear-both"
              >
                <div
                  class="col-md-4 col-sm-4 col-xs-12 xs-margin-thirteen-bottom"
                >
                  <div
                    class="col-md-2 vertical-align-middle no-padding display-block md-margin-nine-bottom xs-margin-three-bottom"
                  >
                    <i
                      class="fa ti-location-pin icon-extra-large text-sky-blue xs-icon-medium-large tz-icon-color"
                    ></i>
                  </div>
                  <div
                    class="col-md-10 vertical-align-middle text-left no-padding text-black md-display-block sm-text-center text-medium tz-text"
                  >
                    154 Phan Dang Luu, Hai Chau District <br /> Da Nang, Viet Nam.
                  </div>
                </div>
                <div
                  class="col-md-4 col-sm-4 col-xs-12 xs-margin-thirteen-bottom"
                >
                  <div
                    class="col-md-3 vertical-align-middle no-padding display-block md-margin-nine-bottom xs-margin-three-bottom"
                  >
                    <i
                      class="fa ti-email icon-extra-large text-sky-blue xs-icon-medium-large tz-icon-color"
                    ></i>
                  </div>
                  <div
                    class="col-md-9 vertical-align-middle text-left no-padding md-display-block sm-text-center"
                  >
                    <div
                      class="text-medium font-weight-600 text-black display-block tz-text"
                    >
                      General Enquiries
                    </div>
                    <a
                      class="tz-text text-black text-medium"
                      href="mailto:alinh1803@gmail.com"
                      >alinh1803@gmail.com</a
                    >
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div
                    class="col-md-2 vertical-align-middle no-padding display-block md-margin-nine-bottom xs-margin-three-bottom"
                  >
                    <i
                      class="fa ti-mobile icon-extra-large text-sky-blue xs-icon-medium-large tz-icon-color"
                    ></i>
                  </div>
                  <div
                    class="col-md-10 vertical-align-middle text-left no-padding md-display-block sm-text-center"
                  >
                    <div
                      class="text-medium font-weight-600 text-black display-block tz-text"
                    >
                      Call Us Today!
                    </div>
                    <div class="text-medium text-black tz-text">
                      +84 (9) 35 232 661
                    </div>
                  </div>
                </div>
              </div>
              <!-- end contact detail -->
              <!-- map -->
              <div
                class="col-md-12 col-sm-12 col-xs-12 map margin-ten-top margin-ten-bottom"
              >
                <iframe
                  class="width-100"
                  height="313"
                  id="map_canvas1"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.843821917424!2d144.956054!3d-37.817127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1427947693651"
                ></iframe>
              </div>
              <!-- end map -->
              <!-- contact form -->
              @if(count($errors)>0)
              <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                      {{$err}}</br>
                  @endforeach
              </div>
              @endif
              @if(session()->has('success'))
                  <div class="alert alert-success">{{session()->get('success')}}</div>
              @endif
              <form action="{{route('lienhe')}}" method="post" class="float-left width-100">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div
                  class="col-md-12 col-sm-12 center-col contact-form-style2 no-padding"
                >
                  <div class="col-md-6 col-sm-6">
                    <input
                        id="name"
                      type="text"
                      {{-- data-email="required" --}}
                      placeholder="*Tên của bạn"
                      class="medium-input"
                        name="name"
                    />
                    <input

                      type="text"
                      {{-- data-email="required" --}}
                      placeholder="* Email của bạn"
                      class="medium-input"
                    id="email"
                    name="email"
                    />
                    <input
                      type="number"
                        name="phone"
                      id="phone"
                      placeholder="Số điện thoại của bạn"
                      class="medium-input"

                    />
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <textarea
                        id="notes"
                        name="note"
                      placeholder="Nội dung..."
                      class="medium-input"

                    ></textarea>
                    <button
                      class="contact-submit btn-medium btn bg-sky-blue text-black tz-text"
                      type="submit"
                    >
                      SEND MESSAGE
                    </button>
                  </div>
                </div>
              </form>
              <!-- end contact form -->
            </div>
          </div>
        </section>
      </div>
      <!-- javascript libraries -->

      <!-- End: Contatti+gmap -->
    </div>
@endsection
