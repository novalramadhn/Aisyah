@extends('admin.master')

@section('title', 'Admin | Data Mapel')
@section('breadcrumb', 'Data Mapel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-success card-outline">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col-auto">
                            <a href="{{ route('mapels.create') }}" class="btn btn-success btn-md" tabindex="-1" role="button" aria-disabled="true">Tambah Data</a>
                        </div>

                        <div class="p-2 ml-auto">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="keyword" id="keyword" class="form-control"
                                        placeholder="ketik keyword disini" style="width: 200px">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mapel</th>
                                    <th>Nama Mapel</th>
                                    <th>Pengajar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mapels as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_mapel }}</td>
                                        <td>{{ $data->nama_mapel }}</td>
                                        <td>{{ $data->guru->nama_guru }}</td>
                                        <td>
                                            <form action="{{ route('mapels.destroy', $data->id) }}" onsubmit="return confirm('Apakah Anda Yakin ?')" method="post">
                                                <a href="{{ route('mapels.edit', $data->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Mata Pelajaran belum Tersedia!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $mapels->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
    </script>
@endsection
