@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="display-8"><i class="fa fa-search" aria-hidden="true"></i> List Nama Mahasiswa</h3>
                    </div>
                    <div class="alert alert-primary" role="alert">
                       <h4><strong>Dicetak</strong></h4>  <br>
                        <h5>{{ $printed }} / {{ $students->count() }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-borderless table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th style="width: 80%">
                                            <h3 class="display-8"><i class="fa fa-user" aria-hidden="true"></i> Nama|NRP
                                            </h3>
                                        </th>
                                        <th style="width: 10%">
                                            <center>
                                                <h3 class="display-8">
                                                    <i class="fa fa-cog" aria-hidden="true"></i> AKSI
                                                </h3>
                                            </center>
                                        </th>
                                        <th style="width: 10%">
                                            <h3 class="display-8">Sudah
                                                dicetak?
                                            </h3>
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
                                            <td style="width: 40%">
                                                <form action="{{ route('nilai.search') }}" method="GET" target="_blank">
                                                    <input type="hidden" name="cari" value="{{ $user->nim }}">
                                                    <input type="hidden" name="nama" value="{{ $user->nama }}">
                                                    <button style="margin-top: 10px" class="btn btn-lg btn-warning w-100"><i
                                                            class="fas fa-print"></i>
                                                        <strong>Cetak</strong>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center" style="width: 10%">
                                                @if ($user->is_printed == 0)
                                                    <h3>
                                                        <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                                                    </h3>
                                                @elseif ($user->is_printed == 1)
                                                    <h3>
                                                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                    </h3>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 80%">
                                            <h3 class="display-8"><i class="fa fa-user" aria-hidden="true"></i> Nama|NRP
                                            </h3>
                                        </th>
                                        <th style="width: 20%">
                                            <center>
                                                <h3 class="display-8">
                                                    <i class="fa fa-cog" aria-hidden="true"></i> AKSI
                                                </h3>
                                            </center>
                                        </th>
                                        <th style="width: 10%">
                                            <h3 class="display-8">Sudah
                                                dicetak?
                                            </h3>
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
        setTimeout(function() {
            location.reload();
        }, 600000); // 600000 milliseconds = 10 minutes
    </script>
@endsection
