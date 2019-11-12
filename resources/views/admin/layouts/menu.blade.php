<li class="{{ Request::is('admin/prodi/prodis*') ? 'active' : '' }}">
    <a href="{!! route('admin.prodi.prodis.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="bank" data-size="18"
               data-loop="true"></i>
               Prodis
    </a>
</li>

<li class="{{ Request::is('admin/dosen/dosens*') ? 'active' : '' }}">
    <a href="{!! route('admin.dosen.dosens.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="users" data-size="18"
               data-loop="true"></i>
               Dosens
    </a>
</li>

<li class="{{ Request::is('admin/fokus/foci*') ? 'active' : '' }}">
    <a href="{!! route('admin.fokus.foci.index') !!}">
    <i class="livicon" data-c="#31B0D5" data-hc="#31B0D5" data-name="edit" data-size="18"
               data-loop="true"></i>
               Focus Information
    </a>
</li>

<li class="{{ Request::is('admin/headerCarousel/headerCarousels*') ? 'active' : '' }}">
    <a href="{!! route('admin.headerCarousel.headerCarousels.index') !!}">
    <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="image" data-size="18"
               data-loop="true"></i>
               HeaderCarousels
    </a>
</li>


<li class="{{ Request::is('admin/gallery/galleryPhotos*') ? 'active' : '' }}">
    <a href="{!! route('admin.gallery.galleryPhotos.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="image" data-size="18"
               data-loop="true"></i>
               GalleryPhotos
    </a>
</li>

<li class="{{ Request::is('admin/testimonial/testimonials*') ? 'active' : '' }}">
    <a href="{!! route('admin.testimonial.testimonials.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="users" data-size="18"
               data-loop="true"></i>
               Testimonials
    </a>
</li>

