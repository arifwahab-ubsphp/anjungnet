<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content-wrapper') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<style>
  .border-left-secondary{
    border-left: .25rem solid #858796!important;
  }
  .border-left-primary{
    border-left: .25rem solid #4e73df!important
  }
  .border-left-success{
    border-left: .25rem solid #71dd37!important
  }
  .border-left-danger{
    border-left: .25rem solid #ff3e1d!important
  }
  .border-left-warning{
    border-left: .25rem solid #ffab00!important
  }
  .border-left-info{
    border-left: .25rem solid #03c3ec!important
  }
  
</style>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <?php echo "<pre/>"; print_r($userlist); ?>
              <?php foreach($userlist as $row):
                $nama = $row->Nama;
                $pusat = $row->NPusat;
                $nok = $row->NoK;

              endforeach;

              foreach($profile as $row1):
                $roleid = $row1->roleid;
                $role = $row1->role_name;
              endforeach;
              ?>

              <h3 class="card-title text-primary">Selamat Datang</h3>
              <h5><?= $nama; ?> (<?= $nok; ?>)</h5>
              <h6 style="text-transform:uppercase"><?= $pusat; ?></h6>
              <h6 style="text-transform:uppercase">Peranan: <?= $role; ?></h6>              
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
              </div>
              <span class="fw-semibold mb-1">Perlu Perhatian / Tindakan Anda</span><br/>              
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="border:0px"> INTEAM <span class="badge bg-danger">5</span>
                </li>                
                <li class="list-group-item d-flex justify-content-between align-items-center" style="border:0px">PROPER <span class="badge bg-danger">1</span></li>
                <li class="list-group-item " style="border:0px"><a href="#">Lihat selanjutnya</a> <span class="badge bg-danger">10</span></li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Jumlah Pengguna Aktif</div>                                            
                  </div>
                  <div class="col-auto">
                      <i class="fa-2x text-gray-800">300</i>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Pengguna Tidak Aktif</div>                                            
                  </div>
                  <div class="col-auto">
                      <i class="fa-2x text-gray-800">50</i>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h3 class="card-title text-primary">Pengumuman IM</h3>
              <ul class="list-group">
                <li class="list-group-item justify-content-between align-items-center" style="border:0px"> Sistem Anjungnet v.3 Sedang Dalam Proses Pembangunan <span class="badge bg-danger">NEW</span>
                </li>                
                <li class="list-group-item justify-content-between align-items-center" style="border:0px"> Kick-off meeting bersama Pusat CC pada 6 Jun 2024 @ 9 Pagi</li>
                
              </ul>                         
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

<!-- Footer -->
<?= $this->include('layouts/footer') ?>
<!-- / Footer -->


</div>
<!-- Content wrapper -->
<?= $this->endSection() ?>