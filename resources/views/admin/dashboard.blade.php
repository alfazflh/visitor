<x-layouts.app :title="'Visitor Management System'">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #186275 no-repeat center center fixed;
      background-size: cover;
    }

    .container {
      max-width: 1200px; 
      margin: 10px 3px 20px 3px;
      background: white;
      border-radius: 8px; 
      padding: 30px;
      box-shadow: 0 19px 41px rgba(0,0,0,0.1);
    }

    h2 {
    margin-bottom: 5px;
    font-size: 20px;
    font-weight: 600;
}



    .cards {
      display: flex; justify-content: space-between; gap: 20px; margin-bottom: 30px;
    }
    .card {
      flex: 1; background: #f8f8f8; border: 1px solid #ccc;
      border-radius: 8px; padding: 20px; text-align: center;
    }
    .card h1 { margin: 0; font-size: 32px; color: #196275; }
    .card p { margin: 5px 0 0; font-size: 14px; color: #444; }

    .filter-section { display: flex; gap: 20px; align-items: center; margin-bottom: 20px; }
    .filter-section input {
      padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;
    }

    .export-btn {
        padding: 4px 10px;
font-size: 13px;
  background: #196275;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}



    table {
      width: 100%; border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd; padding: 10px; text-align: left;
    }
    th { background-color: #196275; color: white; }

    .btn-detail {
      background-color: #196275; color: white;
      border: none; padding: 6px 12px; border-radius: 4px;
      cursor: pointer;
    }

    .modal {
      display: none; position: fixed; z-index: 9999; left: 0; top: 0;
      width: 100%; height: 100%; overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
      background-color: #fff; margin: 10% auto; padding: 20px;
      border: 1px solid #888; width: 90%; max-width: 400px;
      border-radius: 8px;
    }

.modal-content {
  font-family: 'Poppins', sans-serif;
  background: #fff;
  border-radius: 16px;
  padding: 30px;
  max-width: 700px;
  margin: 40px auto;
  box-shadow: 0 0 40px rgba(0,0,0,0.2);
  position: relative;
}

.modal-content h2 {
  text-align: center;
  color: #196275;
  font-size: 24px;
  margin-bottom: 30px;
}

.detail-header {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-bottom: 24px;
}

.detail-header img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 12px;
  border: 3px solid #196275;
}

.detail-header .info {
  flex: 1;
}

.detail-header .info h3 {
  font-size: 20px;
  margin: 0;
  color: #333;
}

.detail-header .info p {
  margin: 6px 0 0;
  color: #555;
  font-size: 14px;
}

.detail-header .status {
  text-align: right;
  font-size: 14px;
  color: #777;
}

.detail-header .status strong {
  color: #196275;
  font-size: 15px;
}

.section-title {
  font-weight: 600;
  color: #196275;
  font-size: 16px;
  margin: 30px 0 10px;
  border-bottom: 1px solid #ddd;
  padding-bottom: 6px;
}

.info-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.info-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  margin-bottom: 16px;
}

.icon-wrap {
  width: 28px;
  font-size: 18px;
  color: #196275;
  margin-top: 2px;
}

.info-text {
  display: flex;
  flex-direction: column;
}

.info-text label {
  font-weight: 600;
  font-size: 14px;
  color: #196275;
}

.info-text span {
  font-size: 14px;
  color: #333;
}



#btnCheckout {
  background-color: #196275;
  color: white;
  border: none;
  padding: 14px;
  margin-top: 30px;
  border-radius: 6px;
  width: 100%;
  font-weight: 600;
  font-size: 15px;
  cursor: pointer;
  transition: 0.3s;
}

#btnCheckout:hover {
  background-color: #154b5a;
}

@media (max-width: 600px) {
  .info-grid {
    grid-template-columns: 1fr;
  }
}

.filter-section {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  align-items: center;
  margin-bottom: 20px;
}

.filter-form {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  align-items: center;
  flex: 1; /* biar form lebar mengikuti container */
}

.filter-form div {
  display: flex;
  flex-direction: column;
}

.export-btn {
  padding: 10px 20px;
  background: #196275;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  white-space: nowrap;
  font-weight: 600;
}

