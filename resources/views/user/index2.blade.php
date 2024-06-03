 <section>
            <div class="card">
                <div class="card-header">
                    <h3>Data Akun</h3>
                    {{-- @can('Admin')
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/akun/tambah-akun" class="btn btn-info"> <i class="bi bi-plus-circle-fill"></i>Tambah Data
                            Akun</a>
                    </div>
                    @endcan --}}
                </div>
                <div class="card-body">
                    <table id="akun" class="table table-hover table-striped" data-export-title="Data Akun">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                @can('Admin')
                                <th>Opsi</th>
                                @endcan
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>

                                @can('Admin')
                                    <td>
                                        <div class="opsi">
                                            {{-- <a class="btn btn-info" href='/customer/lihat/{{ $akun->id }}'><i class="fas fa-info"></i>Detail</a> --}}
                                            <a class="btn btn-warning" href='/user/ubah/{{ $user->id }}'><i
                                                    class="fas fa-eye-dropper"></i>Edit</a>
                                            
                                            @if ($user->id == Auth::id() )
                                            <p></p>
                                            @else
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <a class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini?')"
                                                href="/hapus/{{ $user->id }}"><i class="fa fa-trash"></i>Hapus</a>
                                            @endif
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>