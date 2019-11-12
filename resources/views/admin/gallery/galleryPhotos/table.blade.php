<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-12">
            <div class="row">
                @foreach ($galleryPhotos as $galleryPhoto)
                <div class="col-lg-2 col-md-2 col-6 col-sm-3 p-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('admin.gallery.galleryPhotos.confirm-delete', collect($galleryPhoto)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.gallery.galleryPhotos.delete', collect($galleryPhoto)->first() ) }}">
                                    <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete galleryPhoto"></i>
                                </a>
                            </h5>
                            <a class="fancybox-thumbs" data-fancybox-group="thumb"
                                href="{{ URL::to('/uploads/files/gallery/'.$galleryPhoto->imagename)  }}">
                            <img src="{{ URL::to('/uploads/files/gallery/'.$galleryPhoto->imagename)  }}"
                             class="img-fluid gallery-style" alt="Image">
                    </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /thumnail helper gallery -->
        </div>
    </div>
</div>
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
        $('#galleryPhotos-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#galleryPhotos-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#galleryPhotos-table').on( 'length.dt', function ( e, settings, len ) {
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
