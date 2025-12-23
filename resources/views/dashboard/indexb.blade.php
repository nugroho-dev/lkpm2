@extends('layouts.maindashboardb')
 @section('container')
        
          <div class="content-wrapper">
            <!-- Content -->
          
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Halo,   {{ $nama_perusahaan}} ! 🎉</h5>
                          <p class="mb-4">
                            Cek Profil Kamu disini.  <a href="javascript:;" class="btn btn-sm btn-outline-primary">Profil</a>
                          </p>
                         
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                            src="{{ url('img/illustrations/man-with-laptop-light.png') }}"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="{{ url('img/illustrations/man-with-laptop-dark.png') }}"
                            data-app-light-img="{{ url('img/illustrations/man-with-laptop-light.png') }}"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Profil</h5>
                        <div class="px-2 table-responsive text-nowrap pb-5 row">
                          <div class="col-md-6">
                            <div class="card-body">
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NIB</label>
                                <input
                                  type="text"
                                  class="form-control-plaintext"
                                  id="exampleFormControlInput1"
                                  placeholder="name@example.com"
                                  readonly
                                  disabled
                                  value="{{ $nib }}"
                                />
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Tanggal Terbit</label>
                                <input
                                  class="form-control-plaintext"
                                  type="text"
                                  id="exampleFormControlReadOnlyInput1"
                                  placeholder="Readonly input here..."
                                  readonly
                                  disabled
                                  value="{{ \Carbon\Carbon::hasFormat($tanggal_terbit, 'Y-m-d') ? \Carbon\Carbon::parse($tanggal_terbit)->isoFormat('D MMMM Y') : $tanggal_terbit }}"
                                />
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Status Penanaman Modal</label>
                                <input
                                  type="text"
                                  readonly
                                  class="form-control-plaintext"
                                  id="exampleFormControlReadOnlyInputPlain1"
                                  
                                  readonly
                                  disabled
                                  value="{{ $status_penanaman_modal }}"
                                />
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Nama Perusahaan</label>
                                <input
                                  type="text"
                                  readonly
                                  class="form-control-plaintext"
                                  id="exampleFormControlReadOnlyInputPlain1"
                                  
                                  readonly
                                  disabled
                                  value="{{ $nama_perusahaan }}"
                                />
                              </div>
                             
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat Perusahaan :</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                   disabled>{{ $alamat_perusahaan }} {{ $kab_kota }}</textarea>
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email :</label>
                                <input
                                  type="email"
                                  class="form-control-plaintext"
                                  id="exampleFormControlInput1"
                                  placeholder="name@example.com"
                                   readonly
                                   disabled
                                   value="{{ $email }}"
                                />
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlReadOnlyInput1" class="form-label">No Telp :</label>
                                <input
                                  class="form-control-plaintext"
                                  type="text"
                                  id="exampleFormControlReadOnlyInput1"
                                  placeholder="Readonly input here..."
                                  readonly
                                  disabled
                                  value="{{ $nomor_telp }}"
                                />
                              </div>
                             
                              
                            </div>
                          </div>
                        <!--<table class="table table-striped table-hover mb-5">
                          <thead>
                            @if($alls->count()==0)
                            
                            @endif
                            <tr>
                              <th>NIB</th>
                              <th>Tanggal Terbit</th>
                              <th>Nama Perusahaan</th>
                              <th>Status Penanaman Modal</th>
                              <th>Jenis Perusahaan</th>
                              <th>Detil</th>
                            </tr>
                            
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach($names as $all)
                            
                            <tr>
                              <td>{{ $all->nib }} </td>
                              <td>{{ \Carbon\Carbon::hasFormat($all->day_of_tanggal_terbit_oss, 'Y-m-d') ? \Carbon\Carbon::parse($all->day_of_tanggal_terbit_oss)->isoFormat('D MMMM Y') : $all->day_of_tanggal_terbit_oss }}</td>
                              <td>{{ $all->nama_perusahaan }}</td>
                              <td> 
                                @if($all->status_penanaman_modal=="PMDN")
                                <span class="badge bg-success">Penanaman Modal Dalam Negeri</span>
                                @else
                                <span class="badge bg-danger">Penanaman Modal Dalam Asing</span>
                                @endif
                              </td>
                              <td>{{ $all->uraian_jenis_perusahaan }}</td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"
                                      ><i class='bx bxs-spreadsheet'></i> Lihat</a>
                                    <a class="dropdown-item" href="javascript:void(0);"
                                      ><i class='bx bxs-spreadsheet'></i> Lapor LKPM</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @if($all->titik_koordinat==NULL)
                            <tr>
                              <th colspan="6" class="text-center"> <div class="alert alert-warning" role="alert"> <i class='bx bxs-error'></i>  Anda Belum Mengupdate Lokasi Izin Usaha ?! </div></th>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>-->
                        
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <!-- Total Revenue 
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Data Izin</h5>
                        <div class="px-2 table-responsive text-nowrap">
                        <table class="table table-striped table-hover mb-5">
                          <thead>
                             @if($izins->count()==0)
                            <tr>
                              <th colspan="5" class="text-center"> <div class="alert alert-warning" role="alert"> <i class='bx bxs-error'></i>  Anda Tidak Mempunyai Data Izin </div></th>
                            </tr>
                            @else
                            <tr>
                              <th>ID Permohonan Izin</th>
                              <th>Status</th>
                              <th>Jenis Perizinan</th>
                              <th>Dokumen</th>
                              <th>Resiko</th>
                              <th>Detil</th>
                            </tr>
                            @endif
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach($izins as $izin)
                            <tr>
                              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $izin->id_permohonan_izin }}</strong></td>
                              <td>{{ $izin->uraian_status_respon }}</td>
                              <td>{{ $izin->uraian_jenis_perizinan }}</td>
                              <td>{{ $izin->nama_dokumen }}</td>
                              <td> 
                                @if($izin->kd_resiko=="T")
                                <span class="badge bg-danger">Tinggi</span>
                                @endif
                                @if($izin->kd_resiko=="MT")
                                <span class="badge bg-warning">Menengah Tinggi</span>
                                @endif
                                @if($izin->kd_resiko=="MR")
                                <span class="badge bg-info">Mengah Rendah</span>
                                @endif
                                @if($izin->kd_resiko=="R")
                                <span class="badge bg-success">Rendah</span>
                                @endif
                              </td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"
                                      ><i class='bx bxs-spreadsheet'></i> Lihat</a>
                                  
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                        {{ $izins->links() }}
                         </nav>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
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