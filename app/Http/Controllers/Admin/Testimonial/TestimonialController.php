<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Requests;
use App\Http\Requests\Testimonial\CreateTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Testimonial\Testimonial;
use Flash;
use File;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TestimonialController extends InfyOmBaseController
{
    /** @var  TestimonialRepository */
    private $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepo)
    {
        $this->testimonialRepository = $testimonialRepo;
    }

    /**
     * Display a listing of the Testimonial.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->testimonialRepository->pushCriteria(new RequestCriteria($request));
        $testimonials = $this->testimonialRepository->all();
        return view('admin.testimonial.testimonials.index')
            ->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new Testimonial.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.testimonial.testimonials.create');
    }

    /**
     * Store a newly created Testimonial in storage.
     *
     * @param CreateTestimonialRequest $request
     *
     * @return Response
     */
    public function store(CreateTestimonialRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension()?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/testimonials/';
            $file->move($destinationPath, $picture);
            $input['image'] = $picture;
        }

        $testimonial = $this->testimonialRepository->create($input);

        Flash::success('Testimonial saved successfully.');

        return redirect(route('admin.testimonial.testimonials.index'));
    }

    /**
     * Display the specified Testimonial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testimonial = $this->testimonialRepository->findWithoutFail($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        return view('admin.testimonial.testimonials.show')->with('testimonial', $testimonial);
    }

    /**
     * Show the form for editing the specified Testimonial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialRepository->findWithoutFail($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        return view('admin.testimonial.testimonials.edit')->with('testimonial', $testimonial);
    }

    /**
     * Update the specified Testimonial in storage.
     *
     * @param  int              $id
     * @param UpdateTestimonialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestimonialRequest $request)
    {
        $testimonial = $this->testimonialRepository->findWithoutFail($id);
        $input = $request->all();

        // is new image uploaded?
        if ($file = $request->file('image')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/testimonials/';
            $picture = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $picture);
            //delete old pic if exists
            if (File::exists($destinationPath . $testimonial['image'])) {
                File::delete($destinationPath . $testimonial['image']);
            }
            //save new file path into db
            $input['image'] = $picture;
        }


        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        $testimonial = $this->testimonialRepository->update($input, $id);

        Flash::success('Testimonial updated successfully.');

        return redirect(route('admin.testimonial.testimonials.index'));
    }

    /**
     * Remove the specified Testimonial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.testimonial.testimonials.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Testimonial::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.testimonial.testimonials.index'))->with('success', Lang::get('message.success.delete'));

       }

}