/* RESPONSIF: tombol ke bawah jika kecil */
@media (max-width: 768px) {
  .filter-section {
    flex-direction: column;
    align-items: stretch;
  }

  .filter-form {
    width: 100%;
  }

  .export-btn {
    width: 100%;
    text-align: center;
  }
}

    .close {
      color: #aaa; float: right; font-size: 24px; font-weight: bold; cursor: pointer;
    }

    .table-responsive {
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

table {
  width: 100%;
  min-width: 800px; /* supaya kolom tidak numpuk di mobile */
  border-collapse: collapse;
}

th, td {
  white-space: nowrap; /* supaya teks tidak turun ke bawah */
}

        @media (max-width: 768px) {
  .container {
    margin: 0px 1px 20px 1px;
    padding: 12px;
  }
}

html {
  color-scheme: only light;
}

@media (prefers-color-scheme: dark) {
  body, .container,
  .card, .modal-content,
  .section-title, .info-text label, .info-text span {
    color: #333 !important;
  }

  .card h1 {
    color: #196275 !important;
  }

  .card p {
  }

  .icon-wrap {
    color: #196275 !important;
  }
}

input[type="date"] {
  background-color: white !important;
  color: #333 !important;
  border: 1px solid #ccc;
}

/* Untuk WebKit browsers (Chrome, Safari) */
input[type="date"]::-webkit-calendar-picker-indicator {
  filter: invert(0);
}

/* Firefox kadang butuh ini juga */
@media (prefers-color-scheme: dark) {
  input[type="date"] {
    color-scheme: light;
  }
}



    </style>

    <div class="container">
        <h2>Daftar Tamu</h2>

        <div class="cards">
            <div class="card">
                <h1>{{ $total }}</h1>
                <p>Tamu Hari Ini</p>
            </div>
            <div class="card">
                <h1>{{ $checkin }}</h1>
                <p>Check In Hari Ini</p>
            </div>
            <div class="card">
                <h1>{{ $checkout }}</h1>
                <p>Check Out Hari Ini</p>
            </div>
        </div>

        <h2>Data Tamu</h2>

        <div class="filter-section">
          <form method="GET" class="filter-form" id="filterForm">
            <div>
                <label>Tanggal Awal Data:</label>
                <input type="date" name="start" value="{{ $start }}">
            </div>
            <div>
                <label>Tanggal Akhir Data:</label>
                <input type="date" name="end" value="{{ $end }}">
            </div>
            <div>
              <label>Cari Nama Tamu:</label>
              <input type="text" id="searchInput" placeholder="Ketik nama tamu..." />
            </div>
            
        </form>
        
            <a class="export-btn" href="{{ route('export', ['start' => $start, 'end' => $end]) }}" target="_blank">Export to Excel</a>
        </div>

        <div class="table-responsive">
            <table id="dataTamu">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Nama Tamu</th>
                        <th>Nama Pegawai Tujuan</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataTamu as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->nama_tamu }}</td>
                            <td>{{ $row->pegawai }}</td>
                            <td>{{ $row->keperluan }}</td>
                            <td>{{ ucfirst($row->status) }}</td>
                            <td>
                                <button class="btn-detail" onclick='showDetail(@json($row))'>Detail</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center;">Tidak ada data tamu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div id="modal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <h2>Detail Tamu</h2>
      
          <div class="detail-header">
            <img id="modalFoto" src="">
            <div class="info">
              <h3 id="modalNama">Nama Tamu</h3>
              <p>Nametag: <span id="modalNameTag">-</span></p>
            </div>
            <div class="status">
              <label>Status</label><br>
              <strong id="modalStatus">-</strong>
            </div>
            
          
          </div>
      
          <div class="section-title">Perusahaan & Tujuan</div>
          <div class="info-grid">
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-building"></i></div>
              <div class="info-text"><label>Perusahaan</label><span id="modalPerusahaan">-</span></div>
            </div>
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-user-tie"></i></div>
              <div class="info-text"><label>Pegawai Tujuan</label><span id="modalPegawai">-</span></div>
            </div>
          </div>
      
          <div class="section-title">Informasi Tambahan</div>
          <div class="info-grid">
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-briefcase"></i></div>
              <div class="info-text"><label>Keperluan</label><span id="modalKeperluan">-</span></div>
            </div>
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-car"></i></div>
              <div class="info-text"><label>Kendaraan</label><span id="modalKendaraan">-</span></div>
            </div>
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-users"></i></div>
              <div class="info-text"><label>Jumlah Tamu</label><span id="modalJumlah">-</span></div>
            </div>
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-shield-alt"></i></div>
              <div class="info-text"><label>Status Induksi</label><span id="modalInduksi">-</span></div>
            </div>
          </div>
      
          <div class="section-title">APD Yang Dipakai</div>
          <div class="info-grid">
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-hard-hat"></i></div>
              <div class="info-text"><label>APD</label><span id="modalApd">-</span></div>
            </div>
          </div>
      
          <div class="section-title">Log Tamu</div>
          <div class="info-grid">
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-sign-in-alt"></i></div>
              <div class="info-text"><label>Jam Check-in</label><span id="modalCheckin">-</span></div>
            </div>
            <div class="info-item">
              <div class="icon-wrap"><i class="fas fa-sign-out-alt"></i></div>
              <div class="info-text"><label>Jam Check-out</label><span id="modalCheckout">-</span></div>
            </div>
          </div>
      
          <form id="checkoutForm" method="POST" class="checkout-form" style="display: none; margin-top: 30px;">
            @csrf
            <button type="submit" id="btnCheckout" class="export-btn">
              Checkout Sekarang
            </button>
          </form>
        </div>
      </div>
      



