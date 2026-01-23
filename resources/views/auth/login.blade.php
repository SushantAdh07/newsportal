@extends('frontend.frontend')
@section('news')
    <div class="contact-page">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-wrpp">
                        <h4 class="contactAddess-title text-center">
                            Login </h4>
                        <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response">
                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                <ul></ul>
                            </div>
                            <form action="{{ route('login') }}" method="POST" class="wpcf7-form init"
                                enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                                @csrf

                                <div style="display: none;">

                                </div>

                                <div class="main_section">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="email" class="contact-title">Email *</label>
                                            <div class="contact-form">
                                                <input id="email"
                                                    class="form-control @if ($errors->has('email')) is-invalid @endif"
                                                    type="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Email">
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="mb-3">
                                            <label for="password" class="contact-title">Password *</label>
                                            <div class="contact-form">
                                                <input id="password"
                                                    class="form-control @if ($errors->has('password')) is-invalid @endif"
                                                    type="password" name="password" placeholder="Password">
                                                @if ($errors->has('password'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="contact-btn">
                                                <input type="submit" value="Login Now"
                                                    class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                    class="wpcf7-spinner"></span>
                                            </div>
                                        </div>
                                        <a class="mt-3" href="{{ route('register') }}">Don't have a account yet? Register
                                            here</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
