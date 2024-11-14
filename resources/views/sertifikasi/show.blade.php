@empty($sertifikasi)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/sertifikasi') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Sertifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th class="text-right col-3">ID</th>
                        <td class="col-9">{{ $sertifikasi->id_sertifikasi }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Vendor</th>
                        <td class="col-9">{{ $sertifikasi->vendor_sertifikasi->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Jenis Bidang</th>
                        <td class="col-9">{{ $sertifikasi->jenis_sertifikasi->nama_jenis_sertifikasi }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Tahun Periode</th>
                        <td class="col-9">{{ $sertifikasi->periode->tahun_periode }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Nama Sertifikasi</th>
                        <td class="col-9">{{ $sertifikasi->nama_sertifikasi }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">No Sertifikasi</th>
                        <td class="col-9">{{ $sertifikasi->no_sertifikasi }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Jenis Sertifikasi</th>
                        <td class="col-9">{{ $sertifikasi->jenis }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Tanggal</th>
                        <td class="col-9">{{ $sertifikasi->tanggal }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Masa Berlaku</th>
                        <td class="col-9">{{ $sertifikasi->masa_berlaku }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Kuota Peserta</th>
                        <td class="col-9">{{ $sertifikasi->kuota_peserta }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Biaya</th>
                        <td class="col-9">{{ $sertifikasi->biaya }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Bidang Minat</th>
                        <td class="col-9">{{ $sertifikasi->bidang_minat_sertifikasi->pluck('nama_bidang_minat')->implode(', '); }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Mata Kuliah</th>
                        <td class="col-9">{{ $sertifikasi->mata_kuliah_sertifikasi->pluck('nama_matakuliah')->implode(', '); }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Bukti Sertifikasi</th>
                        <td class="col-9">
                            @if (!empty($sertifikasi->bukti_sertifikasi))
                                @php
                                    // Ambil nama file tanpa path
                                    $fullFileName = basename($sertifikasi->bukti_sertifikasi);
                                    
                                    // Hilangkan tanggal di depan
                                    $cleanFileName = preg_replace('/^\d{10}_/', '', $fullFileName);
                                @endphp
                    
                                <a href="{{ url('storage/images/' . $sertifikasi->bukti_sertifikasi) }}" target="_blank" download>
                                    {{ $cleanFileName }}
                                </a>
                            @else
                                <span class="text-danger">Tidak ada bukti sertifikasi</span>
                            @endif
                        </td>
                    </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Kembali</button>
            </div>
        </div>
    </div>
@endempty