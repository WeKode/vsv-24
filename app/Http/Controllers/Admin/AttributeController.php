<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AdminContract;
use App\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $attribute;

    public function __construct(AttributeContract $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $attributes = $this->attribute->findByFilter();
        return view('admin.attributes.index',compact('attributes'));
    }

    /**
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100|unique:attributes,name',
        ]);

        $this->attribute->new($data);

        session()->flash('success',__('messages.create'));
        return redirect()->route('admin.attributes.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function show($id): Renderable
    {
        $attribute = $this->attribute->findOneById($id);
        return view('admin.attributes.show',compact('attribute'));
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $attribute = $this->attribute->findOneById($id);
        return view('admin.attributes.edit',compact('attribute'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100|unique:attributes,name,'.$id,
        ]);
        $this->attribute->update($id,$data);

        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.attributes.index');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->attribute->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('admin.attributes.index');
    }

}
