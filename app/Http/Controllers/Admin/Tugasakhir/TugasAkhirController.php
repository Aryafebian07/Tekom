<?php

namespace App\Http\Controllers\Admin\Tugasakhir;

use App\Http\Requests;
use App\Http\Requests\Tugasakhir\CreateTugasAkhirRequest;
use App\Http\Requests\Tugasakhir\UpdateTugasAkhirRequest;
use App\Repositories\Tugasakhir\TugasAkhirRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Tugasakhir\TugasAkhir;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TugasAkhirController extends InfyOmBaseController
{
    /** @var  TugasAkhirRepository */
    private $tugasAkhirRepository;

    public function __construct(TugasAkhirRepository $tugasAkhirRepo)
    {
        $this->tugasAkhirRepository = $tugasAkhirRepo;
    }

    /**
     * Display a listing of the TugasAkhir.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->tugasAkhirRepository->pushCriteria(new RequestCriteria($request));
        $tugasAkhirs = $this->tugasAkhirRepository->all();
        return view('admin.tugasAkhir.tugasAkhirs.index')
            ->with('tugasAkhirs', $tugasAkhirs);
    }

    /**
     * Show the form for creating a new TugasAkhir.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tugasAkhir.tugasAkhirs.create');
    }

    /**
     * Store a newly created TugasAkhir in storage.
     *
     * @param CreateTugasAkhirRequest $request
     *
     * @return Response
     */
    public function store(CreateTugasAkhirRequest $request)
    {
        $input = $request->all();

        $tugasAkhir = $this->tugasAkhirRepository->create($input);

        Flash::success('TugasAkhir saved successfully.');

        return redirect(route('admin.tugasAkhir.tugasAkhirs.index'));
    }

    /**
     * Display the specified TugasAkhir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tugasAkhir = $this->tugasAkhirRepository->findWithoutFail($id);

        if (empty($tugasAkhir)) {
            Flash::error('TugasAkhir not found');

            return redirect(route('tugasAkhirs.index'));
        }

        return view('admin.tugasAkhir.tugasAkhirs.show')->with('tugasAkhir', $tugasAkhir);
    }

    /**
     * Show the form for editing the specified TugasAkhir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tugasAkhir = $this->tugasAkhirRepository->findWithoutFail($id);

        if (empty($tugasAkhir)) {
            Flash::error('TugasAkhir not found');

            return redirect(route('tugasAkhirs.index'));
        }

        return view('admin.tugasAkhir.tugasAkhirs.edit')->with('tugasAkhir', $tugasAkhir);
    }

    /**
     * Update the specified TugasAkhir in storage.
     *
     * @param  int              $id
     * @param UpdateTugasAkhirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTugasAkhirRequest $request)
    {
        $tugasAkhir = $this->tugasAkhirRepository->findWithoutFail($id);

        

        if (empty($tugasAkhir)) {
            Flash::error('TugasAkhir not found');

            return redirect(route('tugasAkhirs.index'));
        }

        $tugasAkhir = $this->tugasAkhirRepository->update($request->all(), $id);

        Flash::success('TugasAkhir updated successfully.');

        return redirect(route('admin.tugasAkhir.tugasAkhirs.index'));
    }

    /**
     * Remove the specified TugasAkhir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.tugasAkhir.tugasAkhirs.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = TugasAkhir::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.tugasAkhir.tugasAkhirs.index'))->with('success', Lang::get('message.success.delete'));

       }

}
