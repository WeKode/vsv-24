<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AdminContract;
use App\Contracts\BrandContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(BrandContract $brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $brands = $this->brand->findByFilter();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view('admin.brands.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100|unique:brands,name',
        ]);

        $this->brand->new($data);

        session()->flash('success',__('messages.create'));
        return redirect()->route('admin.brands.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function show($id): Renderable
    {
        $brand = $this->brand->findOneById($id);
        return view('admin.brands.show',compact('brand'));
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $brand = $this->brand->findOneById($id);
        return view('admin.brands.edit',compact('brand'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100|unique:brands,name,'.$id,
        ]);
        $this->brand->update($id,$data);

        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.brands.index');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->brand->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('admin.brands.index');
    }

}
