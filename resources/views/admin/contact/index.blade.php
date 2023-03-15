@extends('admin.layouts.dashboard')
@section('title')
  Dashboard  
@endsection
@section('breadcrumbs')
  {{ Breadcrumbs::render('categories') }}
@endsection
@section('content')
   <!-- content -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <form class="form-inline" method="POST" action="{{  route('contact.export') }}">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <div class="input-group date" data-date-format="yyyy-mm-dd"  data-provide="datepicker"><input type="text" name="from_date" class="form-control">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="input-group date" data-date-format="yyyy-mm-dd" data-provide="datepicker"><input type="text"  name="to_date" class="form-control">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success mb-2">Export Excell</button>
                        </div>
                    </div>
                </form>
                <!--<div class="row">-->
                <!--  <div class="col-md-4">-->
                <!--    <div class="input-group date" data-provide="datepicker"><input type="text" class="form-control">-->
                <!--        <div class="input-group-addon">-->
                <!--            <span class="glyphicon glyphicon-th"></span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="col-md-4">-->
                <!--      <div class="input-group date" data-provide="datepicker"><input type="text" class="form-control">-->
                <!--        <div class="input-group-addon">-->
                <!--            <span class="glyphicon glyphicon-th"></span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="col-md-4">-->
                <!--      <a href="{{ route('contact.export')}}" class="btn btn-success float-right">-->
                <!--        <span class="glyphicon glyphicon-th-list"></span> EXPORT EXCEL-->
                <!--      </a>-->
                <!--  </div>-->
                  
                <!--</div>-->
               {{-- Data Leads Promo : {{ $namePromo }} --}}
               
            </div>
            <div class="card-body" style="overflow:auto;">
               <div class="row">
                  <div class="col-md-12">
                     <table class="table table-bordered data-table">
                        <thead>
                           <tr>
                              <th>FullName</th>
                              <th>Email</th>
                              <th>Company</th>
                              <th>Title</th>
                              <th>Address</th>
                              <th>Phone</th>
                               <th>Message</th>
                              <th>Datetime</th>
                              <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs">Delete</button></th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                  </div>
              </div>
            </div>
         </div>
      </div>
   </div>

@endsection
@push('javascript-external')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://bnmstainless.co.id/public/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endpush
@push('css-internal')
   <style>
      .post-tumbnail {
         width: 100%;
         height: 400px;
         background-repeat: no-repeat;
         background-position: center;
         background-size: cover;
      }
   </style>
@endpush
@push('javascript-internal')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>

   <script>
      $(document).ready(function(){
         var table = $('.data-table').DataTable({ 
               processing: true,
               serverSide: true,
               ajax: "{{ route('contact.index') }}",
                // columnDefs: [
                //     {
                //         targets: 7,
                //         render: DataTable.render.datetime('Do MMM YYYY'),
                //     },
                // ],
               columns: [
                   //{data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'fullname', name: 'fullname'},
                   {data: 'email', name: 'email'},
                   {data: 'company', name: 'company'},
                   {data: 'subject', name: 'subject'},
                   {data: 'address', name: 'address'},
                   {data: 'phone', name: 'phone'},
                   {data: 'message', name: 'message'},
                   {data: 'created_at',render: function(d) {
                    return moment(d).format("DD/MM/YYYY HH:mm");
                    }},
                   {data: 'checkbox', name: 'checkbox', orderable:false, searchable:false},
               ]
           });
           
           $('#bulk_delete').on('click', function(){
               var id = []
               $('.users_checkbox:checked').each(function(){
                   id.push($(this).val())
               })
                
               if(confirm(`Are you sure delete ${id.length} messages ?`)){
                   if(id.length > 0){
                       $.ajax({
                           url:"{{ route('contact.delete') }}",
                           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                           method:"get",
                           data: {id:id},
                           success:function(data)
                           {
                            //   console.log(data)
                               table.ajax.reload()
                               Swal.fire({
                                  icon: 'success',
                                  title: 'Success',
                                  text: 'Data Anda sudah terhapus',
                                  
                                })
                           },
                           error:function(data)
                           {
                               let errors = data.responseJSON;
                               console.log(error)
                           }
                           
                       })
                   }
                   else{
                       alert('Please select atleast one checkbox')
                   }
               }
               
           })
      });
   </script>
@endpush