@extends('layouts.main')
 @section('container')
<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                     <img src="img/Seal_of_the_City_of_Magelang.png" class="img-fluid" alt="Responsive image">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder text-uppercase">LKPM UMKM</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">REGISTRASI AKUN 🚀</h4>
              <p class="mb-4">Isikan form berikut untuk membuat akun</p>

              <form id="formAuthentication" class="mb-3" action="/register" method="POST">
                @csrf
                <!--<div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>-->
                <div class="mb-3">
                  <label for="email" class="form-label">Masukan NIB Anda</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror"" id="nib" name="email" placeholder="Nomor Induk Berusaha Anda" />
                  @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>   
                   @enderror
                </div>
                <!--
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control  is-invalid "
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      
                      <div class="invalid-feedback">
                      
                       </div>   
                     
                  </div>
                
                </div>

                <!--<div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>-->
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Sudah Punya Akun?</span>
                <a href="{{ url('/') }}">
                  <span>"Sign in" Disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
@endsection