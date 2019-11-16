@extends('layouts/default')

@section('title')
TugasAkhirs
@parent
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <div class="row">
                <div class="col-12">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="d-none d-sm-block">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="{{ route('tugasakhir') }}">Tugas Akhir</a>
                </li>
            </ol>
            <div class="float-right mt-1">
                <i class="livicon icon3" data-name="edit" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Tugas Akhir
            </div>
        </div>
    </div>
        </div>
    </div>
    @stop

{{-- Page content --}}
@section('content')
<section class="content pr-3 pl-3">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card-body table-responsive">
            <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
                <table class="table table-striped table-bordered" id="tugasAkhirs-table" width="100%">
                    <thead>
                        <tr>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        {{-- <th >Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tugasAkhirs as $tugasAkhir)
                        <tr>
                            <td>{!! $tugasAkhir->nim !!}</td>
                            <td>{!! $tugasAkhir->nama !!}</td>
                            <td>{!! $tugasAkhir->judul !!}</td>
                            {{-- <td>
                                    <a href="{{ route('admin.tugasAkhir.tugasAkhirs.show', collect($tugasAkhir)->first() ) }}">
                                        <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view tugasAkhir"></i>
                                    </a>
                                    <a href="{{ route('admin.tugasAkhir.tugasAkhirs.edit', collect($tugasAkhir)->first() ) }}">
                                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit tugasAkhir"></i>
                                    </a>
                                    <a href="{{ route('admin.tugasAkhir.tugasAkhirs.confirm-delete', collect($tugasAkhir)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.tugasAkhir.tugasAkhirs.delete', collect($tugasAkhir)->first() ) }}">
                                        <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete tugasAkhir"></i>

                                    </a>
                            </td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
@stop

@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this Item? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                            </div>
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $('#tugasAkhirs-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#tugasAkhirs-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#tugasAkhirs-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                            $('.livicon').updateLivicon();
                     },500);
                  } );

                  $('#delete_confirm').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                       var $recipient = button.data('id');
                      var modal = $(this);
                      modal.find('.modal-footer a').prop("href",$recipient);
                  })

       </script>

@stop
