<?php

namespace App\Http\Controllers\Admin\Prodi;

use App\Http\Requests;
use App\Http\Requests\Prodi\CreateProdiRequest;
use App\Http\Requests\Prodi\UpdateProdiRequest;
use App\Repositories\Prodi\ProdiRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Prodi\Prodi;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProdiController extends InfyOmBaseController
{
    /** @var  ProdiRepository */
    private $prodiRepository;

    public function __construct(ProdiRepository $prodiRepo)
    {
        $this->prodiRepository = $prodiRepo;
    }

    /**
     * Display a listing of the Prodi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->prodiRepository->pushCriteria(new RequestCriteria($request));
        $prodis = $this->prodiRepository->all();
        return view('admin.prodi.prodis.index')
            ->with('prodis', $prodis);
    }

    /**
     * Show the form for creating a new Prodi.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.prodi.prodis.create');
    }

    /**
     * Store a newly created Prodi in storage.
     *
     * @param CreateProdiRequest $request
     *
     * @return Response
     */
    public function store(CreateProdiRequest $request)
    {
        $input = $request->all();

        $prodi = $this->prodiRepository->create($input);

        Flash::success('Prodi saved successfully.');

        return redirect(route('admin.prodi.prodis.index'));
    }

    /**
     * Display the specified Prodi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prodi = $this->prodiRepository->findWithoutFail($id);

        if (empty($prodi)) {
            Flash::error('Prodi not found');

            return redirect(route('prodis.index'));
        }

        return view('admin.prodi.prodis.show')->with('prodi', $prodi);
    }

    /**
     * Show the form for editing the specified Prodi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prodi = $this->prodiRepository->findWithoutFail($id);

        if (empty($prodi)) {
            Flash::error('Prodi not found');

            return redirect(route('prodis.index'));
        }

        return view('admin.prodi.prodis.edit')->with('prodi', $prodi);
    }

    /**
     * Update the specified Prodi in storage.
     *
     * @param  int              $id
     * @param UpdateProdiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdiRequest $request)
    {
        $prodi = $this->prodiRepository->findWithoutFail($id);

        

        if (empty($prodi)) {
            Flash::error('Prodi not found');

            return redirect(route('prodis.index'));
        }

        $prodi = $this->prodiRepository->update($request->all(), $id);

        Flash::success('Prodi updated successfully.');

        return redirect(route('admin.prodi.prodis.index'));
    }

    /**
     * Remove the specified Prodi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.prodi.prodis.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Prodi::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.prodi.prodis.index'))->with('success', Lang::get('message.success.delete'));

       }

}
