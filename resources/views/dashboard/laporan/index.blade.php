@extends('layouts.maindashboardb')
 @section('container')
        
 <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Proyek </span>{{ $id_proyek}}</h4>

              <div class="row">
                <div class="col-xl-12">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Data Proyek</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Id Proyek</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $id_proyek }}" id="html5-text-input"  readonly/>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label">NIB</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $nibp }}" id="html5-search-input"  readonly/>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="html5-email-input" class="col-md-3 col-form-label">Nama Perusahaan</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $nama_perusahaan }}" id="html5-email-input" readonly/>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="html5-email-input" class="col-md-3 col-form-label">NPWP Perusahaan</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $npwp_perusahaan }}" id="html5-email-input" readonly/>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="html5-url-input" class="col-md-3 col-form-label">Status Penanaman Modal</label>
                            <div class="col-md-8">
                              <input
                                class="form-control"
                                type="text"
                                value="{{ $uraian_status_penanaman_modal }}"
                                id="html5-url-input"
                                readonly
                              />
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="html5-tel-input" class="col-md-3 col-form-label">Jenis Perusahaan</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $uraian_jenis_perusahaan }}" id="html5-tel-input"  readonly/>
                            </div>
                          </div>
                         
                        </div>
                        <div class="col-md-6">
                           <div class="mb-3 row">
                            <label for="html5-password-input" class="col-md-3 col-form-label">Risiko Proyek</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{  $uraian_risiko_proyek }}" id="html5-password-input" readonly/>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-3 col-form-label">Sakla Usaha</label>
                            <div class="col-md-8">
                              <input class="form-control" type="text" value="{{ $uraian_skala_usaha }}" id="html5-number-input" readonly/>
                            </div>
                          </div>
                       <div class="mb-3 row">
                        <label for="html5-datetime-local-input" class="col-md-3 col-form-label">Alamat Usaha</label>
                        <div class="col-md-8">
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" readonly>{{ $alamat_usaha }} Kel. {{ $kelurahan_usaha }} Kec. {{ $kecamatan_usaha }}</textarea>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-3 col-form-label">KBLI</label>
                        <div class="col-md-8">
                          <input class="form-control" type="text" value="{{ $kbli }} {{ $judul_kbli }}" id="html5-date-input"  readonly/>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-month-input" class="col-md-3 col-form-label">Sektor Pembina</label>
                        <div class="col-md-8">
                          <input class="form-control" type="text" value="{{ $kl_sektor_pembina }}" id="html5-month-input" readonly/>
                        </div>
                      </div>
                     
                        </div>
                      </div>
                     
                     
                    </div>
                  </div>

                  <!-- File input -->
                  <div class="card">
                    <h5 class="card-header">Laporan Kegiatan Penanaman Modal</h5>
                    
                    <div class="card-body">
                      <div class="col-md-12 col-lg-12">
                        <div class=" text-end mb-3">
                          <a href="/proyek/laporan/create?idproyek={{ $id_proyek }}" class="btn btn-primary"><i class='bx bxs-file'></i> Buat Laporan</a>
                        </div>
                    </div>
                       <div class="table-responsive text-nowrap">
                         @if($datas->count()==0)
                         <div class="alert alert-danger" role="alert">Belum ada data Laporan Kegiatan Penanaman Modal !</div>
                         @else
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Nomor</th>
                              <th>Tahun Lapor</th>
                              <th>Periode</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach($datas as $key=>$data)
                            <tr>
                              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $datas->firstItem() + $key }}</strong></td>
                              <td>{{ $data->tahun }}</td>
                              <td> @if($data->periode==1)
                                Semester I
                                @else
                               Semester II
                                @endif</td>
                              <td><span class="badge bg-label-primary me-1">Active</span></td>
                              <td>
                                
                            
                                    <a class="btn btn-info" href="/proyek/laporan/{{ $data->id }}?idproyek={{ $id_proyek }}"
                                      ><i class='bx bxs-file-doc me-1'></i> Lihat</a
                                    >
                                
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
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