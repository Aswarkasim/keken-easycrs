<div class="row">
    <div class="col-md-12">
        <a href="/admin/pengajar" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td width="200px">Nama Lengkap</td>
                                <td>: {{ $pengajar->name }}</td>
                            </tr>

                            <tr>
                                <td>Tempat Lahir</td>
                                <td>: {{ $pengajar->tempat_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{ $pengajar->tanggal_lahir }}</td>
                            </tr>

                            <tr>
                                <td>Gender</td>
                                <td>: {{ $pengajar->gender }}</td>
                            </tr>

                            <tr>
                                <td>Agama</td>
                                <td>: {{ $pengajar->agama }}</td>
                            </tr>

                            <tr>
                                <td>Bio</td>
                                <td>: {!! $pengajar->bio !!}</td>
                            </tr>

                            <tr>
                                <td>Foto</td>
                                <td>
                                    <img src="/{{ $pengajar->foto }}" width="50%" alt="">
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-md-6">
                        <h6><strong>Riwayat Pendidikan</strong></h6>
                        <table class="table">
                            <tr>
                                <td>SD</td>
                                <td>: {{ $pengajar->sd }}</td>
                            </tr>

                            <tr>
                                <td>SMP</td>
                                <td>: {{ $pengajar->smp }}</td>
                            </tr>

                            <tr>
                                <td>SMA</td>
                                <td>: {{ $pengajar->sma }}</td>
                            </tr>

                            <tr>
                                <td>Kampus</td>
                                <td>: {{ $pengajar->kampus }}</td>
                            </tr>

                            <tr>
                                <td>Jurusan</td>
                                <td>: {{ $pengajar->jurusan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>