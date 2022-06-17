@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('nilai.search') }}" method="GET">
                            <label class="form-group">Cetak Nilai</label>
                            <input class="form-control" type="text" name="cari" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="Input NRP disini ..."
                                required>
                            <button style="margin-top: 10px" class="btn btn-warning"><i class="fas fa-search"></i> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
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
                                    @foreach($students as $key => $user)
                                        <tr data-entry-id="{{ $user->id }}">
                                            <td>
                
                                            </td>
                                            <td>
                                                {{ $user->nama ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->nim ?? '' }}
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
        $(function () {
      let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('users_manage')
      let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
      let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.users.mass_destroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
          var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
              return $(entry).data('entry-id')
          });
    
          if (ids.length === 0) {
            alert('{{ trans('global.datatables.zero_selected') }}')
    
            return
          }
    
          if (confirm('{{ trans('global.areYouSure') }}')) {
            $.ajax({
              headers: {'x-csrf-token': _token},
              method: 'POST',
              url: config.url,
              data: { ids: ids, _method: 'DELETE' }})
              .done(function () { location.reload() })
          }
        }
      }
      dtButtons.push(deleteButton)
    @endcan
    
      $.extend(true, $.fn.dataTable.defaults, {
        order: [[ 1, 'desc' ]],
        pageLength: 100,
      });
      $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
    
    </script>
@endsection
