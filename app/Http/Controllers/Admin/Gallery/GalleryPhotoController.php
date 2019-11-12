<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Requests;
use App\Http\Requests\Gallery\CreateGalleryPhotoRequest;
use App\Http\Requests\Gallery\UpdateGalleryPhotoRequest;
use App\Repositories\Gallery\GalleryPhotoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Gallery\GalleryPhoto;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GalleryPhotoController extends InfyOmBaseController
{
    /** @var  GalleryPhotoRepository */
    private $galleryPhotoRepository;

    public function __construct(GalleryPhotoRepository $galleryPhotoRepo)
    {
        $this->galleryPhotoRepository = $galleryPhotoRepo;
    }

    /**
     * Display a listing of the GalleryPhoto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->galleryPhotoRepository->pushCriteria(new RequestCriteria($request));
        $galleryPhotos = $this->galleryPhotoRepository->all();
        return view('admin.gallery.galleryPhotos.index')
            ->with('galleryPhotos', $galleryPhotos);
    }

    /**
     * Show the form for creating a new GalleryPhoto.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.gallery.galleryPhotos.create');
    }

    /**
     * Store a newly created GalleryPhoto in storage.
     *
     * @param CreateGalleryPhotoRequest $request
     *
     * @return Response
     */
    public function store(CreateGalleryPhotoRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('imagename')) {
            foreach($request->file('imagename') as $file){
                //$data = $request->file('imagename');
                $extension = $file->extension()?: 'png';
                $picture = str_random(10) . '.' . $extension;
                $destinationPath = public_path() . '/uploads/files/gallery/';
                $file->move($destinationPath, $picture);
                $images[]['imagename'] = $picture;
            }
        }
        $check = GalleryPhoto::insert($images);
        // $galleryPhoto = $this->galleryPhotoRepository->create($input);

        Flash::success('GalleryPhoto saved successfully.');

        return redirect(route('admin.gallery.galleryPhotos.index'));
    }

    /**
     * Display the specified GalleryPhoto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $galleryPhoto = $this->galleryPhotoRepository->findWithoutFail($id);

        if (empty($galleryPhoto)) {
            Flash::error('GalleryPhoto not found');

            return redirect(route('galleryPhotos.index'));
        }

        return view('admin.gallery.galleryPhotos.show')->with('galleryPhoto', $galleryPhoto);
    }

    /**
     * Show the form for editing the specified GalleryPhoto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $galleryPhoto = $this->galleryPhotoRepository->findWithoutFail($id);

        if (empty($galleryPhoto)) {
            Flash::error('GalleryPhoto not found');

            return redirect(route('galleryPhotos.index'));
        }

        return view('admin.gallery.galleryPhotos.edit')->with('galleryPhoto', $galleryPhoto);
    }

    /**
     * Update the specified GalleryPhoto in storage.
     *
     * @param  int              $id
     * @param UpdateGalleryPhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGalleryPhotoRequest $request)
    {
        $galleryPhoto = $this->galleryPhotoRepository->findWithoutFail($id);



        if (empty($galleryPhoto)) {
            Flash::error('GalleryPhoto not found');

            return redirect(route('galleryPhotos.index'));
        }

        $galleryPhoto = $this->galleryPhotoRepository->update($request->all(), $id);

        Flash::success('GalleryPhoto updated successfully.');

        return redirect(route('admin.gallery.galleryPhotos.index'));
    }

    /**
     * Remove the specified GalleryPhoto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.gallery.galleryPhotos.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = GalleryPhoto::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.gallery.galleryPhotos.index'))->with('success', Lang::get('message.success.delete'));

       }

}
