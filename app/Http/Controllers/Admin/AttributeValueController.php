<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeValueContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    protected $attribute_value;

    public function __construct(AttributeValueContract $attribute_value)
    {
        $this->attribute_value = $attribute_value;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $attribute_values = $this->attribute_value->findByFilter();
        return view('admin.attribute-values.index',compact('attribute_values'));
    }

    /**
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view('admin.attribute-values.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'              => 'required|string|max:100|unique:attribute_values,name',
            'attribute_id'      => 'required|integer|exists:attributes',
        ]);

        $this->attribute_value->new($data);

        session()->flash('success',__('messages.create'));
        return redirect()->route('admin.attribute-values.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function show($id): Renderable
    {
        $attribute_value = $this->attribute_value->findOneById($id);
        return view('admin.attribute-values.show',compact('attribute_value'));
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $attribute_value = $this->attribute_value->findOneById($id);
        return view('admin.attribute-values.edit',compact('attribute_value'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100|unique:attribute_values,name,'.$id,
            'attribute_id'      => 'required|integer|exists:attributes',
        ]);
        $this->attribute_value->update($id,$data);

        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.attribute-values.index');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->attribute_value->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('admin.attribute-values.index');
    }

}
