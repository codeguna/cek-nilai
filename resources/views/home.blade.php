@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        List Nama Mahasiswa
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            NRP
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $user)
                                        <tr data-entry-id="{{ $user->id }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $user->nama ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->nim ?? '' }}
                                                <form action="{{ route('nilai.search') }}" method="GET" target="_blank">
                                                    <input type="hidden" name="cari" value="{{ $user->nim }}">
                                                    <input type="hidden" name="nama" value="{{ $user->nama }}">
                                                    <button style="margin-top: 10px" class="btn btn-warning"><i
                                                            class="fas fa-print"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
                    [1, 'asc']
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
