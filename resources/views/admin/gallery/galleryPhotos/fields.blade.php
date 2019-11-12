<!-- Imagename Field -->
<div class="form-group col-sm-12">
    <input type='file' id="imagename" name="imagename[]" accept=".png, .jpg, .jpeg" multiple required/>
    <label for="imageUpload"></label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.gallery.galleryPhotos.index') !!}" class="btn btn-default">Cancel</a>
</div>
