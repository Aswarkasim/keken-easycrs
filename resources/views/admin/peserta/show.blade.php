<div class="row">
    <div class="col-md-12">
        <a href="/admin/peserta" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td width="200px">Nama Lengkap</td>
                                <td>: {{ $peserta->name }}</td>
                            </tr>

                            <tr>
                                <td>Tempat Lahir</td>
                                <td>: {{ $peserta->tempat_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{ $peserta->tanggal_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Gender</td>
                                <td>: {{ $peserta->gender }}</td>
                            </tr>

                            <tr>
                                <td>Agama</td>
                                <td>: {{ $peserta->agama }}</td>
                            </tr>

                            <tr>
                                <td>Bio</td>
                                <td>: {!! $peserta->bio !!}</td>
                            </tr>

                            <tr>
                                <td>Foto</td>
                                <td>
                                    <img src="/{{ $peserta->foto }}" width="50%" alt="">
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-md-6">
                        <h6><strong>Riwayat Pendidikan</strong></h6>
                        <table class="table">
                            <tr>
                                <td>SD</td>
                                <td>: {{ $peserta->sd }}</td>
                            </tr>

                            <tr>
                                <td>SMP</td>
                                <td>: {{ $peserta->smp }}</td>
                            </tr>

                            <tr>
                                <td>SMA</td>
                                <td>: {{ $peserta->sma }}</td>
                            </tr>

                            <tr>
                                <td>Kampus</td>
                                <td>: {{ $peserta->kampus }}</td>
                            </tr>

                            <tr>
                                <td>Jurusan</td>
                                <td>: {{ $peserta->jurusan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>