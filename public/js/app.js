$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadData(); 

    $('#createBtn').click(function () {
        loadForm();
    });
 
    $(document).on('click', '#backBtn, #cancelBtn', function () {
        loadData(); 
    });

    $(document).on('click', '#saveBtn', function () {
        let id = $('#id').val();
        let url = id ? `/penjualan/${id}` : '/penjualan';
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: $('#penjualanForm').serialize(),
            success: function (response) {
                alert('Data berhasil disimpan!');
                loadData(); 
            },
            error: function (xhr) {
                if (xhr.status === 422) { 
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $(`#${key}_error`).text(value[0]); 
                        $(`#${key}`).addClass('is-invalid'); 
                    });
                } else {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            }
        });
    });
    
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');
        loadForm(id);
    });

    $(document).on('click', '.showBtn', function () {
        let id = $(this).data('id');
        loadDetail(id);
    });

    $(document).on('click', '.deleteBtn', function () {
        let id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: `/penjualan/${id}`,
                type: 'DELETE',
                success: function (response) {
                    alert('Data berhasil dihapus!');
                    loadData(); 
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }
    });

    function loadData() {
        console.log('Memuat data...');
        $.get('/penjualan', function (response) {
            console.log('Data diterima:', response); 
            let rows = '';
            response.forEach(function (item) {
                rows += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.nama_pembeli}</td>
                        <td>${item.nama_pakaian}</td>
                        <td>${item.jumlah}</td>
                        <td>${formatRupiah(item.harga)}</td>
                        <td>
                            <button class="btn btn-info btn-sm showBtn" data-id="${item.id}">Lihat</button>
                            <button class="btn btn-warning btn-sm editBtn" data-id="${item.id}">Edit</button>
                            <button class="btn btn-danger btn-sm deleteBtn" data-id="${item.id}">Hapus</button>
                        </td>
                    </tr>
                `;
            });

            let tableHtml = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Pakaian</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${rows}
                    </tbody>
                </table>
            `;

            $('#content').html(tableHtml); 
            $('#header').show(); 
            console.log('Data berhasil dimuat ke tabel');
        }).fail(function (xhr) {
            console.error('Gagal memuat data:', xhr.responseText);
        });
    }

    function loadForm(id = null) {
        let url = id ? `/penjualan/${id}/edit` : '/penjualan/create';
        $.get(url, function (response) {
            $('#content').html(response); 
            $('#header').hide();
        }).fail(function (xhr) {
            console.error('Gagal memuat form:', xhr.responseText);
        });
    }

    function loadDetail(id) {
        $.get(`/penjualan/${id}`, function (response) {
            let detailHtml = `
                <div>
                    <h2>Detail Data Penjualan</h2>
                    <div>
                        <p><strong>ID:</strong> ${response.id}</p>
                        <p><strong>Nama Pembeli:</strong> ${response.nama_pembeli}</p>
                        <p><strong>Nama Pakaian:</strong> ${response.nama_pakaian}</p>
                        <p><strong>Jumlah:</strong> ${response.jumlah}</p>
                        <p><strong>Harga:</strong> ${response.harga}</p>
                    </div>
                    <button id="backBtn" class="btn btn-secondary">Kembali</button>
                </div>
            `;
            $('#content').html(detailHtml); 
            $('#header').hide(); 
        }).fail(function (xhr) {
            console.error('Gagal memuat detail:', xhr.responseText);
        });
    }

    function formatRupiah(angka) {
        let numberString = angka.toString().split('').reverse().join('');
        let ribuan = numberString.match(/\d{1,3}/g);
        let formatted = ribuan.join('.').split('').reverse().join('');
        return `Rp ${formatted}`;
    }

});

