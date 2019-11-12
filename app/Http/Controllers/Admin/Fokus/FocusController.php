<?php

namespace App\Http\Controllers\Admin\Fokus;

use App\Http\Requests;
use App\Http\Requests\Fokus\CreateFocusRequest;
use App\Http\Requests\Fokus\UpdateFocusRequest;
use App\Repositories\Fokus\FocusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Fokus\Focus;
use App\Models\Prodi\Prodi;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FocusController extends InfyOmBaseController
{
    /** @var  FocusRepository */
    private $focusRepository;

    public function __construct(FocusRepository $focusRepo)
    {
        $this->focusRepository = $focusRepo;
    }

    /**
     * Display a listing of the Focus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->focusRepository->pushCriteria(new RequestCriteria($request));
        $foci = $this->focusRepository->all();

        return view('admin.fokus.foci.index')
            ->with('foci', $foci);
    }

    /**
     * Show the form for creating a new Focus.
     *
     * @return Response
     */
    public function create()
    {
        $prodi = Prodi::pluck('name_prodi', 'id');
        return view('admin.fokus.foci.create',compact('prodi'));
    }

    /**
     * Store a newly created Focus in storage.
     *
     * @param CreateFocusRequest $request
     *
     * @return Response
     */
    public function store(CreateFocusRequest $request)
    {
        $input = $request->all();

        $focus = $this->focusRepository->create($input);

        Flash::success('Focus saved successfully.');

        return redirect(route('admin.fokus.foci.index'));
    }

    /**
     * Display the specified Focus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $focus = $this->focusRepository->findWithoutFail($id);

        if (empty($focus)) {
            Flash::error('Focus not found');

            return redirect(route('foci.index'));
        }

        return view('admin.fokus.foci.show')->with('focus', $focus);
    }

    /**
     * Show the form for editing the specified Focus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $focus = $this->focusRepository->findWithoutFail($id);
        $prodi = Prodi::pluck('name_prodi', 'id');
        if (empty($focus)) {
            Flash::error('Focus not found');

            return redirect(route('foci.index'));
        }

        return view('admin.fokus.foci.edit', compact('focus','prodi'));
    }

    /**
     * Update the specified Focus in storage.
     *
     * @param  int              $id
     * @param UpdateFocusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFocusRequest $request)
    {
        $focus = $this->focusRepository->findWithoutFail($id);



        if (empty($focus)) {
            Flash::error('Focus not found');

            return redirect(route('foci.index'));
        }

        $focus = $this->focusRepository->update($request->all(), $id);

        Flash::success('Focus updated successfully.');

        return redirect(route('admin.fokus.foci.index'));
    }

    /**
     * Remove the specified Focus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.fokus.foci.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Focus::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.fokus.foci.index'))->with('success', Lang::get('message.success.delete'));

       }

}
