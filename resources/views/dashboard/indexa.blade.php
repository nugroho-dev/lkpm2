@extends('layouts.maindashboarda')
 @section('container')
        
          <div class="content-wrapper">
            <!-- Content -->
           
            <div class="container-fluid flex-grow-1 container-p-y">
             
              <div class="row">
                <!-- Basic -->
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <h5 class="card-header">Basic</h5>
                    <div class="card-body">
                      
                     <div class="alert alert-danger shadow-lg text-capitalize" role="alert">Anda Belum Mengkaitkan NIB dengan sistem!</div>
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <form action="{{ url('/dashboard') }}">
                            <div class="input-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Masukan NIB Anda"
                                aria-label="Masukan NIB Anda"
                                aria-describedby="button-addon2"
                                name="search"  value="{{ request('search') }}"
                              />
                              <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                            </div>
                          </form>
                          </div>
                        </div>
                        @if(request('search'))
                        <div class="table-responsive ">
                          <table class="table">
                            <thead>
                               @if($items->count()==0)
                              <tr>
                                <td class="text-nowrap text-center alert alert-danger" colspan="6"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> NIB Yang Anda Cari Tidak Ditemukan !</strong></td>
                              </tr>
                              @else
                              <tr>
                                <th>NIB</th>
                                <th>Tanggal Terbit</th>
                                <th>Nama Perusahaan</th>
                                <th>Jenis Perusahaan</th>
                                <th>Alamat Perusahaan</th>
                                <th>*</th>
                              </tr>
                              @endif
                            </thead>
                            <tbody class="table-border-bottom-0">
                             
                              @foreach($items as $item)
                              <tr>
                                <td class="text-nowrap"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> {{ $item->nib }}</strong></td>
                                <td class="text-nowrap"> {{ Carbon\Carbon::parse($item->day_of_tanggal_terbit_oss)->isoFormat('D MMMM Y') }}</td>
                                <td class="text-nowrap"> {{ $item->nama_perusahaan }}</td>
                                <td class="text-nowrap"> {{ $item->uraian_jenis_perusahaan }}</td>
                                <td class="text-wrap" > {{ $item->alamat_perusahaan }}</td>
                                <td> <form action="{{ url('/store/nib') }}" method="post">
                                  @csrf
                                  <input type="hidden" id="user_id" name="user_id" required autofocus value="{{ auth()->user()->id}}">
                                  <input type="hidden" id="nib" name="nib" required autofocus value="{{ $item->nib }}">
                                  <button type="submit" class="btn btn-success">Kaitkan</button>
                                  </form></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        @endif
                    </div>
                    </div>
                    
                    
                     
                  </div>
                </div>
          
                <!-- /Basic -->
            </div>
             
            <!-- / Content -->

            <!-- Footer -->
           
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
       
  @endsection