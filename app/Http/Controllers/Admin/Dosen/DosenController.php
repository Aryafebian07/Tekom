<?php

namespace App\Http\Controllers\Admin\Dosen;

use App\Http\Requests;
use App\Http\Requests\Dosen\CreateDosenRequest;
use App\Http\Requests\Dosen\UpdateDosenRequest;
use App\Repositories\Dosen\DosenRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Dosen\Dosen;
use Flash;
use File;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DosenController extends InfyOmBaseController
{
    /** @var  DosenRepository */
    private $dosenRepository;

    public function __construct(DosenRepository $dosenRepo)
    {
        $this->dosenRepository = $dosenRepo;
    }

    /**
     * Display a listing of the Dosen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->dosenRepository->pushCriteria(new RequestCriteria($request));
        $dosens = $this->dosenRepository->all();
        return view('admin.dosen.dosens.index')
            ->with('dosens', $dosens);
    }

    /**
     * Show the form for creating a new Dosen.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.dosen.dosens.create');
    }

    /**
     * Store a newly created Dosen in storage.
     *
     * @param CreateDosenRequest $request
     *
     * @return Response
     */
    public function store(CreateDosenRequest $request)
    {
        $input = $request->all();
        // $dosen = new Dosen($request->except('files','image'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension()?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/dosens/';
            $file->move($destinationPath, $picture);
            $input['image'] = $picture;
        }
        // $dosen->save();

        $dosen = $this->dosenRepository->create($input);

        Flash::success('Dosen saved successfully.');

        return redirect(route('admin.dosen.dosens.index'));
    }

    /**
     * Display the specified Dosen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        return view('admin.dosen.dosens.show')->with('dosen', $dosen);
    }

    /**
     * Show the form for editing the specified Dosen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        return view('admin.dosen.dosens.edit')->with('dosen', $dosen);
    }

    /**
     * Update the specified Dosen in storage.
     *
     * @param  int              $id
     * @param UpdateDosenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDosenRequest $request)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);
        $input = $request->all();

        // is new image uploaded?
        if ($file = $request->file('image')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/dosens/';
            $picture = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $picture);
            //delete old pic if exists
            if (File::exists($destinationPath . $dosen['image'])) {
                File::delete($destinationPath . $dosen['image']);
            }
            //save new file path into db
            $input['image'] = $picture;
        }

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        $dosen = $this->dosenRepository->update($input, $id);

        Flash::success('Dosen updated successfully.');

        return redirect(route('admin.dosen.dosens.index'));
    }

    /**
     * Remove the specified Dosen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.dosen.dosens.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Dosen::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.dosen.dosens.index'))->with('success', Lang::get('message.success.delete'));

       }

}
