@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h1 class="display-4"><i class="fa fa-search" aria-hidden="true"></i> List Nama Mahasiswa</h1>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-borderless table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th style="width: 80%">
                                            <h1 class="display-6"><i class="fa fa-user" aria-hidden="true"></i> Nama|NRP
                                            </h1>
                                        </th>
                                        <th style="width: 20%">
                                            <center>
                                                <h1 class="display-6">
                                                    <i class="fa fa-cog" aria-hidden="true"></i> AKSI
                                                </h1>
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $user)
                                        <tr>
                                            <td style="width: 50%">
                                                <strong>{{ $user->nama ?? '' }} <br>
                                                    <i class="fa fa-hashtag" aria-hidden="true"></i>
                                                    {{ $user->nim }}</strong>
                                            </td>
                                            <td style="width: 50%">
                                                <form action="{{ route('nilai.search') }}" method="GET" target="_blank">
                                                    <input type="hidden" name="cari" value="{{ $user->nim }}">
                                                    <input type="hidden" name="nama" value="{{ $user->nama }}">
                                                    <button style="margin-top: 10px" class="btn btn-lg btn-warning w-100"><i
                                                            class="fas fa-print"></i>
                                                        <strong>Cetak</strong>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 80%">
                                            <h1 class="display-6"><i class="fa fa-user" aria-hidden="true"></i> Nama|NRP
                                            </h1>
                                        </th>
                                        <th style="width: 20%">
                                            <center>
                                                <h1 class="display-6">
                                                    <i class="fa fa-cog" aria-hidden="true"></i> AKSI
                                                </h1>
                                            </center>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [0, 'asc']
                ],
                pageLength: 10,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
