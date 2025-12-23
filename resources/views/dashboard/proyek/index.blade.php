@extends('layouts.maindashboardb')
 @section('container')
        
          <div class="content-wrapper">
            <!-- Content -->
          
            <div class="container-fluid flex-grow-1 container-p-y">
              <div class="row">
                @if($alls->count()==0)
                            
                @endif
                @foreach($alls as $all)
                <div class="col-md-6 col-lg-4 col-sm-12 mb-3">
                  <div class="card">
                    <div class="card-header">Data Proyek</div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $all->id_proyek }}</h5>
                      <p class="card-text">
                        {{ $all->uraian_jenis_perusahaan }}<br>
                        {{ $all->nama_perusahaan }}<br>
                        {{ $all->kbli }}  {{ $all->judul_kbli }}<br>
                        @if($all->longitude==NULL&&$all->latitude==NULL)
                        <div class="alert alert-warning" role="alert"><i class='bx bxs-error'></i> Lokasi Izin Usaha Belum Ada ?!</div>
                         @endif
                      </p>
                      <a href="{{ url('/proyek/laporan?idproyek=' . $all->id_proyek) }}" class="btn btn-primary">Lapor</a>
                      <a href="{{ url('/proyek/izin?idproyek=' . $all->id_proyek) }}" class="btn btn-primary">Data Izin</a>
                      <a href="{{ url('/proyek/laporan?idproyek=' . $all->id_proyek) }}" class="btn btn-primary">Lokasi</a>
                    </div>
                  </div>
                </div>
                 @endforeach
                <!-- Total Revenue -->
                
                <!--/ Total Revenue -->
              </div>
              
            </div>    
          
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
       
  @endsection