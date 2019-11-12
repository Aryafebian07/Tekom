<?php

namespace App\Http\Controllers\Admin\Headercarousel;

use App\Http\Requests;
use App\Http\Requests\Headercarousel\CreateHeaderCarouselRequest;
use App\Http\Requests\Headercarousel\UpdateHeaderCarouselRequest;
use App\Repositories\Headercarousel\HeaderCarouselRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Headercarousel\HeaderCarousel;
use Flash;
use File;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HeaderCarouselController extends InfyOmBaseController
{
    /** @var  HeaderCarouselRepository */
    private $headerCarouselRepository;

    public function __construct(HeaderCarouselRepository $headerCarouselRepo)
    {
        $this->headerCarouselRepository = $headerCarouselRepo;
    }

    /**
     * Display a listing of the HeaderCarousel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->headerCarouselRepository->pushCriteria(new RequestCriteria($request));
        $headerCarousels = $this->headerCarouselRepository->all();
        return view('admin.headerCarousel.headerCarousels.index')
            ->with('headerCarousels', $headerCarousels);
    }

    /**
     * Show the form for creating a new HeaderCarousel.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.headerCarousel.headerCarousels.create');
    }

    /**
     * Store a newly created HeaderCarousel in storage.
     *
     * @param CreateHeaderCarouselRequest $request
     *
     * @return Response
     */
    public function store(CreateHeaderCarouselRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $extension = $file->extension()?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/files/headercarousel/';
            $file->move($destinationPath, $picture);
            $input['filename'] = $picture;
        }

        $headerCarousel = $this->headerCarouselRepository->create($input);

        Flash::success('HeaderCarousel saved successfully.');

        return redirect(route('admin.headerCarousel.headerCarousels.index'));
    }

    /**
     * Display the specified HeaderCarousel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $headerCarousel = $this->headerCarouselRepository->findWithoutFail($id);

        if (empty($headerCarousel)) {
            Flash::error('HeaderCarousel not found');

            return redirect(route('headerCarousels.index'));
        }

        return view('admin.headerCarousel.headerCarousels.show')->with('headerCarousel', $headerCarousel);
    }

    /**
     * Show the form for editing the specified HeaderCarousel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $headerCarousel = $this->headerCarouselRepository->findWithoutFail($id);

        if (empty($headerCarousel)) {
            Flash::error('HeaderCarousel not found');

            return redirect(route('headerCarousels.index'));
        }

        return view('admin.headerCarousel.headerCarousels.edit')->with('headerCarousel', $headerCarousel);
    }

    /**
     * Update the specified HeaderCarousel in storage.
     *
     * @param  int              $id
     * @param UpdateHeaderCarouselRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHeaderCarouselRequest $request)
    {
        $headerCarousel = $this->headerCarouselRepository->findWithoutFail($id);
        $input = $request->all();

        // is new image uploaded?
        if ($file = $request->file('filename')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/files/headercarousel/';
            $picture = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $picture);
            //delete old pic if exists
            if (File::exists($destinationPath . $headerCarousel['filename'])) {
                File::delete($destinationPath . $headerCarousel['filename']);
            }
            //save new file path into db
            $input['filename'] = $picture;
        }


        if (empty($headerCarousel)) {
            Flash::error('HeaderCarousel not found');

            return redirect(route('headerCarousels.index'));
        }

        $headerCarousel = $this->headerCarouselRepository->update($input, $id);

        Flash::success('HeaderCarousel updated successfully.');

        return redirect(route('admin.headerCarousel.headerCarousels.index'));
    }

    /**
     * Remove the specified HeaderCarousel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.headerCarousel.headerCarousels.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = HeaderCarousel::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.headerCarousel.headerCarousels.index'))->with('success', Lang::get('message.success.delete'));

       }

}
