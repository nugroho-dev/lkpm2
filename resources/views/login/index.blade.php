@extends('layouts.main')
 @section('container')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="{{ url('/login') }}" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                   <img src="img/Seal_of_the_City_of_Magelang.png" class="img-fluid" alt="Responsive image">
                </span>
                <span class="app-brand-text demo text-body fw-bolder text-uppercase">LKPM UMKM</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Selamat Datang 👋</h4>
            <p class="mb-4">Silakan "sign-in" menggunakan Nomor Induk Berusaha anda</p>

            <form id="formAuthentication" class="mb-3" action="{{ url('/login') }}" method="POST">
               @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Nomor NIB Anda</label>
                <input
                  type="text"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  placeholder="Masukan Nomor NIB Anda"
                  autofocus
                />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3 form-password-toggle">
                <!--<div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="#">
                    <small>Lupa Password?</small>
                  </a>
                </div>-->
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    required
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <!--<input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>-->
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

            <p class="text-center">
              <span>Belum Punya Akun?</span>
              <a href="{{ url('/register') }}">
                <span>Buat Akun</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
  @endsection