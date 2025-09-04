<x-layouts.app :title="'Visitor Management System'">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #186275 no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            max-width: 100%;
            margin: 10px 3px 20px 3px;
            background: #FBFCF8;
            border-radius: 8px;
            padding: 20px;
            border: 2px solid #196275;
            box-shadow: 0 19px 41px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #D1D1D1;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .photo-preview {
            text-align: center;
            margin-bottom: 20px;
        }

        #preview {
            height: 155px;
            object-fit: cover;
            margin: 0 auto 10px auto;
            display: block;
        }

        .file-hidden {
            display: none;
        }

        .btn {
            padding: 10px 20px;
            background-color: #196275;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }

        .apd-options {
            display: flex;
            gap: 30px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #666;
        }

        .induction-image {
            display: block;
            max-width: 100%;
            margin: 30px auto;
        }

        .submit-section {
            text-align: right;
        }

        @media (max-width: 768px) {
            .container {
                margin: 0px 1px 20px 1px;
                padding: 12px;
            }
        }
    </style>

    <div class="container dark:text-black">
        <h2>Formulir Tamu PLN PUSHARLIS UP2WVI</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form id="formTamu" action="{{ route('tamu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="photo-preview">
                <img id="preview" src="https://icon-library.com/images/no-picture-available-icon/no-picture-available-icon-13.jpg" alt="Preview Foto">
                <input type="file" id="foto" name="foto" class="file-hidden" accept="image/*" onchange="previewImage(this)" required>
                <button type="button" class="btn" onclick="document.getElementById('foto').click()">Ambil Foto</button>
            </div>

            <div class="form-group"><label>Nama Tamu*</label><input name="nama_tamu" type="text" required></div>
            <div class="form-group"><label>Nama Perusahaan*</label><input name="perusahaan" type="text" required></div>
            <div class="form-group"><label>Alamat Perusahaan Tamu*</label><input name="alamat" type="text" required></div>
            <div class="form-group"><label>Unit Yang Dituju*</label><input name="unit" type="text" required></div>
            <div class="form-group"><label>Nama Pegawai Yang Dituju*</label><input name="pegawai" type="text" required></div>

            <div class="form-group">
                <label>Pemakaian APD*</label>
                <div class="apd-options">
                    <label class="checkbox-label"><input type="checkbox" name="apd[]" value="Safety Helmet"> Safety Helmet</label>
                    <label class="checkbox-label"><input type="checkbox" name="apd[]" value="Safety Shoes"> Safety Shoes</label>
                    <label class="checkbox-label"><input type="checkbox" name="apd[]" value="Seragam Kerja"> Seragam Kerja</label>
                </div>
            </div>

            <div class="form-group"><label>Keperluan Kunjungan*</label><input name="keperluan" type="text" required></div>
            <div class="form-group"><label>No. KTP atau Identitas Lainnya*</label><input name="ktp" type="text" required></div>
            <div class="form-group"><label>Kendaraan (Jenis / No.Pol)*</label><input name="kendaraan" type="text" required></div>
            <div class="form-group"><label>No Name Tag Tamu*</label><input name="name_tag" type="text" required></div>
            <div class="form-group"><label>Jumlah Tamu*</label><input name="jumlah" type="number" required></div>

            <p style="text-align:center; font-weight:600; color:#666;">
                Selama Anda Berada di Area PT PLN (Persero) Pusharlis wajib mematuhi Paparan Safety and Security Induction sebagai berikut:
            </p>
            <img class="induction-image" src="https://ik.imagekit.io/pln/peraturan.png?updatedAt=1751940307075" alt="Safety Induction">

            <div class="form-group">
                <label><input name="induksi" type="checkbox" value="Ya" required> Sudah membaca dan memahami Safety and Security Induction yang diberikan</label>
            </div>

            <div class="submit-section">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function previewImage(input) {
            const reader = new FileReader();
            reader.onload = (e) => document.getElementById("preview").src = e.target.result;
            reader.readAsDataURL(input.files[0]);
        }

        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("formTamu");

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil dikirim!',
                    text: 'Terima kasih sudah mengisi formulir tamu.',
                    confirmButtonColor: '#196275',
                    timer: 2000,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    form.submit();
                }, 2000);
            });
        });
    </script>
</x-layouts.app>
