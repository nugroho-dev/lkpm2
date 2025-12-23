@extends('layouts.maindashboardb')
 @section('container')
        
 <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan Kegiatan Penanaman Modal - Proyek </span>{{ $id_proyek}}</h4>

              <div class="row">
                <div class="col-xl-12">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Rubah Laporan</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <form method="post" action="{{ url('/proyek/laporan/' . $post->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                              <div class="card-body">
                                <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-3 col-form-label">Id Proyek</label>
                                  <div class="col-md-5">
                                    <input class="form-control @error('id_proyek') is-invalid @enderror" type="text" value="{{ $id_proyek }}" name="id_proyek" id="html5-text-input"  readonly/>
                                     @error ('id_proyek')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="divider divider-dashed">
                                    <div class="divider-text h6"><h6>Periode Pelaporan</h6></div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-search-input" class="col-md-3 col-form-label">Tahun</label>
                                  <div class="col-md-2">
                                    <select class="form-select @error('tahun') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="tahun">
                                      {{ $last= date('Y')-1 }}
                                      {{ $now = date('Y') }}

                                      @for ($i = $now; $i >= $last; $i--)
                                          @if(old('tahun',$i)==$post->tahun)
                                          <option value="{{ $i }}" selected>{{ $i }}</option>
                                          @else
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endif
                                      @endfor
                                    </select>
                                     @error ('tahun')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-search-input" class="col-md-3 col-form-label">Periode</label>
                                  <div class="col-md-3">
                                    <select class="form-select @error('periode') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="periode">
                                      @if(old('periode',2)==$post->periode)
                                      <option value="2"  selected>Semester II</option>
                                      @else
                                      <option value="1">Semester I</option>
                                      @endif

                                      @if(old('periode',2)==$post->periode)
                                      <option value="1" selected>Semester I</option>
                                      @else
                                      <option value="2">Semester II</option>
                                      @endif
                                    </select>
                                     @error ('periode')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                              <div class="card-body">
                                <div class="divider divider-dashed">
                                    <div class="divider-text h6"><h6>Realisasi Penanaman Modal</h6></div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-email-input" class="col-md-3 col-form-label">Modal Tetap</label>
                                  <div class="col-md-4">
                                    <input class="form-control @error('modal_tetap') is-invalid @enderror" type="number" value="{{ $post->modal_tetap }}"  placeholder="Contoh : 25000000" id="html5-email-input" name="modal_tetap" />
                                    @error ('modal_tetap')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-email-input" class="col-md-3 col-form-label">Modal Kerja</label>
                                  <div class="col-md-4">
                                    <input class="form-control @error('modal_kerja') is-invalid @enderror" type="number" value="{{ $post->modal_kerja }}" placeholder="Contoh : 25000000" id="html5-email-input" name="modal_kerja" />
                                    @error ('modal_kerja')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-date-input" class="col-md-3 col-form-label">Keterangan</label>
                                  <div class="col-md-8">
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Dengan Keterangan dari Modal Kerja dan Modal Tetap " name="keterangan">{{$post->keterangan }}</textarea>
                                    @error ('keterangan')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-password-input" class="col-md-3 col-form-label">Produksi</label>
                                  <div class="col-md-3">
                                    <input class="form-control @error('produksi') is-invalid @enderror" type="number" value="{{$post->produksi }}" placeholder="Contoh : 25000"id="html5-password-input" name="produksi"/>
                                    @error ('produksi')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-number-input" class="col-md-3 col-form-label">Ekspor</label>
                                  <div class="col-md-3">
                                    <input class="form-control @error('ekspor') is-invalid @enderror" type="number" value="{{ $post->ekspor }}" placeholder="Contoh : 25000" id="html5-number-input" name="ekspor" />
                                    @error ('ekspor')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-month-input" class="col-md-3 col-form-label">Kemitraan</label>
                                  <div class="col-md-8">
                                    <input class="form-control @error('kemitraan') is-invalid @enderror" type="text" value="{{ $post->kemitraan }}" id="html5-month-input" placeholder="Isi Dengan Kemitraan" name="kemitraan"/>
                                    @error ('kemitraan')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                              <div class="card-body">
                                <div class="divider divider-dashed">
                                    <div class="divider-text h-6"><h6> Penggunaan Tenaga Kerja </h6></div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-url-input" class="col-md-3 col-form-label">Jumlah Tenaga Kerja Pria</label>
                                  <div class="col-md-2">
                                    <input
                                      class="form-control @error('tki_l') is-invalid @enderror"
                                      type="number"
                                      value="{{ $post->tki_l }}"
                                      placeholder="Contoh : 25"
                                      id="html5-url-input"
                                      name="tki_l"
                                    />
                                    @error ('tki_l')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-tel-input" class="col-md-3 col-form-label">Jumlah Tenaga Kerja Wanita</label>
                                  <div class="col-md-2">
                                    <input class="form-control @error('tki_p') is-invalid @enderror" type="number" value="{{ $post->tki_p }}"  placeholder="Contoh : 25"id="html5-tel-input" name="tki_p" />
                                    @error ('tki_p')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                              <div class="card-body">
                                <div class="divider divider-dashed">
                                    <div class="divider-texth-6"><h6>Permasalahan yang Dihadapi Pelaku Usaha</h6></div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-datetime-local-input" class="col-md-3 col-form-label">Kategori Masalah</label>
                                  <div class="col-md-8">
                                    <select class="form-select @error('kategori_masalah') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="kategori_masalah">
                                      @if(old('kategori_masalah',0)== $post->kategori_masalah )
                                      <option value="0" selected>Tidak Ada Masalah</option>
                                      @else
                                      <option value="0">Tidak Ada Masalah</option>
                                      @endif



                                      @if(old('kategori_masalah',1)==$post->kategori_masalah )
                                      <option value="1" selected>Perizinan Berusaha</option>
                                      @else
                                      <option value="1" >Perizinan Berusaha</option>
                                      @endif


                                      @if(old('kategori_masalah',2)==$post->kategori_masalah)
                                      <option value="2" selected>Perizinan Berusaha Untuk Menunjang Kegiatan Usaha (PB UMKU)</option>
                                      @else
                                      <option value="2" >Perizinan Berusaha Untuk Menunjang Kegiatan Usaha (PB UMKU)</option>
                                      @endif


                                      @if(old('kategori_masalah',3)==$post->kategori_masalah)
                                      <option value="3" selected>Persyaratan Dasar</option>
                                      @else
                                      <option value="3" >Persyaratan Dasar</option>
                                      @endif


                                      @if(old('kategori_masalah',4)==$post->kategori_masalah)
                                      <option value="4" selected>Tenaga Kerja</option>
                                      @else
                                      <option value="4" >Tenaga Kerja</option>
                                      @endif


                                      @if(old('kategori_masalah',5)==$post->kategori_masalah)
                                      <option value="5" selected>Tata Ruang</option>
                                      @else
                                      <option value="5" >Tata Ruang</option>
                                      @endif


                                      @if(old('kategori_masalah',6)==$post->kategori_masalah)
                                      <option value="6" selected>Infrastruktur</option>
                                      @else
                                      <option value="6" >Infrastruktur</option>
                                      @endif


                                      @if(old('kategori_masalah',7)==$post->kategori_masalah)
                                      <option value="7" selected>Kebutuhan Utilitas</option>
                                      @else
                                      <option value="7" >Kebutuhan Utilitas</option>
                                      @endif


                                      @if(old('kategori_masalah',8)==$post->kategori_masalah)
                                      <option value="8" selected>Konflik Masyarakat</option>
                                      @else
                                      <option value="8" >Konflik Masyarakat</option>
                                      @endif


                                      @if(old('kategori_masalah',9)==$post->kategori_masalah)
                                      <option value="9" selected>Lingkungan Hidup</option>
                                      @else
                                      <option value="9" >Lingkungan Hidup</option>
                                      @endif


                                      @if(old('kategori_masalah',10)==$post->kategori_masalah)
                                      <option value="10" selected>Laporan Kegiatan Penanaman Modal (LKPM)</option>
                                      @else
                                      <option value="10" >Laporan Kegiatan Penanaman Modal (LKPM)</option>
                                      @endif

                                      
                                      @if(old('kategori_masalah',11)==$post->kategori_masalah)
                                      <option value="11" selected>Sistem OSS</option>
                                      @else
                                      <option value="11" >Sistem OSS</option>
                                      @endif


                                      @if(old('kategori_masalah',12)==$post->kategori_masalah)
                                      <option value="12" selected>Fiskal</option>
                                      @else
                                      <option value="12" >Fiskal</option>
                                      @endif


                                      @if(old('kategori_masalah',13)==$post->kategori_masalah)
                                      <option value="13" selected>Masalah Lainnya</option>
                                      @else
                                      <option value="13">Masalah Lainnya</option>
                                      @endif
                                    </select>
                                    @error ('kategori_masalah')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-date-input" class="col-md-3 col-form-label">Permasalahan</label>
                                  <div class="col-md-8">
                                    <textarea class="form-control @error('permasalahan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Dengan Permasalahan Yang Sedang Dihadapai" name="permasalahan">{{ $post->permasalahan }}</textarea>
                                    @error ('permasalahan')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                              <div class="card-body">
                                <div class="divider divider-dashed">
                                  <div class="divider-texth-6"><h6>Pimpinan / Penanggung Jawab LKPM</h6></div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-month-input" class="col-md-3 col-form-label">Nama Petugas</label>
                                  <div class="col-md-8">
                                    <input class="form-control @error('nama_pegawai') is-invalid @enderror" type="text" value="{{ $post->nama_pegawai }}" id="html5-month-input" placeholder="Isi Dengan Petugas Pengisi Data Laporan"  name="nama_pegawai"/>
                                    @error ('nama_pegawai')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-month-input" class="col-md-3 col-form-label">Jabatan</label>
                                  <div class="col-md-8">
                                    <input class="form-control @error('jabatan') is-invalid @enderror" type="text" value="{{ $post->jabatan }}" id="html5-month-input"  placeholder="Isi Dengan Jabatan Petugas Pengisi Data Laporan" name="jabatan" />
                                    @error ('jabatan')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-month-input" class="col-md-3 col-form-label">No HP/Telp</label>
                                  <div class="col-md-8">
                                    <input class="form-control @error('no_hp') is-invalid @enderror" type="tel" value="{{ $post->no_hp }}" id="html5-month-input"  placeholder="Isi Dengan No HP Petugas Pengisi Data Laporan" name="no_hp" />
                                    @error ('no_hp')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-month-input" class="col-md-3 col-form-label">Email</label>
                                  <div class="col-md-8">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{ $post->email }}" id="html5-month-input"  placeholder="Isi Dengan Email Petugas Pengisi Data Laporan" name="email"/>
                                    @error ('email')
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                       {{ $message }} 
                                    </div>
                                     @enderror
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="demo-inline-spacing text-center">
                              <button type="submit" class="btn btn-primary col-lg-2">Ubah</button>
                              <a href="{{ url('/proyek/laporan?idproyek=' . $id_proyek) }}" type="button" class="btn btn-danger col-lg-2">Batal</a>
                            </div>
                          </form>

                        </div>
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