<script>
    let current = null;

    document.addEventListener('DOMContentLoaded', () => {
        const startInput = document.querySelector('input[name=start]');
        const endInput = document.querySelector('input[name=end]');

        startInput.addEventListener('change', () => document.getElementById('filterForm').submit());
        endInput.addEventListener('change', () => document.getElementById('filterForm').submit());
    });

    function showDetail(data) {
    current = data;
    document.getElementById("modal").style.display = "block";

    document.getElementById("modalFoto").src = "/" + (data.link_foto ?? '');
    document.getElementById("modalNama").innerText = data.nama_tamu ?? '-';
    document.getElementById("modalNameTag").innerText = data.name_tag ?? '-';
    document.getElementById("modalPerusahaan").innerText = data.perusahaan ?? '-';
    document.getElementById("modalPegawai").innerText = data.pegawai ?? '-';
    document.getElementById("modalKeperluan").innerText = data.keperluan ?? '-';
    document.getElementById("modalKendaraan").innerText = data.kendaraan ?? '-';
    document.getElementById("modalJumlah").innerText = data.jumlah ?? '-';
    document.getElementById("modalInduksi").innerText = data.induksi ?? '-';
    document.getElementById("modalApd").innerText = data.apd ?? '-';
    document.getElementById("modalStatus").innerText = data.status ?? '-';

    const formatter = new Intl.DateTimeFormat('id-ID', {
        dateStyle: 'medium',
        timeStyle: 'short'
    });

    if (data.created_at) {
        const created = new Date(data.created_at);
        document.getElementById("modalCheckin").innerText = formatter.format(created);
    } else {
        document.getElementById("modalCheckin").innerText = '-';
    }

    if (data.jam_checkout) {
        const checkout = new Date(data.jam_checkout);
        document.getElementById("modalCheckout").innerText = formatter.format(checkout);
    } else {
        document.getElementById("modalCheckout").innerText = '-';
    }

    const status = (data.status ?? '').toLowerCase().trim();
    if (status === 'check-in') {
        document.getElementById("btnCheckout").style.display = 'inline-block';
        document.getElementById("checkoutForm").style.display = 'block';
        document.getElementById("checkoutForm").action = `/admin/checkout/${data.id}`;
    } else {
        document.getElementById("btnCheckout").style.display = 'none';
        document.getElementById("checkoutForm").style.display = 'none';
    }
}


    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }

    document.getElementById("searchInput").addEventListener("input", function () {
    const keyword = this.value.toLowerCase();
    const rows = document.querySelectorAll("#dataTamu tbody tr");

    rows.forEach((row) => {
        const namaTamu = row.children[2]?.textContent.toLowerCase() || "";
        row.style.display = namaTamu.includes(keyword) ? "" : "none";
    });
});
</script>

</x-layouts.app>
