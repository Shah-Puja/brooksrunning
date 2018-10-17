@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<form aria-label="{{ __('Reset Password') }}">
    @csrf
    
        <div class="row">
            <div class="col-8">
                <div class="input-wrapper">
                    <label for=""><sup>*</sup>{{ __('E-Mail Address') }}</label>
                    <input type="text" name="email" id="email" class="input-field form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $email ?? old('popup_email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback error" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="cart-btn">
                    <button type="button" class="primary-button pdp-button reset_password">{{ __('Send') }}</button>
                </div><!--pass-emailpopup-send-->
            </div>
        </div>

</form>